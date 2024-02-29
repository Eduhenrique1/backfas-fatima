<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Group extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'description_group',
        'status',
        'hierarchy'
    ];
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
   
    public function works()
    {
        return $this->belongsToMany(Work::class);
    }

}
