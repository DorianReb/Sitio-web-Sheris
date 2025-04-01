@extends('layouts.navbar_landing_page')

@section('content')

    <!-- Sección Inicio -->
    <section id="inicio">
        <div class="container-fluid bg-morena position-relative p-0">
            <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
                <div class="carousel-inner">

                    <div class="carousel-item active" style="height: 100vh;">
                        <img src="{{ asset('img/tienda-regalo.jpg') }}" class="d-block" alt="Tienda de Regalos Sheris" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="carousel-item" style="height: 100vh;">
                        <img src="{{ asset('img/huevos-descargada.jpg') }}" class="d-block" alt="Decoraciones y Huevos Sheris" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                    <div class="carousel-item" style="height: 100vh;">
                        <img src="{{ asset('img/madres-descargada.jpg') }}" class="d-block" alt="Especial Día de las Madres Sheris" style="width: 100%; height: 100%; object-fit: cover;">
                    </div>

                </div>
            </div>
        </div>
    </section>


    <!-- Texto de bienvenida superpuesto -->
    <div class="position-absolute top-50 start-50 translate-middle text-white text-center bg-dark bg-opacity-50 p-4 rounded">
        <h1 class="fw-bold">¡Bienvenido a SHERIS!</h1>
        <p class="lead">El lugar perfecto para encontrar obsequios únicos y especiales.</p>
    </div>
    </div>
    </section>

    <!-- Sección Productos -->
    <section id="productos" class="container my-5">
        <h2 class="text-center fw-bold text-morena">Nuestros Productos Más Vendidos</h2>
        <div class="row g-4">
            <!-- Producto 1 -->
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <button type="button" class="btn p-0 text-start">
                        <div class="d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('img/uno.png') }}" class="w-100 h-auto" alt="Juego de cartas UNO">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-morena">UNO</h5>
                            <p class="card-text">UNO es el clásico juego de cartas familiares que es fácil de aprender e imposible de dejar.</p>
                            <p class="card-text fw-bold">$75.00 MXN</p>
                        </div>
                    </button>
                </div>
            </div>
            <!-- Producto 2 -->
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <button type="button" class="btn p-0 text-start">
                        <div class="d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('img/figura_spiderman.png') }}" class="w-100 h-auto" alt="Figura de Spiderman">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-morena">Figura de Acción de El Hombre Araña</h5>
                            <p class="card-text">Figura de Acción Hasbro Marvel Hombre Araña articulable de 30 cm para niños a partir de 4 años.</p>
                            <p class="card-text fw-bold">$239.00 MXN</p>
                        </div>
                    </button>
                </div>
            </div>
            <!-- Producto 3 -->
            <div class="col-md-4">
                <div class="card h-100 shadow">
                    <button type="button" class="btn p-0 text-start">
                        <div class="d-flex align-items-center justify-content-center" style="height: 250px; overflow: hidden;">
                            <img src="{{ asset('img/login.jpg') }}" class="w-100 h-auto" alt="Peluche Metal Sonic">
                        </div>
                        <div class="card-body">
                            <h5 class="card-title fw-bold text-morena">Metal Sonic Plush</h5>
                            <p class="card-text">Hue Hue Hue Hue</p>
                            <p class="card-text fw-bold">$420.00 MXN</p>
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Promociones -->
    <section id="promociones" class="bg-morena py-5 text-center text-light">
        <h2 class="fw-bold">Promociones Especiales</h2>
        <p>¡Descuentos imperdibles en productos seleccionados!</p>

        <div class="container mt-4">
            <div class="row justify-content-center g-4">
                <!-- Día del Niño -->
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('img/niño.jpeg') }}" class="card-img-top img-fluid" alt="Promoción Día del Niño" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-morena fw-bold">Día del Niño</h5>
                            <p class="card-text flex-grow-1">Celebra con un descuento especial en juguetes y juegos seleccionados.</p>
                            <p class="card-text fw-bold">$199.00 MXN</p>
                            <a href="#" class="btn btn-light text-morena mt-auto">Ver Promoción</a>
                        </div>
                    </div>
                </div>

                <!-- Día de la Madre -->
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('img/mamá.jpg') }}" class="card-img-top img-fluid" alt="Promoción Día de la Madre" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-morena fw-bold">Día de la Madre</h5>
                            <p class="card-text flex-grow-1">Disfruta de un descuento exclusivo en productos seleccionados para mamá.</p>
                            <p class="card-text fw-bold">$299.00 MXN</p>
                            <a href="#" class="btn btn-light text-morena mt-auto">Ver Promoción</a>
                        </div>
                    </div>
                </div>

                <!-- Día del Padre -->
                <div class="col-md-4">
                    <div class="card h-100 text-center">
                        <img src="{{ asset('img/papá.jpg') }}" class="card-img-top img-fluid" alt="Promoción Día del Padre" style="height: 250px; object-fit: cover;">
                        <div class="card-body d-flex flex-column">
                            <h5 class="card-title text-morena fw-bold">Día del Padre</h5>
                            <p class="card-text flex-grow-1">Ofertas especiales para sorprender a papá con un regalo único.</p>
                            <p class="card-text fw-bold">$259.00 MXN</p>
                            <a href="#" class="btn btn-light text-morena mt-auto">Ver Promoción</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Sección Sobre Nosotros -->
    <section id="sobre-nosotros" class="container my-5">
        <div class="row align-items-center">
            <!-- Imagen -->
            <div class="col-md-4 text-start">
                <img src="{{ asset('img/logo-sheris.png') }}" alt="Logo de Sheris" class="img-fluid rounded">
            </div>

            <!-- Texto -->
            <div class="col-md-8 text-start">
                <h2 class="fw-bold text-morena">Sobre Nosotros</h2>
                <p>
                    Desde 2005, en el corazón de Villa de Colorines, Valle de Bravo, SHERIS ha sido el destino ideal para encontrar obsequios únicos y especiales. Inspirados en la palabra inglesa "cherish", que significa valorar y apreciar, ofrecemos una cuidadosa selección de productos de calidad para sorprender en cualquier ocasión, como siempre, con la mejor atención a nuestros clientes.
                </p>
                <figure>
                    <blockquote class="blockquote">
                        <p class="fw-bold">¡Descubre el arte de regalar con nosotros!</p>
                    </blockquote>
                    <figcaption class="blockquote-footer">
                        Carmen Rodríguez <cite title="Source Title">Del Equipo de Sheris</cite>
                    </figcaption>
                </figure>
            </div>
        </div>
    </section>

    <!-- Sección Contacto -->
    <section id="contacto" class="bg-morena text-light py-5">
        <div class="container col-6">
            <h2 class="text-center fw-bold">Contacto</h2>
            <form>
                <div class="mb-3">
                    <label for="nombre" class="form-label">Nombre</label>
                    <input type="text" class="form-control" id="nombre" placeholder="Escribe tu nombre" required>
                </div>
                <div class="mb-3">
                    <label for="email" class="form-label">Correo Electrónico</label>
                    <input type="email" class="form-control" id="email" placeholder="ejemplo@correo.com" required>
                </div>
                <div class="mb-3">
                    <label for="mensaje" class="form-label">Mensaje</label>
                    <textarea class="form-control" id="mensaje" rows="4" placeholder="Escribe tu mensaje aquí..." required></textarea>
                </div>
                <div class="text-center">
                    <button type="submit" class="btn btn-light text-morena fw-bold">Enviar</button>
                </div>
            </form>
        </div>
    </section>

    <hr class="m-0" style="border-color: #fff;">

    <!-- Pie de Página -->
    <footer class="bg-morena text-white py-4">
        <div class="container text-center">
            <p class="mb-1">&copy; 2025 SHERIS. Todos los derechos reservados.</p>
        </div>
    </footer>

@endsection
