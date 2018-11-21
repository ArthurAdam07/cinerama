<?php
use App\filmes;
use Illuminate\Database\Seeder;

class filmesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        filmes::create([
            'title' => 'Nota Exemplo',
            'synopsis' => 'Descrição',
            'note' => '10',
            'datasheet' => 'ASDSA',
            'scheduledto' => '2018-09-01 13:15:00'
        ]);   
    }
}
