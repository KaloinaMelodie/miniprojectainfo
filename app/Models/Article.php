<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $primaryKey = 'idarticle';
    public $timestamps = false;
    public $incrementing = true;
    protected $table = 'article';
    protected $fillable =['titre','resume','contenu','datepublication','image'];
}
