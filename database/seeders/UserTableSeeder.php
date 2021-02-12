<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use App\Models\User;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    private function seedUsers(){
        // Borramos los datos de la tabla
        \DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        \DB::table('users')->insert([
            'name' => 'Lizbeth Guerra',
            'email' => 'lizbeth@gmail.com',
            'password' => bcrypt('liz1997'),
            'role' => 2
		]);
		
		\DB::table('users')->insert([
            'name' => 'Oscar Ortega',
            'email' => 'Ortegaoscar97@gmail.com',
            'password' => bcrypt('Osor1085'),
            'role' => 0
        ]);

        \DB::table('users')->insert([
            'name' => 'Jose Rivera',
            'email' => 'jrivera@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);
    }
    public function run()
    {
        self::seedUsers();
        $this->command->info('Tabla usuarios inicializada con datos!');
    }
}
