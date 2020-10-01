<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;


class TypeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $types = ["Estágio Curricular", "Estágio Extracurricular", "Estágio Profissional", "Estágio da Ordem Profissional", "outro"];
        foreach ($types as $type) {
            DB::table('types')->insert([
                'name' => $type,
                'created_at' => new DateTime(),
            ]);
        }
    }
}
