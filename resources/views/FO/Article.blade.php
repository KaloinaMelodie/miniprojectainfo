@extends('layouts.fo')
<?php 
    $articlecate = $article;
    $art = $articlecate->article
?>
@section('title', $art->titre)
@section('metadescri', $art->resume)
@section('content')

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-8">

                <div class="section-row">
                    <div class="post-category">
                        @foreach($articlecate->getListcategorie() as $catego)
                                <a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}">{{$catego->categorie}}</a>
                            @endforeach
                    </div>
                    <h1>{{$art->titre}}</h1>
                    <img src="data:image/png;base64,{{$art->image}}" alt="" >
                    <ul class="post-meta">
                        <?php $dat = \Carbon\Carbon::parse($art->datepublication)->format('Y-m-d'); ?>
                        <li>{{$dat}}</li>
                    </ul>
                    <p class="chapo">
                        {{$art->resume}}
                    </p>

                </div>


                <div class="section-row">
                    {!!$art->contenu!!}
                </div>
            
                <div class="section-row">
                    <div class="section-title">
                        <h3 class="title">Voir aussi</h3>
                    </div>
                    <div class="row">
                        @foreach($voiraussi as $voir)
                        <div class="col-md-4">
                            <div class="post post-sm">
                                <a class="post-img" href="blog-post.html"><img src="img/post-4.jpg" alt=""></a>
                                <div class="post-body">
                                    <div class="post-category">
                                        <a href="category.html">Health</a>
                                    </div>
                                    <h3 class="post-title title-sm"><a href="blog-post.html">Postea senserit id eos,
                                            vivendo periculis ei qui</a></h3>
                                    <ul class="post-meta">
                                        <li><a href="author.html">John Doe</a></li>
                                        <li>20 April 2018</li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                        @endforeach

                    </div>
                </div>

            </div>


            <div class="col-md-4">
                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="{{asset('assetsFO/img/Banner-300x250.jpg')}}" alt="">
                    </a>
                </div>
                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach($listcategorie as $catego)
                            <li><a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}">{{$catego->categorie}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>
            </div> 
            
            
        </div>

    </div>

</div>
@endsection