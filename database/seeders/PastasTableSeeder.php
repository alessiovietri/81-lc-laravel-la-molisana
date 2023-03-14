<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Pasta;

class PastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Recupero i dati da config
        $pastas = config('pasta');

        // Inserisco i dati nel DB
        foreach ($pastas as $pasta) {
            $singlePasta = new Pasta;
            $singlePasta->title = $pasta['titolo'];
            $singlePasta->type = $pasta['tipo'];
            $singlePasta->cooking_time = $pasta['cottura'];
            $singlePasta->weight = $pasta['peso'];
            $singlePasta->image = $pasta['src'];
            $singlePasta->description = $pasta['descrizione'];
            $singlePasta->save();
        }
    }
}
