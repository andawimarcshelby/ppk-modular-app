<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use App\Models\Company;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Seeds 6 users total.
     * Required by spec:
     *  - alice / Passw0rd! / ACME
     *  - bob   / Passw0rd! / BETA
     * Others are for your brands (ZNA, ZC, AO).
     */
    public function run(): void
    {
        $rows = [
            // Required sample logins (Section 13)
            [
                'username'      => 'alice',
                'email'         => 'alice@example.com',
                'password'      => 'Passw0rd!',
                'full_name'     => 'Alice Doe',
                'company_code'  => 'ACME',
                'is_active'     => true,
            ],
            [
                'username'      => 'bob',
                'email'         => 'bob@example.com',
                'password'      => 'Passw0rd!',
                'full_name'     => 'Bob Roe',
                'company_code'  => 'BETA',
                'is_active'     => true,
            ],

            // Zenith & Aether family
            [
                'username'      => 'zenith_admin',
                'email'         => 'zenith.admin@zna.test',
                'password'      => 'Passw0rd!',
                'full_name'     => 'Zenith Admin',
                'company_code'  => 'ZNA',
                'is_active'     => true,
            ],
            [
                'username'      => 'chronos_mgr',
                'email'         => 'manager@zc.test',
                'password'      => 'Passw0rd!',
                'full_name'     => 'Chronos Manager',
                'company_code'  => 'ZC',
                'is_active'     => true,
            ],
            [
                'username'      => 'aether_mgr',
                'email'         => 'manager@ao.test',
                'password'      => 'Passw0rd!',
                'full_name'     => 'Aether Manager',
                'company_code'  => 'AO',
                'is_active'     => true,
            ],
            [
                'username'      => 'qa_user',
                'email'         => 'qa@zna.test',
                'password'      => 'Passw0rd!',
                'full_name'     => 'QA User',
                'company_code'  => 'ZNA',
                'is_active'     => true,
            ],
        ];

        foreach ($rows as $u) {
            $companyId = Company::where('code', $u['company_code'])->value('id');
            if (!$companyId) {
                // Skip if company missing (should not happen if CompanySeeder ran)
                continue;
            }

            User::updateOrCreate(
                ['username' => $u['username']],
                [
                    'email'      => $u['email'],
                    'password'   => Hash::make($u['password']), // explicit bcrypt
                    'full_name'  => $u['full_name'],
                    'company_id' => $companyId,
                    'is_active'  => $u['is_active'],
                ]
            );
        }
    }
}
