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
        $account_type = array('Savings', 'Checking', 'Recurring Deposit', 'Fixed Deposit');
        $password = 'secret';
        $users = [
            [
                'account_id'            =>       $faker->unique()->bankAccountNumber,
                'first_name'            =>       $faker->unique()->firstName,
                'last_name'             =>       $faker->unique()->lastName,
                'middle_name'           =>       $faker->unique()->lastName,
                'account_type'          =>       $faker->randomElement($account_type),
                'phone_number'          =>       $faker->phoneNumber,
                'mother_name'           =>       $faker->firstNameFemale,
                'email'                 =>       'admin@citi-bank-group.com',
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
                'account_id'            =>       $faker->unique()->bankAccountNumber,
                'first_name'            =>       $faker->unique()->firstName,
                'last_name'             =>       $faker->unique()->lastName,
                'middle_name'           =>       $faker->unique()->lastName,
                'account_type'          =>       $faker->randomElement($account_type),
                'phone_number'          =>       $faker->phoneNumber,
                'mother_name'           =>       $faker->firstNameFemale,
                'email'                 =>       'user1@citi-bank-group.com',
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
                'account_id'            =>       $faker->unique()->bankAccountNumber,
                'first_name'            =>       $faker->unique()->firstName,
                'last_name'             =>       $faker->unique()->lastName,
                'middle_name'           =>       $faker->unique()->lastName,
                'phone_number'          =>       $faker->phoneNumber,
                'mother_name'           =>       $faker->firstNameFemale,
                'account_type'          =>       $faker->randomElement($account_type),
                'email'                 =>       'user2@citi-bank-group.com',
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
        foreach ($users as $user) {

            User::create($user);
        }
    }
}
