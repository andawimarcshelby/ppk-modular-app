<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\DB;
use App\Models\User;
use App\Models\Submodule;

class PermissionSeeder extends Seeder
{
    /**
     * Grants submodule permissions to users via the user_submodule pivot.
     *
     * Users:
     *  - zenith_admin : ALL submodules
     *  - chronos_mgr  : Watches + Inventory
     *  - aether_mgr   : Accessories + Brands
     *  - qa_user      : Admin(AUDIT, HEALTH)
     *  - alice        : Admin(USERS, COMPANIES, HEALTH)
     *  - bob          : Catalog(COLLECTIONS, MODELS)
     */
    public function run(): void
    {
        // Map submodule code => id
        $subByCode = Submodule::query()->pluck('id', 'code');

        // Buckets (from SystemModuleSeeder)
        $ADMIN      = ['USERS','COMPANIES','ROLES','PERMS','AUDIT','HEALTH'];
        $WATCHES    = ['COLLECTIONS','MODELS','BRANDS'];
        $ACCESS     = ['JEWELRY','BAGS'];
        $INVENTORY  = ['STOCK','SUPPLIERS'];

        // Helper: grant a set of codes to a username
        $grant = function (string $username, array $codes, ?string $createdByUsername = null): void
        {
            $user = User::where('username', $username)->first();
            if (!$user) {
                return; // user missing (shouldn't happen if UserSeeder ran)
            }

            $creatorId = null;
            if ($createdByUsername) {
                $creatorId = User::where('username', $createdByUsername)->value('id');
            }

            $now = Carbon::now();

            foreach ($codes as $code) {
                $subId = Submodule::where('code', $code)->value('id');
                if (!$subId) {
                    continue; // skip unknown code
                }

                // Respect unique constraint (user_id, submodule_id)
                DB::table('user_submodule')->updateOrInsert(
                    ['user_id' => $user->id, 'submodule_id' => $subId],
                    ['granted_at' => $now, 'created_by' => $creatorId]
                );
            }
        };

        // 1) zenith_admin gets ALL submodules
        $allCodes = Submodule::pluck('code')->all();
        $grant('zenith_admin', $allCodes, null);

        // 2) chronos_mgr: Watches + Inventory
        $grant('chronos_mgr', array_merge($WATCHES, $INVENTORY), 'zenith_admin');

        // 3) aether_mgr: Accessories + Brands
        $grant('aether_mgr', array_merge($ACCESS, ['BRANDS']), 'zenith_admin');

        // 4) qa_user: Admin (AUDIT, HEALTH)
        $grant('qa_user', ['AUDIT','HEALTH'], 'zenith_admin');

        // 5) alice (ACME): Admin (USERS, COMPANIES, HEALTH)
        $grant('alice', ['USERS','COMPANIES','HEALTH'], 'zenith_admin');

        // 6) bob (BETA): Catalog (COLLECTIONS, MODELS)
        $grant('bob', ['COLLECTIONS','MODELS'], 'zenith_admin');
    }
}
