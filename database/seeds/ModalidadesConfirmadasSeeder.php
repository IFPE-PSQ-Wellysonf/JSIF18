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
        Modalidades::whereIn('id', [1,2,4,5,6,7,8,9,10,11,12,13])
                    ->update(['confirmado' => 1]);
        Modalidades::whereNotIn('id', [1,2,4,5,6,7,8,9,10,11,12,13])
                    ->update(['confirmado' => 0]);
        Modalidades::create([
            'modalidade' => 'Jogos Eletrônicos (ESports)',
            'confirmado' => '1',
        ]);
        Modalidades::create([
            'modalidade' => 'Jogos populares',
            'confirmado' => '1',
        ]);
    }
}
