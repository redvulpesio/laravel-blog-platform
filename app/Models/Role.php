<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

#[fillable(['name'])]
class Role extends Model
{
    use HasFactory;

    public function users(){
        return $this->belongsToMany(User::class,'role_user');
    }

}
