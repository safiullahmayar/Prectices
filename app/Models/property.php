<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class property extends Model
{
    use HasFactory;
    protected $fillable = [
        'type_name',
        'description',
        'ican_type',
    ];
}
