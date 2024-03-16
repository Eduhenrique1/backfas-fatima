<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    use HasFactory;
    
    protected $fillable = [
        'fantasy',
        'social',
        'cnpj',
        'type',
        'responsible',
        'opening',
        'nationality',
        'description',
        'address',
        'phone',
        'website',
        'class',
        'faculty',
        'semester',
        'year',
        'group_id'
    ];

  
}
