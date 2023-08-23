<?php

use Illuminate\Database\Seeder;
use App\Modalidades;

class ModalidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        Modalidades::create([
            'modalidade' => 'Atletismo',
        ]);
        Modalidades::create([
            'modalidade' => 'Badminton',
        ]);
        Modalidades::create([
            'modalidade' => 'E-sports - FIFA 23',
        ]);
        Modalidades::create([
            'modalidade' => 'E-sports - Street Fighter VI',
        ]);
        Modalidades::create([
            'modalidade' => 'Natação',
        ]);
        Modalidades::create([
            'modalidade' => 'Tênis de mesa',
        ]);
        Modalidades::create([
            'modalidade' => 'Xadrez',
        ]);
        Modalidades::create([
            'modalidade' => 'Basquete',
        ]);
        Modalidades::create([
            'modalidade' => 'Dominó',
        ]);
        Modalidades::create([
            'modalidade' => 'Futebol de Campo',
        ]);
        Modalidades::create([
            'modalidade' => 'Futevôlei',
        ]);
        Modalidades::create([
            'modalidade' => 'Futsal',
        ]);
        Modalidades::create([
            'modalidade' => 'Volei de quadra',
        ]);
        Modalidades::create([
            'modalidade' => 'Volei de praia',
        ]);

        /* 
        Modalidades 2019
        
        Modalidades::create([
            'modalidade' => 'Atletismo',
        ]);
        Modalidades::create([
                    'modalidade' => 'Futsal',
                ]);
        Modalidades::create([
                    'modalidade' => 'Tênis de mesa',
                ]);
        Modalidades::create([
                    'modalidade' => 'Basquete',
                ]);
        Modalidades::create([
                    'modalidade' => 'Futevôlei',
                ]);
        Modalidades::create([
                    'modalidade' => 'Natação',
                ]);
        Modalidades::create([
                    'modalidade' => 'Badminton',
                ]);
        Modalidades::create([
                    'modalidade' => 'Futebol',
                ]);
        Modalidades::create([
                    'modalidade' => 'Volei de praia',
                ]);
        Modalidades::create([
                    'modalidade' => 'Xadrez',
                ]);
        Modalidades::create([
                    'modalidade' => 'Dominó',
                ]);
        Modalidades::create([
                    'modalidade' => 'Volei de quadra',
                ]);
        Modalidades::create([
                    'modalidade' => 'Society master (maiores de 40 anos)',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - Queimado',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - Cabo de guerra',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - Corrida de saco',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - 7 cortes',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - Arremesso de 3',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - Pula corda',
                ]);
        Modalidades::create([
                    'modalidade' => 'Jogos populares - Bambolê',
                ]);
        Modalidades::create([
                    'modalidade' => 'E-sports - Just Dance',
                ]);
        Modalidades::create([
                    'modalidade' => 'E-sports - FIFA',
                ]);
        Modalidades::create([
                    'modalidade' => 'E-sports - KOF 97',
                ]);
        Modalidades::create([
                    'modalidade' => 'E-sports - Street Fight',
                ]); */

    }
}
