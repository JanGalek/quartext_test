<?php

namespace App\Core\Model;

class User
{
    public function __construct(
        private string $id,
        private string $name,
        private string $email,
        private string $birthdate
    ) {

    }

    public function getId(): string
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getEmail(): string
    {
        return $this->email;
    }

    public function getBirthdate(): string
    {
        return $this->birthdate;
    }

    public function isOlderThan(int $age = 20): bool
    {
        $birth = new \DateTime($this->getBirthdate());
        $now = new \DateTime();
        return $now->diff($birth)->y > $age;
    }
}
