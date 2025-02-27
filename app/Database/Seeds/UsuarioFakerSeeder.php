<?php

namespace App\Database\Seeds;


use CodeIgniter\Database\Seeder;




class UsuarioFakerSeeder extends Seeder
{
    public function run()
    {
        $usuarioModel = new \App\Models\UsuarioModel();

        // use the factory to create a Faker\Generator instance
        $faker = \Faker\Factory::create();

        $criarQuantosUsuarios = 5000;

        $usuariosPush = [];

        for($i = 0; $i < $criarQuantosUsuarios; $i++){
            array_push($usuariosPush, [
                'nome' => $faker->unique()->name,
                'email' => $faker->unique()->email,
                'password_hash' => 123456, // alterar o faker seeder quando criptografar a senha hash
                'ativo' => $faker->numberBetween(0,1), //insere dados faker true ou false

            ]);
        }
        // echo '<prep>';
        // print_r($usuariosPush);
        // exit;

        $usuarioModel->skipValidation(true) // bypass na validaçao
                     ->protect(false) // bypass na proteçao dos campos de allowedFields
                     ->insertBatch($usuariosPush);

        echo "$criarQuantosUsuarios criados com sucesso!";
                    }
}
