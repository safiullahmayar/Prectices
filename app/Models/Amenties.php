<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Amenties extends Model
{
    use HasFactory;
    // protected $table = 'amenties';
    protected $fillable = [
        'id',
        'amenites_name',
    ];
}
