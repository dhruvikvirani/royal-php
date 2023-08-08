<?php

namespace App\Repository;

interface AuthRepositoryInterface{
    public function authenticate($request);
}