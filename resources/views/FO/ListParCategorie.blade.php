@extends('layouts.fo')
<?php 
    $categorie = $listarticleducate['categorie'];
    $listarticlecate = $listarticleducate['listarticle'];
?>
@section('title', $categorie->categorie)
@section('metadescri', $categorie->categorie)
@section('content')

<div class="page-header">
    <div class="page-header-bg" style="background-color:  #ee4266;" data-stellar-background-ratio="0.5"></div>
    <div class="container">
        <div class="row">
            <div class="col-md-offset-1 col-md-10 text-center">
                <h1 class="text-uppercase">{{$categorie->categorie}} et intelligence artificielle</h1>
            </div>
        </div>
    </div>
</div>
<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-8">

                @foreach($listarticlecate as $articlecate)
                    <?php $art = $articlecate->article?>
                <div class="post post-row">
                    <a class="post-img" href="/article-{{$art->idarticle}}/{{Str::slug($art->titre) }}" title="About"><img src="data:image/png;base64,{{$art->image}}" width="300" height="150" alt="" ></a>
                    <div class="post-body">
                        <div class="post-category">
                            @foreach($articlecate->getListcategorie() as $catego)
                                <a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}" title="Categorie">{{$catego->categorie}}</a>
                            @endforeach
                        </div>
                        <h3 class="post-title"><a href="/article-{{$art->idarticle}}/{{Str::slug($art->titre) }}" title="About">
                            {{$art->titre}}</a></h3>
                        <ul class="post-meta">
                            <?php $dat = \Carbon\Carbon::parse($art->datepublication)->format('Y-m-d'); ?>
                            <li>{{$dat}}</li>
                        </ul>
                        <p>
                            {{$art->resume}}
                        </p>
                    </div>
                </div>
                @endforeach

                

            </div>

            <!-- Full aside droite -->
            <div class="col-md-4">

                <div class="aside-widget text-center">
                    <a href="#" title="Pub" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="{{asset('vendor/assetsFO/img/Banner-300x250.jpg')}}" width="300" height="250" alt="">
                    </a>
                </div>





                <div class="aside-widget">
                    <div class="section-title">
                        <h2 class="title">Categories</h2>
                    </div>
                    <div class="category-widget">
                        <ul>
                            @foreach($listcategorie as $catego)
                            <li><a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}" title="Categorie">{{$catego->categorie}}</a></li>
                            @endforeach
                        </ul>
                    </div>
                </div>


                <div class="aside-widget text-center">
                    <a href="#" style="display: inline-block;margin: auto;">
                        <img class="img-responsive" src="{{asset('vendor/assetsFO/img/Banner-300x600.jpg')}}" width="300px" height="600px" alt="">
                    </a>
                </div>

            </div>
            <!-- End Full aside droite -->
        </div>

    </div>

</div>
@endsection