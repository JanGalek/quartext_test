<?php

namespace App\UI\UserForm;

interface UserFormFactory
{
    public function create(): UserForm;
}