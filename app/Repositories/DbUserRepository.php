<?php 

    namespace App\Repositories;

    class DbUserRepository implements UserRepositoryInterface 
    {
        public function create($attributes){
            dd('Crafting new user');
        }

    }

?>