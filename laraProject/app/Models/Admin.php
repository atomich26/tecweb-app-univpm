<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Admin
{
    private $user;

    public function __construct($id){
        $this->user = User::find($id);

        if(Gate::denies('isAdmin', $user))
            $this->user = null;
    }

    
}
