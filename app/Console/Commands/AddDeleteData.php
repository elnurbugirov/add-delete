<?php

namespace App\Console\Commands;

use App\Models\PickVisa;
use GuzzleHttp\Client;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Date;

class AddDeleteData extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:delete';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return int
     */
    public function handle()
    {

        $client = new Client();
        $response = $client->request('GET', 'https://diplomatic-missions.pickvisa.com/api/v1/countries/all', [
            'headers' => [
                'Authorization' => 'd8488959-756f-401e-b97c-364cd770db92'
            ]
        ]);
        $quizzes = json_decode($response->getBody(),true);


        foreach($quizzes as $quiz){
            PickVisa::updateOrCreate(
                [
                    'slug' => $quiz['slug']
                ],
                [
                'alpha_2_code' => $quiz['alpha_2_code'],
                'alpha_3_code' => $quiz['alpha_3_code'],
                'numeric_code' => $quiz['numeric_code'],
                'slug' => $quiz['slug'],
                'name' => $quiz['name'],
                'display_name' => $quiz['display_name'],
                'keywords' => $quiz['keywords'],
                'translations' => json_encode($quiz['translations']),
            ]);
        }
        $this->info('DONE');
    }
}
