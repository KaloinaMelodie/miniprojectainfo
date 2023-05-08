@extends('layouts.bo')

@section('title', 'ajouter article')

@section('link')
<link href="{{url('/ckeditor/contents.css') }}" rel="stylesheet">
    <script src="{{url('/ckeditor/ckeditor.js') }}" ></script>    
@endsection

@section('content')
    <div class="pagetitle">
        <h1>Create new Article</h1>
        <br />
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
              @if(isset($success))
                    <div class="alert alert-success alert-dismissible fade show" role="alert">
                        <i class="bi bi-check-circle me-1"></i>
                        {{$success}}
                    </div>
                @endif
                <div class="card">
                  <div class="card-body">
                    <h5 class="card-title"></h5>
      
                    <!-- General Form Elements -->
                    <form action="{{route('articles.post')}}" name="Fc" id="FC" method="POST" enctype="multipart/form-data">
                        @csrf
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Titre</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="titre" required>
                        </div>
                      </div>   
                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Chapo</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" style="height: 100px" name="resume" required></textarea>
                        </div>
                      </div> 
                      <div class="row mb-3">
                        <legend class="col-form-label col-sm-2 pt-0">Categorie</legend>
                        <div class="col-sm-10">    
                            <?php
                        foreach ($listcategorie as $categorie) {?>  
                          <div class="form-check">
                            <input class="form-check-input" type="checkbox" name="categories[]" value="{{$categorie->idcategorie}} ">
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
                        <div id="image-preview"></div> 
                        </div>
                      </div>
                      <div class="row mb-3">
                        <label for="inputNumber" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                        <input class="form-control" name="img" type="file" id="image-input" required multiple>
                        </div>                        
                      </div>  
                      <script src="{{asset('/assetsBO/assets/js/showimg.js') }}" ></script> 
                      

                      <div class="row mb-3">
                        <label for="inputText" class="col-sm-2 col-form-label">Contenu</label>
                        <div class="col-sm-10">
                          <textarea class="form-control" name="contenu" style="height: 100px" required></textarea>
                        </div>
                      </div> 
                      <script>
                        CKEDITOR.replace('contenu');
                      </script>  
                      
                      <div class="row mb-3">
                        <label for="inputDateTime" class="col-sm-2 col-form-label">Date publication</label>
                        <div class="col-sm-10">
                          <input type="datetime-local" class="form-control" name="datepublication" required>
                        </div>
                      </div>
                                  
      
      
                      <div class="row mb-3">
                        <label class="col-sm-2 col-form-label"></label>
                        <div class="col-sm-10">
                          <button type="submit" class="btn btn-primary">Creer</button>
                        </div>
                      </div>
      
                    </form><!-- End General Form Elements -->
      
                  </div>
                </div>
      
              </div>
        </div>
    </section>
@endsection