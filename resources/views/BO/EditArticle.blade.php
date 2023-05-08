@extends('layouts.bo')

@section('title', 'modifier article')

@section('link')
<link href="{{url('/vendor/ckeditor/contents.css') }}" rel="stylesheet">
    <script src="{{url('/vendor/ckeditor/ckeditor.js') }}" ></script>    
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Edit Article</h1>        
        <br />
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
              @if(isset($success))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{$success}}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                      </div>
                    @endif
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
      
                    <!-- General Form Elements -->
                    <form action="{{route('articles.put',['idarticle' => $article->idarticle])}}" method="POST" enctype="multipart/form-data">
                        @csrf
                        @method('PUT')
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titre" value="{{$article->titre}}" required>
                        </div>
                      </div>   
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Chapo</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" style="height: 100px" name="resume" required>{{$article->resume}}</textarea>
                        </div>
                      </div> 
                      <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Categorie</legend>
                        <div class="col-sm-10">    
                            <?php
                        foreach ($listcategorie as $categorie) {?>  
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{$categorie->idcategorie}}" 
                            @if( in_array($categorie->idcategorie, $listidcategorie))
                                checked
                            @endif
                            >
                            <label class="form-check-label" >
                                {{$categorie->categorie}}
                            </label>
                          </div>      
                          <?php }?>        
                        </div>
                      </div>   
                      <div class="row mb-3">
                        <div class="col-sm-2"></div>
                        <div class="col-sm-10">
                        <div id="image-preview">
                            <img src="data:image/png;base64,{{$article->image}}" alt="" style="width:200px;height:200px">
                        </div> 
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                        <input class="form-control" name="img" type="file" id="image-input" multiple>
                        </div>                        
                      </div>  
                      <script src="{{asset('/assetsBO/assets/js/showimg.js') }}" ></script> 
                      

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Contenu</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="contenu" style="height: 100px" required>{{$article->contenu}}</textarea>
                        </div>
                      </div> 
                      <script>
                        CKEDITOR.replace('contenu');
                      </script>  
                      
                      <div class="row mb-3">
                        <label for="inputDateTime" class="col-sm-2 col-form-label">Date publication</label>
                        <div class="col-sm-10">
                          <input id="iddatepub" type="datetime-local"  class="form-control" name="datepublication" required>
                        </div>
                      </div>
                                  
                      <script>
                        const dateString = "<?php echo $article->datepublication ?>";        
                            const date = new Date(Date.parse(dateString));
                            const options = { year: 'numeric', month: '2-digit', day: '2-digit', hour: '2-digit', minute: '2-digit', hour12: false };
                            const localString = date.toLocaleString('mg-MG', options).replace(/[/]/g, '-');
                            document.getElementById("iddatepub").value=localString;
                    </script>
                    
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Modifier</button>
                        </div>
                      </div>
      
                    </form><!-- End General Form Elements -->
      
                  </div>
                </div>
      
              </div>
        </div>
    </section>
@endsection

