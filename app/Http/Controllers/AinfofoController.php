<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Varticlecategorie;
use App\Models\Article;
use App\Models\Categorie;
use Illuminate\Support\Facades\DB;

class AinfofoController extends Controller {
    function accueil(Request $request){
        $categorie = new Categorie(); 
        $listcategorie = $categorie->all();
        $nbredata = count(DB::Select("select * from article"));
        $nbreparpage = 3;
        $numero = 1;
        if(isset($request["previous"])){
            $numero=$request["previous"]-1;
        }
        if(isset($request["next"])){
            $numero=$request["next"]+1;
        }
        $off = ($numero-1)*$nbreparpage;
        
        $listVa = [];        
        $listarticle = DB::Select("select * from article order by datepublication desc limit ".$nbreparpage." offset ".$off);
        foreach($listarticle as $article){
            $va = new Varticlecategorie();
            $va->setArticle($article);
            $listVa[] = $va;
        }  
        $previous = false;     
        $next = false;     
        //disables
        if($nbredata <= $numero*$nbreparpage){
            $next=true;        
        }
        //disables
        if($numero==1){
            $previous=true;
        }
        // a envoier numero, disabled[previous, next]
        $pagin=array();
        $pagin['numero']=$numero;
        $pagin['previous']=$previous;
        $pagin['next']=$next;
        $pagin['nbrepage']=ceil($nbredata / $nbreparpage);


        $listarticleparcategorie = [];
        foreach($listcategorie as $cate){
            $listarticleparcate = DB::Select("select article.* 
            FROM article
            LEFT JOIN articlecategorie ON articlecategorie.idarticle = article.idarticle
            WHERE articlecategorie.idcategorie IS NOT NULL and articlecategorie.idcategorie=".$cate->idcategorie."
             order by datepublication desc limit 3");
             if(count($listarticleparcate)!=0){
                $listnow = array();
                foreach($listarticleparcate as $article){
                    $va = new Varticlecategorie();
                    $va->setArticle($article);
                    $listnow[] = $va;
                }     
                $data['categorie']=$cate;
                $data['listarticle']=$listnow;
                $listarticleparcategorie[]=$data;
            }
        }
        // print_r($listarticleparcategorie[0]['listarticle']);
        // print_r($listarticleparcategorie[0]);
        return view('/FO/Accueil',
        [
            'pagin'=>$pagin,
            'listcategorie'=>$listcategorie,
        'listarticle'=>$listVa,
        'listarticleparcate'=>$listarticleparcategorie]);
    }

    function categorie($id){
        $categorie = Categorie::find($id);
        $listcategorie = (new Categorie())->all();
        $listarticleparcategorie = [];
            $listarticleparcate = DB::Select("select article.* 
            FROM article
            LEFT JOIN articlecategorie ON articlecategorie.idarticle = article.idarticle
            WHERE articlecategorie.idcategorie IS NOT NULL and articlecategorie.idcategorie=".$categorie->idcategorie."
             order by datepublication desc ");
            $listnow = array();
            foreach($listarticleparcate as $article){
                $va = new Varticlecategorie();
                $va->setArticle($article);
                $listnow[] = $va;
            }     
            $data['categorie']=$categorie;
            $data['listarticle']=$listnow;
        return view('/FO/ListParCategorie',
        [
        'listarticleducate'=>$data,
        'listcategorie'=>$listcategorie]);
    }
    function fiche($idarticle){
        $listcategorie = (new Categorie())->all();
        $article = Article::find($idarticle);
        $va = new Varticlecategorie();
        $va->setArticle($article);
        // Voir aussi
        $voiraussi = DB::Select("select * from article where idarticle in (
            select article.idarticle FROM article JOIN articlecategorie ON articlecategorie.idarticle = article.idarticle where articlecategorie.idcategorie in
          (select idcategorie from articlecategorie where idarticle=".$idarticle.")
          ) and idarticle!=".$idarticle);
        // $key='fiche-'.$idarticle;
        $view=view('/FO/Article',['article' => $va,'listcategorie'=>$listcategorie, 'voiraussi'=>$voiraussi])->render();
        // if(!Cache::has($key)){
        //     Cache::put($key,$view);
        // }        
        // return Cache::get($key);
        return $view;
    }
}
