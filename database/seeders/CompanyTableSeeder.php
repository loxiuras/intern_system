<?php

namespace Database\Seeders;

use App\Models\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompanyTableSeeder extends Seeder {

    public function run()
    {
        DB::table('companies')->delete();

        Company::create([
            'name' => 'Van Suilichem Online',
            'legal_name' => 'Van Suilichem Online',
            'street_name' => 'Bonegraafseweg',
            'house_number' => 6,
            'postal_code' => '66669 MH',
            'city' => 'Dodewaard',
            'province' => 'Gelderland',
            'country' => 'Nederland',
            'telephone' => '0488 443029',
            'primary_website' => 'www.suilichem.com',
            'primary_email' => 'info@suilichem.com',
            'primary_invoice_email' => 'info@suilichem.com',
            'optional_invoice_emails' => 'cor@suilichem.com,facturen@suilichem.com',
            'active' => 1,
        ]);

        Company::create([
            'name' => 'Rivierenland Administratie- en advieskantoor',
            'legal_name' => 'AAK Rivierenland',
            'street_name' => 'Tolsestraat ',
            'house_number' => 10,
            'postal_code' => '4043 KB',
            'city' => 'Opheusden',
            'province' => 'Gelderland',
            'country' => 'Nederland',
            'telephone' => '0488 750972',
            'primary_website' => 'www.aakrivierenland.nl',
            'primary_email' => 'info@aakrivierenland.nl',
            'primary_invoice_email' => 'info@aakrivierenland.nl',
            'optional_invoice_emails' => '',
            'active' => 1,
        ]);

        $insertBulkData = false;
        if ( $insertBulkData ) {
            Company::factory()
                ->count(2000)
                ->create();
        }
    }

}
