<?php

/* use Faker\Generator as Faker; */

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| This directory should contain each of the model factory definitions for
| your application. Factories provide a convenient way to generate new
| model instances for testing / seeding your application's database.
|
*/
$faker = Faker\Factory::create('pt_BR');

$factory->define(App\User::class, function ($faker) {
    $cpf = $faker->numberBetween(10000000000, 99999999999);
    return [
        /* 'name' => $faker->name,
        'email' => $faker->unique()->safeEmail,
        'password' => '$2y$10$TKh8H1.PfQx37YgCzwiKb.KjNyWgaHb9cbcoQgdIVFlYg7B77UdFm', // secret
        'remember_token' => str_random(10), */
        'name' => $faker->firstName . " " .  $faker->lastName,
        'email'=> $faker->unique()->safeEmail,
        'password'=> bcrypt($cpf),
        'campus_id'=> $faker->numberBetween(1, 17),
        'siape'=> $faker->numberBetween(10000, 2099999),
        'cpf'=> $cpf,
        'cod_uorg'=> 1,
        'nome_uorg'=> 'Nome UORG',
        'nascimento'=> $faker->dateTimeBetween('-60 years', '-18 years')->format('Y-m-d'),
        'situacao_vinculo'=> 'ativo',
        'endereco_logradouro'=> $faker->streetName,
        'endereco_numero'=> $faker->buildingNumber,
        'endereco_complemento'=> '',
        'endereco_bairro'=> 'Centro',
        'endereco_cep'=> $faker->postcode,
        'endereco_municipio' => $faker->city
    ];
});
