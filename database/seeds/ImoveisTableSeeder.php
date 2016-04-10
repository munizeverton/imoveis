<?php

use Illuminate\Database\Seeder;

class ImoveisTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        App\Models\Imovel::truncate();

        factory(App\Models\Imovel::class, 50)->create();
    }
}
