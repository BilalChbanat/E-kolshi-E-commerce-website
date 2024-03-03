<?php
namespace App\Repositories;

use App\Models\User;

interface UserRepositoryInterface
{
    public function getByEmail($email);

    public function getByToken($token);

    public function create($data);

    public function updatePassword($user, $password, $newToken);
}