<?php

namespace App\Http\Controllers;

use Faker\Factory as Faker;
use App\Http\Traits\CustomJobTrait;

class AddDataInQueue extends Controller
{
    use CustomJobTrait;

    public function index()
    {
        return view('welcome');
    }

    public function addFakeDataInQueue()
    {
        $faker = Faker::create();

        for ($i=0; $i < 100; $i++) { 
            $data = [];
            $data['email'] =  $faker->unique()->safeEmail();
            $get = $this->createJob(['payload' => json_encode($data) ]);
        }
        return redirect()->back()->withSuccess('Data Added in Queue');
    }
}
