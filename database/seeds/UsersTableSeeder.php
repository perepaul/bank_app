<?php

use App\User;
use Faker\Generator as Faker;
use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker $faker)
    {
        $password = 'secret';
        $users = [
                        [
                            'account_id'            =>       $faker->unique()->randomDigit,
                            'first_name'            =>       $faker->unique()->firstName,
                            'last_name'             =>       $faker->unique()->lastName,
                            'email'                 =>       'admin@ftbank.com',
                            'password'              =>       $password,
                            'visible_password'      =>       $password,
                            'gender'                =>       1,
                            'account_number'        =>       $faker->unique()->bankAccountNumber,
                            'status'                =>       1,
                            'is_admin'              =>       1,
                            'balance'               =>       1000000,
                            'address'               =>       $faker->streetAddress
                        ],
                        [
                            'account_id'            =>       $faker->unique()->randomDigit,
                            'first_name'            =>       $faker->unique()->firstName,
                            'last_name'             =>       $faker->unique()->lastName,
                            'email'                 =>       'user1@ftbank.com',
                            'password'              =>       $password,
                            'visible_password'      =>       $password,
                            'gender'                =>       1,
                            'account_number'        =>       $faker->unique()->bankAccountNumber,
                            'status'                =>       2,
                            'is_admin'              =>       0,
                            'balance'               =>       1000000,
                            'address'               =>       $faker->streetAddress
                        ],
                        [
                            'account_id'            =>       $faker->unique()->randomDigit,
                            'first_name'            =>       $faker->unique()->firstName,
                            'last_name'             =>       $faker->unique()->lastName,
                            'email'                 =>       'user2@ftbank.com',
                            'password'              =>       $password,
                            'visible_password'      =>       $password,
                            'gender'                =>       3,
                            'account_number'        =>       $faker->unique()->bankAccountNumber,
                            'status'                =>       1,
                            'is_admin'              =>       0,
                            'balance'               =>       10000000,
                            'address'               =>       $faker->streetAddress
                        ]

                    ];
        foreach($users as $user){

            User::create($user);
        }
    }
}
