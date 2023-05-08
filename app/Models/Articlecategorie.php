<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Articlecategorie extends Model
{
    use HasFactory;
    protected $primaryKey = 'idarticlecategorie';
    public $timestamps = false;
    public $incrementing = false;
    protected $table = 'articlecategorie';
}
