<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class AreaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $areas = ["Front-end", "Back-end", "Full-stack", "Devops", "Ciência de Dados", "UX e/ou UI Design", "Tester"];
        foreach ($areas as $area) {
            DB::table('areas')->insert([
                'name' => $area,
            ]);
        }
    }
}
