<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Varticlecategorie extends Model
{
    use HasFactory;
    public $article;
    public $listcategorie;

    public function setArticle($article){
        $this->article=$article;
    }

    public function getListcategorie(){
        if($this->listcategorie==null){
            $this->listcategorie=[];
            $this->listcategorie = DB::Select("select categorie.* 
            FROM categorie
            LEFT JOIN articlecategorie ON articlecategorie.idcategorie = categorie.idcategorie
            WHERE articlecategorie.idcategorie IS NOT NULL and articlecategorie.idarticle=".$this->article->idarticle);

        }
        return $this->listcategorie;
    }

    public function __construct()
    {
        parent::__construct();
    }
}
