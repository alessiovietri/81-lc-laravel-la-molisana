<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

// Models
use App\Models\Pasta;

class CsvPastasTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $pastas = [];

        // Recupero i dati da config
        $path = storage_path('app/pastas.csv');
        $pastasFile = fopen($path, 'r');

        $count = 0;
        while ( ($row = fgetcsv($pastasFile, null, ',', '"'))  !== false) {
            if ($count > 0) {
                $pastas[] = [
                    'titolo' => $row[1],
                    'tipo' => $row[2],
                    'cottura' => $row[3],
                    'peso' => $row[4],
                    'src' => ($row[5] == "NULL" ? null : $row[5]),
                    'descrizione' => ($row[6] == "NULL" ? null : $row[6])
                ];
            }

            $count++;
        }

        fclose($pastasFile);

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
