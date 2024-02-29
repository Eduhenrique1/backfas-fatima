<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    public function users()
    {
        return $this->belongsToMany(User::class);
    }
    public function companies()
    {
        return $this->belongsToMany(Company::class);
    }
    public function groups()
    {
        return $this->belongsToMany(Group::class);
    }
   

    use HasFactory;
    protected $fillable = [
        'title',
        'description_work',
       
    ];
    

}
