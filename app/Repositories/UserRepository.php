<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Repositories\BaseRepository;
use App\Models\User;

class UserRepository
{
    private User $user;
    public function __construct(User $user) 
    {
        $this->user = $user;
    }

    public function getAllUser()
    {
        return $this->user->all();
    }
}
