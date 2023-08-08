<?php

namespace App\Console\Commands;

use App\Helpers\Helper;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Console\Command;

class addAuthor extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'add:author';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Add new author';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        $faker = \Faker\Factory::create();
        $params = [
            "first_name"=> $faker->firstName(),
            "last_name"=> $faker->lastName(),
            "birthday"=> Carbon::now(),
            "biography"=> $faker->word(),
            "gender"=> $faker->randomElement([
                "male",
                "female"
            ]),
            "place_of_birth"=> $faker->city()
        ];
        $token = User::first()->access_token;
        $path = 'authors';
        $response = Helper::royalApi('POST',$path,$params,$token);
        info('res',[$response]);
        if(isset($response['id'])){
            $this->info('Author created successfully.');
        }
    }
}
