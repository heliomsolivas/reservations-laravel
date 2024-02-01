<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    // it protects your model from mass assignment, only the fields you put in the fillable are fillable
    protected $fillable = ['name'];
}
