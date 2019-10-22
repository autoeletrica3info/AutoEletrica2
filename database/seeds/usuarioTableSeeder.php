<?php
use Illuminate\Database\Seeder;
use App\User;
class usuarioTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create(
            [
                'name' => 'Erick',
                'email' => 'erick@erick.com',
                'password' => bcrypt('erick123'),
                
            ]
            );
            User::create(
                [
                    'name' => 'joao',
                    'email' => 'joao@erick.com',
                    'password' => bcrypt('joao123'),
                ]
                );
    }
}
