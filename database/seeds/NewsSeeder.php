<?php

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class NewsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('news')->insert($this->getData());
    }

    private function getData() {
        $faker = Faker\Factory::create('ru_RU');
        $data = [];

        for ($i = 0; $i < 60; $i++) {
            $data[] = [
                'title' => $faker->realText(rand(10, 40)),
                'description' => $faker->realText(rand(30, 70)),
                'text' => $faker->realText(rand(500, 4000)),
                'favorites' => rand(0,1),
                'location_id'=> $this->getLocation($i),
            ];
        }

        return $data;
    }

    private function getLocation($count) {
        if ($count % 2 === 0) {
            return null;
        }  else {
            return rand(1,2);
        }
    }
}
