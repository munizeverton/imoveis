<?php

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->call('ImoveisTableSeeder');

        App\User::truncate();

        factory(App\User::class)->create(
            [
                'name' => 'Admin',
                'email' => 'admin@imoveis.com',
                'password' => bcrypt(123456),
                'remember_token' => str_random(10),
            ]
        );

        Model::reguard();
    }
}
