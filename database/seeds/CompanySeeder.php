<?php

use App\Company;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class CompanySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $companies = [
            [
                'name' => 'Torpedo', 'logo' => 'https://static.itjobs.pt/images/companies/91/378/3179/logo.png?btfc=1600694023',
                'description' => 'Somos especialistas SharePoint que oferecem uma gama completa de serviços para empresas que querem usar o SharePoint para aumentar a produtividade e eficiência e melhorar a colaboração.',
                'address' => 'Rua de Alfredo Cunha 155 1.º, loja 18, 4450-023', 'locale_id' => '16', 'contact' => '',
                'email' => 'hello@torpedo.pt', 'site' => 'https://www.torpedo.pt', 'linkedin' => 'https://www.linkedin.com/company/torpedo/'
            ],
        ];

        DB::table('companies')->delete();
        foreach ($companies as $company) {
            Company::create($company);
        }
    }
}
