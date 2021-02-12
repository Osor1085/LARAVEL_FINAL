<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    private function seedUsers(){
        // Borramos los datos de la tabla
        \DB::table('users')->delete();
        // Añadimos una entrada a esta tabla
        
        //admin
		\DB::table('users')->insert([
            'name' => 'Oscar Ortega',
            'email' => 'Ortegaoscar97@gmail.com',
            'password' => bcrypt('Osor1085'),
            'role' => 0
        ]);
        
        //cliente
        \DB::table('users')->insert([
            'name' => 'Lizbeth Guerra',
            'email' => 'lizbeth@gmail.com',
            'password' => bcrypt('liz1997'),
            'role' => 2
		]);
		
        //support
        \DB::table('users')->insert([
            'name' => 'Soporte S1',
            'email' => 'jrivera@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);
        \DB::table('users')->insert([
            'name' => 'Soporte S2',
            'email' => 'andres@gmail.com',
            'password' => bcrypt('123456'),
            'role' => 1
        ]);
    }
    private function seedProjects(){
        // Borramos los datos de la tabla
        \DB::table('projects')->delete();
        // Añadimos una entrada a esta tabla
        \DB::table('projects')->insert([
            'name' => 'Proyecto A',
            'description'=>'El proyecto A consiste en el desarrollo de  una App android.'
		]);
		
		\DB::table('projects')->insert([
            'name' => 'Proyecto B',
            'description'=>'El proyecto B consiste en el desarrollo de  un juego.'
		]);
    }
    private function seedCategories(){
        // Borramos los datos de la tabla
        \DB::table('categories')->delete();
        // Añadimos una entrada a esta tabla
        \DB::table('categories')->insert([
            'name' => 'Categoria A1',
            'project_id'=>1
		]);
		
		\DB::table('categories')->insert([
            'name' => 'Categoria A2',
            'project_id'=>1
        ]);
        
        \DB::table('categories')->insert([
            'name' => 'Categoria B1',
            'project_id'=>2
        ]);
        
        \DB::table('categories')->insert([
            'name' => 'Categoria B2',
            'project_id'=>2
		]);
    }

    private function seedLevels(){
        \DB::table('levels')->delete();
        // Añadimos una entrada a esta tabla
        \DB::table('levels')->insert([
            'name' => 'Atencion telefonica',
            'project_id'=>1
		]);

        \DB::table('levels')->insert([
            'name' => 'Envio tecnico',
            'project_id'=>1
		]);

        \DB::table('levels')->insert([
            'name' => 'Mesa de ayuda',
            'project_id'=>2
		]);

        \DB::table('levels')->insert([
            'name' => 'Consulta especializada',
            'project_id'=>2
		]);
    }
    private function seedProjectUser(){
        \DB::table('project_user')->delete();
        \DB::table('project_user')->insert([
                'project_id' => 1,
                'user_id' => 3,
                'level_id' => 1
        ]);
        \DB::table('project_user')->insert([
            'project_id' => 1,
            'user_id' => 4,
            'level_id' => 2
    ]);
    }

    private function seedIncidents(){
        \DB::table('incidents')->delete();
        \DB::table('incidents')->insert([
                'title' => 'Primera incidencia',
                'description' => 'El programa se cierra repentinamnete',
                'severity' => 'N',

                'category_id' => 2,
                'project_id' => 1,
                'level_id' => 1,
                
                'client_id' => 2,
                'support_id' => 3
        ]);
    }

    public function run()
    {
        self::seedIncidents();
        $this->command->info('Tabla categorias inicializada con datos!');
    }
}
