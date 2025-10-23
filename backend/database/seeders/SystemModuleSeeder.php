<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\System;
use App\Models\Module;
use App\Models\Submodule;

class SystemModuleSeeder extends Seeder
{
    /**
     * Seeds:
     * - 2 systems (ADMIN, CATALOG)
     * - Each with 3 modules
     * - Each module with 2–3 submodules
     *
     * These codes are used by the frontend to render the left-pane tree and routes.
     */
    public function run(): void
    {
        $tree = [
            [
                'name' => 'Admin',
                'code' => 'ADMIN',
                'modules' => [
                    [
                        'name' => 'User Management',
                        'code' => 'USER_MGMT',
                        'icon' => 'users',
                        'submodules' => [
                            ['name' => 'Users',        'code' => 'USERS',   'route' => '/admin/users'],
                            ['name' => 'Companies',    'code' => 'COMPANIES','route' => '/admin/companies'],
                        ],
                    ],
                    [
                        'name' => 'Access Control',
                        'code' => 'ACCESS',
                        'icon' => 'shield',
                        'submodules' => [
                            ['name' => 'Roles',        'code' => 'ROLES',   'route' => '/admin/roles'],
                            ['name' => 'Permissions',  'code' => 'PERMS',   'route' => '/admin/permissions'],
                        ],
                    ],
                    [
                        'name' => 'System Tools',
                        'code' => 'SYS_TOOLS',
                        'icon' => 'settings',
                        'submodules' => [
                            ['name' => 'Audit Logs',   'code' => 'AUDIT',   'route' => '/admin/audit-logs'],
                            ['name' => 'Health Check', 'code' => 'HEALTH',  'route' => '/admin/health'],
                        ],
                    ],
                ],
            ],
            [
                'name' => 'Catalog',
                'code' => 'CATALOG',
                'modules' => [
                    [
                        'name' => 'Watches',
                        'code' => 'WATCHES',
                        'icon' => 'watch',
                        'submodules' => [
                            ['name' => 'Collections',  'code' => 'COLLECTIONS', 'route' => '/catalog/collections'],
                            ['name' => 'Models',       'code' => 'MODELS',      'route' => '/catalog/models'],
                            ['name' => 'Brands',       'code' => 'BRANDS',      'route' => '/catalog/brands'],
                        ],
                    ],
                    [
                        'name' => 'Accessories',
                        'code' => 'ACCESSORIES',
                        'icon' => 'gem',
                        'submodules' => [
                            ['name' => 'Jewelry',      'code' => 'JEWELRY',    'route' => '/catalog/jewelry'],
                            ['name' => 'Bags',         'code' => 'BAGS',       'route' => '/catalog/bags'],
                        ],
                    ],
                    [
                        'name' => 'Inventory',
                        'code' => 'INVENTORY',
                        'icon' => 'boxes',
                        'submodules' => [
                            ['name' => 'Stock',        'code' => 'STOCK',      'route' => '/catalog/stock'],
                            ['name' => 'Suppliers',    'code' => 'SUPPLIERS',  'route' => '/catalog/suppliers'],
                        ],
                    ],
                ],
            ],
        ];

        foreach ($tree as $sys) {
            /** @var System $system */
            $system = System::updateOrCreate(
                ['code' => $sys['code']],
                ['name' => $sys['name'], 'code' => $sys['code']]
            );

            foreach ($sys['modules'] as $mod) {
                /** @var Module $module */
                $module = Module::updateOrCreate(
                    ['code' => $mod['code'], 'system_id' => $system->id],
                    [
                        'system_id' => $system->id,
                        'name'      => $mod['name'],
                        'code'      => $mod['code'],
                        'icon'      => $mod['icon'] ?? null,
                    ]
                );

                foreach ($mod['submodules'] as $sub) {
                    Submodule::updateOrCreate(
                        ['code' => $sub['code'], 'module_id' => $module->id],
                        [
                            'module_id' => $module->id,
                            'name'      => $sub['name'],
                            'code'      => $sub['code'],
                            'route'     => $sub['route'] ?? null,
                        ]
                    );
                }
            }
        }
    }
}
