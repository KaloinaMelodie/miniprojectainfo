<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Categorie;
use App\Models\Article;
use App\Models\Articlecategorie;
use Illuminate\Support\Facades\DB;

class ArticleController extends Controller
{
    function create(){
        $categorie = new Categorie();
        return view('BO/CreateArticle',['listcategorie'=>$categorie->all()]);
    }
    function save(Request $request){    
        $categorie = new Categorie();    
        //echo URL::current();
        $listidcategorie = $request->input('categories', []);
        $article =new Article();
        $article['titre']=$request->titre;
        $article['resume']=$request->resume;
        $article['contenu']=$request->contenu;
        $article['datepublication']=$request->datepublication;
        $image = $request->file('img');
        $contents = file_get_contents($image->getRealPath());
        $base64 = base64_encode($contents);
        $article['image'] = $base64;

        $article->save();    
        foreach($listidcategorie as $id){
            $articlecategorie = new Articlecategorie();
            $articlecategorie->idarticle = $article->idarticle;
            $articlecategorie->idcategorie = $id;
            $articlecategorie->save();
        }
        return view('BO/CreateArticle',['listcategorie'=>$categorie->all()]);
    }
    function edit($idarticle){
        $categorie = new Categorie();
        $article = Article::find($idarticle);
        $articate = DB::Select("select idcategorie from articlecategorie where idarticle=".$idarticle);
        $listidcategorie = array();
        foreach ($articate as $obj) {
            $listidcategorie[] = $obj->idcategorie;
        }
        if (session()->has('success')) {
            $success = session('success');
        } else {
            $success = null;
        }
        return view('BO/EditArticle',['article'=>$article, 'listcategorie'=>$categorie->all(), 'listidcategorie'=>$listidcategorie, 'success'=>$success]);
    }
    function update($idarticle, Request $request){
        $article = [];
        $article['titre']=$request->titre;
        $article['resume']=$request->resume;
        $article['contenu']=$request->contenu;
        $article['datepublication']=$request->datepublication;
        if($request->file('img')!=null){
            $image = $request->file('img');
            $contents = file_get_contents($image->getRealPath());
            $base64 = base64_encode($contents);
            $article['image'] = $base64;
        }
        Article::find($idarticle)->update($article);
        // $data = $this->edit($idarticle);
        // $data['success'] = ;

        return redirect()
        ->action('App\Http\Controllers\ArticleController@edit',['idarticle'=>$idarticle])
        ->with('success', 'Article updated successfully.');
    }
    function list() {
        $article = new Article();
        return view('BO/ListArticle',['listarticle' => $article->all()]);
    }
}
