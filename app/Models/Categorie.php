<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Categorie extends Model
{
    use HasFactory;
    protected $primaryKey = 'idcategorie';
    public $timestamp = false;
    public $incrementing = false;
    protected $table = 'categorie';   
    protected $fillable =['categorie'];
}
