@extends('layouts.bo')

@section('title', 'list article')

@section('content')
    <div class="pagetitle">
        <h1>List Article</h1>
        <br />
    </div><!-- End Page Title -->

    <section class="section">
        <div class="row">
            <div class="col-lg-12">
    
              <div class="card">
                <div class="card-body">
                  <!-- Table with stripped rows -->
                  <table class="table datatable">
                    <thead>
                      <tr>
                        <th scope="col">#</th>
                        <th scope="col">NO</th>
                        <th scope="col">titre</th>
                        <th scope="col">resume</th>
                        <th scope="col">img</th>
                        <th scope="col">datePublication</th>
                        <th scope="col">Action</th>
                      </tr>
                    </thead>
                    <tbody>
                      @foreach ($listarticle as $article)      
                      <tr>
                        <th scope="row">{{$article ->idarticle}}</th>
                        <td>{{$article ->articleno}}</td>
                        <td>{{$article ->titre}}</td>
                        <td>{{$article ->resume}}</td>
                        <td><img src="data:image/png;base64,{{$article->image}}" alt="" style="width:100px;height:50px"></td>
                        <td>{{$article ->datepublication}}</td>
                        <td>
                          <a href="/ainfobo/articles/{{$article ->idarticle}}/edit">
                            <i class="bi bi-pen"></i>
                          </a>
                          {{-- <a href="#">
                            <i class="bi bi-trash"></i>
                          </a> --}}
                        </td>
                      </tr>
                      @endforeach
                    
                    </tbody>
                  </table>
                  <!-- End Table with stripped rows -->
    
                </div>
              </div>
    
            </div>
          </div>
    </section>
@endsection

