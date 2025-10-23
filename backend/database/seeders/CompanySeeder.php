<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\Company;

class CompanySeeder extends Seeder
{
    /**
     * Seed the companies table.
     *
     * NOTE:
     * - Includes your brands (Zenith and Aether, Zenith Chronos, Aether Ornaments)
     * - Also includes ACME and BETA to satisfy the sample-credential requirement
     */
    public function run(): void
    {
        $companies = [
            // Your brand set (palette provided)
            [
                'name'          => 'Zenith and Aether',
                'code'          => 'ZNA',
                'primary_color' => '#52357B',
                'accent_color'  => '#B2D8CE',
                'logo_url'      => null,
            ],
            [
                'name'          => 'Zenith Chronos',
                'code'          => 'ZC',
                'primary_color' => '#5459AC',
                'accent_color'  => '#648DB3',
                'logo_url'      => null,
            ],
            [
                'name'          => 'Aether Ornaments',
                'code'          => 'AO',
                'primary_color' => '#B2D8CE',
                'accent_color'  => '#52357B',
                'logo_url'      => null,
            ],

            // Sample-credentials companies (Section 13)
            [
                'name'          => 'ACME',
                'code'          => 'ACME',
                'primary_color' => '#648DB3',
                'accent_color'  => '#B2D8CE',
                'logo_url'      => null,
            ],
            [
                'name'          => 'BETA',
                'code'          => 'BETA',
                'primary_color' => '#5459AC',
                'accent_color'  => '#52357B',
                'logo_url'      => null,
            ],
        ];

        foreach ($companies as $c) {
            Company::updateOrCreate(['code' => $c['code']], $c);
        }
    }
}
