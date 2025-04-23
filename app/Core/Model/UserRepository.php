<?php

namespace App\Core\Model;

use Nette\Database\Explorer;

class UserRepository
{
    public function __construct(private Explorer $db)
    {
    }

    public function create(string $name, string $email, \DateTimeImmutable $birthday): string
    {
        $uuid = $this->db->query('SELECT gen_random_uuid()')->fetchField();

        $this->db->table('users')->insert([
            'id' => $uuid,
            'name' => $name,
            'email' => $email,
            'birthdate' => $birthday,
        ]);

        return $uuid;
    }

    public function findById(string $id): User
    {
        $row = $this->db->table('users')->get($id);

        return new User($row->id, $row->name, $row->email, $row->birthdate);
    }
}