<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BloodGroup extends Model
{
    use HasFactory;

    //public $timestamps = false;

    //TABLE
    public $table = 'blood_groups';

    //FILLABLE
    protected $fillable = [];

    //HIDDEN
    protected $hidden = [];

    //APPENDS
    protected $appends = [];

    //WITH
    protected $with = [];

    //CASTS
    protected $casts = [];

    //RELATIONSHIPS
    //public function example(){
    //    return $this->hasMany();
    //}

    public function users()
    {
        return $this->hasMany(User::class);
    }

    //ATTRIBUTES
    //public function getExampleAttribute()
    //{
    //    return $data;
    //}

}
