@extends('layouts.app')

@section('content')

<div class="row align-items-start">

    {{--Columna 1--}}
  <div class="col-2" style="background-color:rgb(209, 7, 17); color: white;">
     <img src="{{ asset('img/amg.jpg') }}" class="rounded-circle mx-auto d-block w-50" alt="fotografía">
        <div class="row-4 fw-bold">
          <div>
             <ul> <p><span><i class="fa-solid fa-cloud"></i></span> Mi nube</p></ul>
             <ul> <p><span><i class="fa-solid fa-users-line"></i></span> Archivos compartidos</p></ul>
             <ul><p><span><i class="fa-solid fa-star"></i></span>Favoritos</p></ul>
          </div>
          <div class="mt-4">
            <ul><p><span><i class="fa-solid fa-gear"></i></span>Ajustes</p></ul>
            <ul><p><span><i class="fa-solid fa-right-from-bracket"></i></span>Salir</p></ul>
          </div>
        </div>
  </div>

    {{--columna 2--}}

  <div class="col-7 p-4">
    <div class="mb-4">
      <input type="text" class="form-control" placeholder="Buscar archivos...">
    </div>
      <h5 class="text-primary fw-bold">Categorías</h5> {{--Enunciado de categorias--}}

        <div class="row mb-4">
          <div class="col-md-3">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center" style="background-color: #7A5197; height: 150px;">
                <div class="card-body">
                  <i class="fa-solid fa-image fa-2x text-light"></i>
                  <p class="mt-2 text-light fw-bold">Imágenes</p>
                  <p class="mt-1 text-light">480 Archivos</p>
                </div>
              </div>
            </button>
          </div>

          <div class="col-md-3">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center" style="background-color: #128C7E; height: 150px;">
                <div class="card-body">
                  <i class="fa-solid fa-file fa-2x text-light"></i>
                  <p class="mt-2 text-light fw-bold">Documentos</p>
                  <p class="mt-1 text-light">190 Archivos</p>
                </div>
             </div>
            </button>
          </div>

          <div class="col-md-3">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center" style="background-color: #E3AADD; height: 150px;">
                <div class="card-body">
                  <i class="fa-solid fa-video fa-2x text-light"></i>
                  <p class="mt-2 text-light fw-bold">Videos</p>
                  <p class="mt-1 text-light">30 Archivos</p>
                </div>
             </div>
            </button>
          </div>

          <div class="col-md-3">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center" style="background-color: #006da4; height: 150px;">
                <div class="card-body">
                  <i class="fa-solid fa-microphone fa-2x text-light"></i>
                  <p class="mt-2 text-light fw-bold">Audio</p>
                  <p class="mt-1 text-light">80 Archivos</p>
                </div>
             </div>
            </button>
          </div>
      </div>

      <div>
        <h5 class="text-primary fw-bold">Archivos</h5>
      </div>

        <div class="row md-4">
          <div class="col-md-2">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center">
                <div class="card-body">
                <i class="fa-solid fa-bars" style="color: #7A5197;"></i>
                <p class="mt-2 fw-bold">Trabajo</p>
                <p class="mt-1 fw-bold">820 Archivos</p>
                </div>
              </div>
            </button>
          </div>

          <div class="col-md-2">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center">
                <div class="card-body">
                <i class="fa-solid fa-user" style="color: #128C7E;"></i>
                <p class="mt-2 fw-bold">Personal</p>
                <p class="mt-1 fw-bold">115 Archivos</p>
                </div>
              </div>
            </button>
          </div>

          <div class="col-md-2">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center">
                <div class="card-body">
                  <i class="fa-solid fa-graduation-cap" style="color: #E3AADD;"></i>
                  <p class="mt-2 fw-bold">Escuela</p>
                  <p class="mt-1 fw-bold">64 Archivos</p>
                </div>
              </div>
            </button>
          </div>

          <div class="col-md-2">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center">
                <div class="card-body">
                  <i class="fa-solid fa-box-archive" style="color: #006da4;"></i>
                  <p class="mt-2 fw-bold">Archivos</p>
                  <p class="mt-2 fw-bold">21 Archivos</p>
                </div>
              </div>
            </button>
          </div>

          <div class="col-md-2">
            <button type="button" class="btn w-100 p-0 border-0 shadow">
              <div class="card text-center" style="height: 150px;"> 
                 <div class="card-body d-flex flex-column justify-content-center align-items-center">
                    <i class="fa-solid fa-plus fa-2x" style="color: #006da4; margin-bottom: 5px;"></i>
                    <p class="mt-2 fw-bold">Agregar</p> 
                    <p class="mt-2 fw-bold">&nbsp;</p> 
                  </div>
                </div>
            </button>
          </div>
    </div>

    <div>
      <h5 class="text-primary fw-bold">Archivos recientes</h5>
      <table class="table">
        <thead>
          <tr>
            <th scope="col"><i class="fa-solid fa-camera"></i></th>
            <th scope="col">IMG_100000</th>
            <th scope="col">PNG file</th>
            <th scope="col">5 MB</th>
            <th scope="col"><i class="fa-solid fa-share-nodes"></i></th>
            <th scope="col"><i class="fa-solid fa-bars"></i></th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="col"><i class="fa-solid fa-video"></i></th>
            <th scope="col">Startup pitch</th>
            <th scope="col">AVI file</th>
            <th scope="col">105 MB</th>
            <th scope="col"><i class="fa-solid fa-share-nodes"></i></th>
            <th scope="col"><i class="fa-solid fa-bars"></i></th>
          </tr>
          <tr>
            <th scope="col"><i class="fa-solid fa-microphone"></i></th>
            <th scope="col">Freestyle beat</th>
            <th scope="col">MP3 file</th>
            <th scope="col">21 MB</th>
            <th scope="col"><i class="fa-solid fa-share-nodes"></i></th>
            <th scope="col"><i class="fa-solid fa-bars"></i></th>
          </tr>
          <tr>
            <th scope="col"><i class="fa-solid fa-paste"></i></th>
            <th scope="col">Work proposal</th>
            <th scope="col">DOC x files</th>
            <th scope="col">500 KB</th>
            <th scope="col"><i class="fa-solid fa-share-nodes"></i></th>
            <th scope="col"><i class="fa-solid fa-bars"></i></th>
          </tr>
        </tbody>
      </table>
    </div>
  </div>

    {{--columna 3--}}
    <div class="col-3 p-4 bg bg-light">

      <div class="border p-3 text-center">
        <button type="button" class="btn w-100 p-0 border-0 shadow">
          <i class="fa-solid fa-upload fa-2x text-primary"></i>
          <p class="mt-2 text-primary fw-bold">Subir archivos</p>
        </button>
     </div>
      <div class="mt-4">
        <h6 class="text-primary fw-bold">Almacenamiento</h6>
          <p>75GB de 100GB usados</p>
      </div>
      <div class="mt-4">
        <h6 class="text-primary fw-bold">Carpetas Compartidas</h6>
        <table class="table">
          <thead>
          <tr>
              <th scope="col" style="background-color: #9DB0CE;"></th>
              <th scope="col" style="background-color: #9DB0CE;">Keynote Files</th>
              <th scope="col" style="background-color: #9DB0CE;"><i class="fa-solid fa-user-large"></i></th>
            </tr>
            <tr>
              <th scope="col" style="background-color: #B8D8E3;"></th>
              <th scope="col" style="background-color: #B8D8E3;">Vacations Photos</th>
              <th scope="col" style="background-color: #B8D8E3;"><i class="fa-solid fa-user-large"></i></th>
            </tr>
            <tr>
              <th scope="col" style="background-color: #FEE1DD;"></th>
              <th scope="col" style="background-color: #FEE1DD;">Project report</th>
              <th scope="col" style="background-color: #FEE1DD;"><i class="fa-solid fa-user-large"></i></th>
            </tr>
            <tr>
              <button type="button" class="btn w-100 p-0 border-0 shadow">
                <i class="fa-solid fa-plus"></i>
                <p class="mt-2 text-primary fw-bold">Agregar más</p>
              </button>
            </tr>
          </thead>
        </table>
      </div>
    </div>
</div>
@endsection