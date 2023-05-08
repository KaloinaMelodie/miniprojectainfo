@extends('layouts.fo')
@section('title', 'Intelligence : artificielle Ainfo')
@section('metadescri', 'Intelligence : artificielle Ainfo')
@section('content')
<!-- Trend section  -->

<div class="section">

    <div class="container">

        <div class="row">
            @foreach($listarticle as $articlecate)
            <?php $art = $articlecate->article?>
            <div class="col-md-4">
                <div class="post">
                    <a class="post-img" href="/article-{{$art->idarticle}}/{{Str::slug($art->titre) }}" title="About"><img src="data:image/png;base64,{{$art->image}}" width="300" height="150" alt="" </a>
                    <div class="post-body">
                        <div class="post-category">
                            @foreach($articlecate->getListcategorie() as $catego)
                                        <a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}">{{$catego->categorie}}</a>
                                    @endforeach
                        </div>
                        <h3 class="post-title"><a href="/article-{{$art->idarticle}}/{{Str::slug($art->titre) }}">
                            {{$art->titre}}</a></h3>
                        <ul class="post-meta">
                            <?php $dat = \Carbon\Carbon::parse($art->datepublication)->format('Y-m-d'); ?>
                            <li>{{$dat}}</li>
                        </ul>
                    </div>
                </div>

            </div>
            @endforeach
            
        </div>
        <div class="pagination">
            @if ($pagin['previous'])
            <a class="previous disabled">&laquo; Précédent</a>
            @else
            <a href="/?previous={{$pagin['numero']}}" class="previous">&laquo; Précédent</a>
            @endif
            <span class="current-page">Page {{ $pagin['numero'] }} sur {{ $pagin['nbrepage'] }}</span>
            @if ($pagin['next'])
            <a class="next disabled">Suivant &raquo;</a>
            @else
            <a href="/?next={{$pagin['numero']}}" class="next">Suivant &raquo;</a>
            @endif
        </div>



    </div>

</div>

<!--  Pub separe -->
<div class="section">

    <div class="container">

        <div class="row">

            <div class="col-md-12 section-row text-center">
                <a href="#" style="display: inline-block;margin: auto;" title="Pub">
                    <img class="img-responsive" src="{{asset('vendor/assetsFO/img/Banner-728x90.png')}}" width="728px" height="70px" alt="">
                </a>
            </div>

        </div>

    </div>

</div>
<!-- End Pub separe -->

<div class="section">

    <div class="container">

        <div class="row">
            <div class="col-md-8">
                @foreach($listarticleparcate as $articleparcate)
                <?php  
                $categorie = $articleparcate['categorie'];
                $listarticlecate = $articleparcate['listarticle'];
                 ?>
                <div class="row">
                    <div class="col-md-12">
                        <div class="section-title">
                            <h2 class="title">{{$categorie->categorie}}</h2>
                        </div>
                    </div>

                    @foreach($listarticlecate as $articlecate)
                    <?php $art = $articlecate->article?>
                    <div class="col-md-4">
                        <div class="post post-sm">
                            <a class="post-img" href="/article-{{$art->idarticle}}/{{Str::slug($art->titre) }}" title="About"><img src="data:image/png;base64,{{$art->image}}" width="200" height="100" alt="" ></a>
                            <div class="post-body">
                                <div class="post-category">
                                    @foreach($articlecate->getListcategorie() as $catego)
                                        <a href="/categorie-{{$catego->idcategorie}}/{{Str::slug($catego->categorie) }}" title="Categorie">{{$catego->categorie}} </a>
                                    @endforeach
                                </div>
                                <h3 class="post-title title-sm"><a href="/article-{{$art->idarticle}}/{{Str::slug($art->titre) }} " title="Title">
                                    </a>{{$art->titre}}</h3>
                                <ul class="post-meta">
                                    <?php $dat = \Carbon\Carbon::parse($art->datepublication)->format('Y-m-d'); ?>
                                    <li>{{$dat}}</li>
                                </ul>
                            </div>
                        </div>
                    </div>
                    @endforeach

                    
                </div>
                <div class="section-row loadmore text-center">
                    <a href="/categorie-{{$categorie->idcategorie}}/{{Str::slug($categorie->categorie) }}" title="More" class="primary-button">Load More</a>
                </div>
                @endforeach

            </div>
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

            </div>
        </div>

    </div>

</div>
@endsection