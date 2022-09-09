<?php

namespace Database\Seeders;

//use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use Faker\Factory as Faker;

class EmployeesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // $faker = Faker::create();
        // DB::table('employees')->insert([
        //     'name' => $faker->name,
        //     'age' => $faker->numberBetween(18, 45),
        //     'designation' => 'Coding Language',
        //     'image' => $faker->image('public/uploads/employees/',400, 300,null, true),
        //     'gender' =>$faker->randomElement(['M','F']),
        //     'cgpa' =>$faker->randomFloat(1, 2, 3),
        //     'email' => $faker->email,
        //     'password' => Hash::make('password'),
        //     'city' => $faker->randomElement(['Lahore','Karachi','Balochistan']),
        //     'address' => $faker->address,
        // ]);

        $faker = Faker::create();
        for ($i=1; $i <= 50 ; $i++) { 
            $data = new Employee;
                $data->name=$faker->name;
                $data->age=$faker->numberBetween(18, 45);
                $data->designation='coding language';
                //$data->image = $faker->image('public/uploads/employees/',400, 300, null, false);
                $data->image = $faker->imageUrl(400, 300);
                $data->gender= $faker->randomElement(['M','F']);
                $data->cgpa=$faker->randomFloat(1, 2, 3);
                $data->city=$faker->randomElement(['Lahore','Karachi','Balochistan']);
                $data->address=$faker->address;
                $data->email=$faker->email;
                $data->password=Hash::make('password');
                $data->save();
        }
        

    }
}
