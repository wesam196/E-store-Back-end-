<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Category extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function author(){
        return $this->belongsTO(User::class, 'user_id');
    }

}
