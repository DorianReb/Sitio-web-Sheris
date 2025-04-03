@extends('layouts.app')

@section('content')
<div class="container bg-white">
    <div class="row">
        <div class="col-6 p-4 mt-4 pb-0 text-">
            <div class="row border-bottom border-4 border-warning">
            </div>
            <div class="row">
                <div class="col">
                    <h1>Alexis Malagon Antonio</h1>
                    <h2>Ingeniero en sistemas computacionales</h2>
                </div>
            </div>
            <div class="row">
                <div class="col">
                    <h3>Perfil</h3>
                    <p>
                        Estudiante de ingeniería en sistemas computacionales del Tecnológico de Estudios Superiores de Valle de Bravo. Ingresó en el año 2023 y desde entonces anda batallando en cualquier clase, pero quién sabe cómo hace para recuperarse a último momento. Pero aquí lo importante es que, aunque se estrese, le echa ganas xd.
                    </p>
                </div>
            </div>
        </div>

        <div class="col-6 bg-warning">
            {{-- asset=127.0.0.0 hace referencia a public --}}
            <img src="{{ asset('img/amg.jpg') }}" class="rounded-circle mx-auto d-block w-50" alt="fotografía">
        </div>

        <div class="row">
            <div class="col-6 border-right border-4 border-warning">
                <h2 class="text-center pt-4">Experiencia</h2>
                <div class="row pt-4">
                    <div class="col">
                        <h4 class="text-center">Estudiante del TESVB</h4>
                        <ul>
                            <li>Estudiante de investigación</li>
                            <li>Estudiante regular</li>
                        </ul>
                    </div>
                </div>
                <div class="row pt-4">
                    <div class="col">
                        <h4 class="text-center">Desarrollador web</h4>
                        <ul>
                            <li>Desarrollador web con Laravel</li>
                            <li>Configuración y despliegue de VPS</li>
                        </ul>
                    </div>
                </div>

                <div class="row pt-4">
                    <div class="col">
                        <h4 class="text-center">Programador de PLC</h4>
                        <ul>
                            <li>Diseño de modelos en PLC</li>
                            <li>Tratamiento de datos</li>
                        </ul>
                    </div>
                </div>
            </div>

            <div class="col col-6">
                <div class="row">
                    <div class="row">
                        <h3>Educacion</h3>
                        <div class="col-6 pt-3">
                            <h4>Secundaria</h4>
                            <h5 class="text-secondary">OFTV No. 0029 Antonio Caso</h5>
                        </div>
                        <div class="col-6">
                            <h4>Informatica basica</h4>
                            <h5 class="text-secondary">Grupo CUADII</h5>
                        </div>
                        <div class="col-6">
                            <h4>Preparatoria</h4>
                            <h5 class="text-secondary">COBAEM 64 Amanalco</h5>
                        </div>
                        <div class="col-6">
                            <h4>Graduado en Tecnologias de la informacion y la comunicación</h4>
                            <h5 class="text-secondary">COBAEM 64 Amanalco</h5>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col"></div>
                    </div>
                    <div class="row">
                        <div class="col"></div>
                    </div>
                </div>
                <div class="row pt-3">
                    <h3>Contacto</h3>
                    <div class="col">
                        <ul>
                        <li>Telefono</li>
                        <li>Telefono fijo</li>
                        <li>Dirección</li>
                        <li>Correo electronico</li>
                        </ul>
                    </div>
                </div>
                    
                <div class="row pt3">
                    <h3>Intereses</h3>
                    <ul class="ms-4 text-secondary">
                        <li>Jugar videojuegos</li>
                        <li>Tomar fotografias</li>
                        <li>Grabar videos</li>
                        <li>Ciclismo</li>

                    </ul>
                </div>
            </div>
            </div>
        </div>
    </div>
</div>
@endsection
