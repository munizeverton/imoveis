<?php

/*
|--------------------------------------------------------------------------
| Model Factories
|--------------------------------------------------------------------------
|
| Here you may define all of your model factories. Model factories give
| you a convenient way to create models for testing and seeding your
| database. Just tell the factory how a default model should look.
|
*/

$factory->define(App\User::class, function (Faker\Generator $faker) {
    return [
        'name' => $faker->name,
        'email' => $faker->safeEmail,
        'password' => bcrypt(str_random(10)),
        'remember_token' => str_random(10),
    ];
});


$factory->define(App\Models\Imovel::class, function (Faker\Generator $faker) {
    return [
        'valor_aluguel' => $faker->numerify('####.##'),
        'logradouro' => $faker->streetAddress,
        'numero' => $faker->numerify('##'),
        'complemento' => $faker->word,
        'bairro' => $faker->word,
        'cidade' => $faker->city,
        'estado' => $faker->word,
        'cep' => $faker->numerify('#####-###'),
        'descricao' => $faker->text(),
        'url_imagem' => $faker->url,
    ];
});