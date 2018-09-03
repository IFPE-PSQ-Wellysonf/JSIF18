<?php

use Illuminate\Database\Seeder;
use App\Modalidades;

class ModalidadesConfirmadasSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Modalidades::whereIn('id', [1,2,4,5,6,7,8,9,10,11,12,13,14,15,16,17,18,19,20,21,22,23,24])
                    ->update(['confirmado' => 1]);
    }
}
