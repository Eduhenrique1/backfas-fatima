<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }

    public function works()
    {
        return $this->belongsToMany(Work::class);
    }

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
        'website'
    ];

  
}
