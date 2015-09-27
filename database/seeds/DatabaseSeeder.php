<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
        Model::unguard();

        $this->call('PosterTableSeeder');
    }

}

class PosterTableSeeder extends Seeder
{
    public function run()
    {
        App\Poster::truncate();

        factory(App\Poster::class, 20)->create();
    }
}
