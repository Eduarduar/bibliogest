<?php
include_once LAYOUTS . 'main_head.php';

setHeader($d);

?>

<!-- aqui va el home -->


<header class="bg-white shadow-md">
        <div class="container flex justify-between items-center px-4 py-3 mx-auto">
            <div class="flex items-center">
                <img src="<?=ASSETS?>img/logo.png" alt="BiblioGest Logo" class="mr-2 h-10">
                <span class="text-xl font-bold text-biblio-orange">bibliogest</span>
            </div>
            
            <!-- Desktop Navigation -->
            <nav class="hidden space-x-6 md:flex">
                <a href="#" class="text-biblio-orange hover:text-orange-600">Inicio</a>
                <a href="#sobre-nosotros" class="text-gray-600 hover:text-biblio-orange">Sobre nosotros</a>
                <a href="#caracteristicas" class="text-gray-600 hover:text-biblio-orange">Características</a>
                <a href="#como-funciona" class="text-gray-600 hover:text-biblio-orange">¿Cómo funciona?</a>
                <a href="#" class="text-gray-600 hover:text-biblio-orange">Beneficios</a>
                <a href="#" class="text-gray-600 hover:text-biblio-orange">Testimonios</a>
            </nav>
            
            <a href="/login" class="hidden px-4 py-2 text-white rounded md:block bg-biblio-orange hover:bg-orange-600">
                Iniciar sesión
            </a>
            
            <!-- Mobile Menu Button -->
            <button id="mobile-menu-button" class="text-gray-600 md:hidden focus:outline-none">
                <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M4 6h16M4 12h16M4 18h16"></path>
                </svg>
            </button>
        </div>
        
        <!-- Mobile Menu -->
        <div id="mobile-menu" class="hidden px-4 py-2 bg-white shadow-md md:hidden">
            <a href="#" class="block py-2 text-biblio-orange hover:text-orange-600">Inicio</a>
            <a href="#sobre-nosotros" class="block py-2 text-gray-600 hover:text-biblio-orange">Sobre nosotros</a>
            <a href="#caracteristicas" class="block py-2 text-gray-600 hover:text-biblio-orange">Características</a>
            <a href="#como-funciona" class="block py-2 text-gray-600 hover:text-biblio-orange">¿Cómo funciona?</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-biblio-orange">Beneficios</a>
            <a href="#" class="block py-2 text-gray-600 hover:text-biblio-orange">Testimonios</a>
            <a href="/login" class="px-4 py-2 mt-2 w-full text-white rounded bg-biblio-orange hover:bg-orange-600">
                Iniciar sesión
            </a>
        </div>
    </header>

    <!-- Hero Section -->
    <section class="py-12 hero-bg md:py-20">
        <div class="container px-4 mx-auto">
            <div class="flex flex-col items-center md:flex-row">
                <div class="mb-8 md:w-1/2 md:mb-0">
                    <h1 class="mb-4 text-3xl font-bold md:text-4xl text-biblio-orange">Sistema de Gestión de Biblioteca Escolar</h1>
                    <p class="mb-6 text-gray-700">
                        Administra tu biblioteca escolar de manera eficiente con BiblioGest. Gestiona libros, usuarios y préstamos en una sola plataforma intuitiva.
                    </p>
                    <div class="flex flex-col space-y-3 sm:flex-row sm:space-y-0 sm:space-x-4">
                        <a href="#" class="inline-flex justify-center items-center px-6 py-3 rounded border border-biblio-orange text-biblio-orange hover:bg-orange-100">
                            Sobre nosotros
                        </a>
                    </div>
                </div>
                <div class="flex justify-center md:w-1/2">
                    <div class="p-4 w-full max-w-md bg-white rounded-lg shadow-lg">
                        <div class="p-2 mb-4 bg-gray-100 rounded">
                            <div class="flex items-center">
                                <svg class="w-4 h-4 text-gray-400" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M21 21l-6-6m2-5a7 7 0 11-14 0 7 7 0 0114 0z"></path>
                                </svg>
                                <input type="text" placeholder="Buscar..." disabled readonly class="ml-2 w-full bg-transparent border-none focus:outline-none">
                            </div>
                        </div>
                        <div class="grid grid-cols-2 gap-4 mb-4">
                            <div class="text-center text-gray-500">Libros</div>
                            <div class="text-center text-gray-500">Usuarios</div>
                        </div>
                        <div class="grid grid-cols-2 gap-4">
                            <div class="flex justify-center items-center p-4 bg-gray-100 rounded">
                                <div class="w-6 h-6 rounded border border-gray-300"></div>
                            </div>
                            <div class="flex justify-center items-center p-4 bg-gray-100 rounded">
                                <div class="w-6 h-6 rounded border border-gray-300"></div>
                            </div>
                            <div class="flex justify-center items-center p-4 bg-gray-100 rounded">
                                <div class="w-6 h-6 rounded border border-gray-300"></div>
                            </div>
                            <div class="flex justify-center items-center p-4 bg-gray-100 rounded">
                                <div class="w-6 h-6 rounded border border-gray-300"></div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

<!-- Sobre Nosotros Section -->
<!-- Sobre Nosotros Section -->
    <section id="sobre-nosotros" class="py-12 bg-white md:py-20">
            <div class="container px-4 mx-auto">
                <h2 class="mb-8 text-2xl font-bold text-center md:text-3xl text-biblio-orange">Sobre Nosotros</h2>
                <div class="flex flex-col items-center md:flex-row">
                    <div class="mb-8 md:w-1/2 md:mb-0 md:pr-8">
                        <div class="p-4 w-full bg-white rounded-lg shadow-lg">
                            <!-- Barra superior del dashboard -->
                            <div class="flex justify-between items-center pb-2 mb-4 border-b border-gray-200">
                                <div class="flex items-center">
                                    <div class="mr-2 w-8 h-8 rounded-md bg-biblio-orange"></div>
                                    <span class="font-medium text-gray-700">BiblioGest</span>
                                </div>
                                <div class="flex space-x-2">
                                    <div class="w-6 h-6 bg-gray-200 rounded-full"></div>
                                    <div class="w-6 h-6 bg-gray-200 rounded-full"></div>
                                </div>
                            </div>
                            
                            <!-- Contenido del dashboard -->
                            <div class="flex mb-4">
                                <!-- Barra lateral -->
                                <div class="pr-3 w-1/4">
                                    <div class="flex items-center p-2 mb-2 bg-gray-100 rounded">
                                        <div class="mr-2 w-3 h-3 rounded-sm bg-biblio-orange"></div>
                                        <div class="w-full h-2 bg-gray-300 rounded"></div>
                                    </div>
                                    <div class="flex items-center p-2 mb-2 bg-gray-100 rounded">
                                        <div class="mr-2 w-3 h-3 bg-gray-300 rounded-sm"></div>
                                        <div class="w-full h-2 bg-gray-300 rounded"></div>
                                    </div>
                                    <div class="flex items-center p-2 mb-2 bg-gray-100 rounded">
                                        <div class="mr-2 w-3 h-3 bg-gray-300 rounded-sm"></div>
                                        <div class="w-full h-2 bg-gray-300 rounded"></div>
                                    </div>
                                    <div class="flex items-center p-2 bg-gray-100 rounded">
                                        <div class="mr-2 w-3 h-3 bg-gray-300 rounded-sm"></div>
                                        <div class="w-full h-2 bg-gray-300 rounded"></div>
                                    </div>
                                </div>
                                
                                <!-- Área principal -->
                                <div class="w-3/4">
                                    <!-- Tarjetas de estadísticas -->
                                    <div class="grid grid-cols-2 gap-3 mb-4">
                                        <div class="p-3 rounded bg-biblio-cream">
                                            <div class="mb-2 w-1/2 h-2 bg-gray-300 rounded"></div>
                                            <div class="text-lg font-bold text-biblio-orange">248</div>
                                        </div>
                                        <div class="p-3 rounded bg-biblio-cream">
                                            <div class="mb-2 w-1/2 h-2 bg-gray-300 rounded"></div>
                                            <div class="text-lg font-bold text-biblio-orange">156</div>
                                        </div>
                                    </div>
                                    
                                    <!-- Gráfico simple -->
                                    <div class="p-3 mb-4 bg-gray-100 rounded">
                                        <div class="mb-3 w-1/3 h-2 bg-gray-300 rounded"></div>
                                        <div class="flex items-end space-x-2 h-20">
                                            <div class="w-1/6 h-1/4 rounded-t bg-biblio-orange"></div>
                                            <div class="w-1/6 h-2/4 rounded-t bg-biblio-orange"></div>
                                            <div class="w-1/6 h-3/4 rounded-t bg-biblio-orange"></div>
                                            <div class="w-1/6 h-full rounded-t bg-biblio-orange"></div>
                                            <div class="w-1/6 h-2/3 rounded-t bg-biblio-orange"></div>
                                            <div class="w-1/6 h-1/2 rounded-t bg-biblio-orange"></div>
                                        </div>
                                    </div>
                                    
                                    <!-- Tabla simple -->
                                    <div class="p-2 bg-gray-100 rounded">
                                        <div class="flex justify-between pb-2 mb-2 border-b border-gray-200">
                                            <div class="w-1/4 h-2 bg-gray-300 rounded"></div>
                                            <div class="w-1/4 h-2 bg-gray-300 rounded"></div>
                                        </div>
                                        <div class="space-y-2">
                                            <div class="flex justify-between">
                                                <div class="w-1/3 h-2 bg-gray-300 rounded"></div>
                                                <div class="w-1/5 h-2 bg-gray-300 rounded"></div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="w-1/4 h-2 bg-gray-300 rounded"></div>
                                                <div class="w-1/5 h-2 bg-gray-300 rounded"></div>
                                            </div>
                                            <div class="flex justify-between">
                                                <div class="w-2/5 h-2 bg-gray-300 rounded"></div>
                                                <div class="w-1/5 h-2 bg-gray-300 rounded"></div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                <div class="md:w-1/2">
                    <h3 class="mb-4 text-xl font-bold text-gray-800">Nuestra Misión</h3>
                    <p class="mb-6 text-gray-600">
                        En BiblioGest, nos dedicamos a transformar la gestión de bibliotecas escolares mediante soluciones tecnológicas intuitivas y eficientes. Nuestro objetivo es facilitar el acceso al conocimiento y fomentar la lectura en instituciones educativas.
                    </p>
                    <h3 class="mb-4 text-xl font-bold text-gray-800">Nuestra Historia</h3>
                    <p class="mb-6 text-gray-600">
                        Fundada en 2020 por un equipo de bibliotecarios y desarrolladores de software, BiblioGest nació de la necesidad de modernizar los sistemas de gestión bibliotecaria en entornos educativos. Desde entonces, hemos ayudado a más de 200 escuelas a optimizar sus recursos y mejorar la experiencia de sus usuarios.
                    </p>
                    <div class="flex space-x-4">
                        <a href="#caracteristicas" class="inline-flex justify-center items-center px-6 py-3 text-white rounded bg-biblio-orange hover:bg-orange-600">
                            Conoce nuestras características
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Características Section -->
    <section id="caracteristicas" class="py-12 md:py-20 bg-biblio-orange">
        <div class="container px-4 mx-auto text-center">
            <h2 class="mb-2 text-2xl font-bold text-white md:text-3xl">Características Principales</h2>
            <p class="mx-auto mb-12 max-w-2xl text-white">
                BiblioGest ofrece todas las herramientas necesarias para gestionar eficientemente tu biblioteca escolar
            </p>
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Característica 1 -->
                <div class="p-6 rounded-lg bg-biblio-cream">
                    <div class="mx-auto feature-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 6.253v13m0-13C10.832 5.477 9.246 5 7.5 5S4.168 5.477 3 6.253v13C4.168 18.477 5.754 18 7.5 18s3.332.477 4.5 1.253m0-13C13.168 5.477 14.754 5 16.5 5c1.747 0 3.332.477 4.5 1.253v13C19.832 18.477 18.247 18 16.5 18c-1.746 0-3.332.477-4.5 1.253"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-biblio-orange">Gestión de Libros</h3>
                    <p class="text-gray-600">
                        Cataloga, organiza y administra todos los libros de tu biblioteca con facilidad.
                    </p>
                </div>
                
                <!-- Característica 2 -->
                <div class="p-6 rounded-lg bg-biblio-cream">
                    <div class="mx-auto feature-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M12 4.354a4 4 0 110 5.292M15 21H3v-1a6 6 0 0112 0v1zm0 0h6v-1a6 6 0 00-9-5.197M13 7a4 4 0 11-8 0 4 4 0 018 0z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-biblio-orange">Gestión de Usuarios</h3>
                    <p class="text-gray-600">
                        Administra estudiantes y personal docente con perfiles personalizados.
                    </p>
                </div>
                
                <!-- Característica 3 -->
                <div class="p-6 rounded-lg bg-biblio-cream">
                    <div class="mx-auto feature-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 5H7a2 2 0 00-2 2v12a2 2 0 002 2h10a2 2 0 002-2V7a2 2 0 00-2-2h-2M9 5a2 2 0 002 2h2a2 2 0 002-2M9 5a2 2 0 012-2h2a2 2 0 012 2m-3 7h3m-3 4h3m-6-4h.01M9 16h.01"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-biblio-orange">Sistema de Préstamos</h3>
                    <p class="text-gray-600">
                        Controla préstamos y devoluciones con fechas y notificaciones automatizadas.
                    </p>
                </div>
                
                <!-- Característica 4 -->
                <div class="p-6 rounded-lg bg-biblio-cream">
                    <div class="mx-auto feature-icon">
                        <svg class="w-6 h-6" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                            <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M9 19v-6a2 2 0 00-2-2H5a2 2 0 00-2 2v6a2 2 0 002 2h2a2 2 0 002-2zm0 0V9a2 2 0 012-2h2a2 2 0 012 2v10m-6 0a2 2 0 002 2h2a2 2 0 002-2m0 0V5a2 2 0 012-2h2a2 2 0 012 2v14a2 2 0 01-2 2h-2a2 2 0 01-2-2z"></path>
                        </svg>
                    </div>
                    <h3 class="mb-2 text-xl font-bold text-biblio-orange">Reportes y Estadísticas</h3>
                    <p class="text-gray-600">
                        Obtén informes detallados y tendencias de lectura.
                    </p>
                </div>
            </div>
        </div>
    </section>

    <!-- Cómo Funciona Section -->
    <section id="como-funciona" class="py-12 md:py-20">
        <div class="container px-4 mx-auto">
            <h2 class="mb-12 text-2xl font-bold text-center md:text-3xl">¿Cómo Funciona?</h2>
            
            <div class="grid grid-cols-1 gap-6 md:grid-cols-2 lg:grid-cols-4">
                <!-- Paso 1 -->
                <div class="p-6 bg-white rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="step-number">1</div>
                        <h3 class="text-xl font-bold text-biblio-orange">Registra tus Libros</h3>
                    </div>
                    <p class="text-gray-600">
                        Añade libros al sistema con todos sus detalles: título, autor, género, ISBN, etc.
                    </p>
                </div>
                
                <!-- Paso 2 -->
                <div class="p-6 bg-white rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="step-number">2</div>
                        <h3 class="text-xl font-bold text-biblio-orange">Gestiona Usuarios</h3>
                    </div>
                    <p class="text-gray-600">
                        Crea perfiles para estudiantes y personal con sus datos y permisos correspondientes.
                    </p>
                </div>
                
                <!-- Paso 3 -->
                <div class="p-6 bg-white rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="step-number">3</div>
                        <h3 class="text-xl font-bold text-biblio-orange">Administra Préstamos</h3>
                    </div>
                    <p class="text-gray-600">
                        Registra préstamos, establece fechas de devolución y envía recordatorios automáticos.
                    </p>
                </div>
                
                <!-- Paso 4 -->
                <div class="p-6 bg-white rounded-lg">
                    <div class="flex items-center mb-4">
                        <div class="step-number">4</div>
                        <h3 class="text-xl font-bold text-biblio-orange">Analiza Resultados</h3>
                    </div>
                    <p class="text-gray-600">
                        Visualiza estadísticas de uso y genera informes personalizados para tomar decisiones.
                    </p>
                </div>
            </div>
        </div>
    </section>

<!-- Beneficios Section -->
<section id="beneficios" class="py-12 bg-[#fff3e0] md:py-20">
    <div class="container px-4 mx-auto">
        <h2 class="mb-12 text-2xl font-bold text-center md:text-3xl text-biblio-orange">Beneficios</h2>
    
        <div class="grid grid-cols-1 gap-8 md:grid-cols-2">
            <!-- Columna izquierda -->
            <div>
                <div class="mb-8">
                    <div class="flex items-start mb-3">
                        <div class="p-2 mr-4 rounded-full bg-biblio-orange">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-gray-800">Ahorro de tiempo</h3>
                            <p class="text-gray-600">Automatiza procesos repetitivos como préstamos, devoluciones y recordatorios, liberando tiempo para que el personal se enfoque en actividades de mayor valor educativo.</p>
                        </div>
                    </div>
                </div>
            
                <div class="mb-8">
                    <div class="flex items-start mb-3">
                        <div class="p-2 mr-4 rounded-full bg-biblio-orange">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-gray-800">Reducción de errores</h3>
                            <p class="text-gray-600">Elimina errores comunes en el registro manual de préstamos y devoluciones, asegurando la integridad de los datos y evitando la pérdida de materiales.</p>
                        </div>
                    </div>
                </div>
            
                <div class="mb-8 md:mb-0">
                    <div class="flex items-start mb-3">
                        <div class="p-2 mr-4 rounded-full bg-biblio-orange">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-gray-800">Acceso desde cualquier lugar</h3>
                            <p class="text-gray-600">Consulta el catálogo, gestiona préstamos y accede a estadísticas desde cualquier dispositivo con conexión a internet, facilitando el trabajo remoto y la gestión fuera del horario escolar.</p>
                        </div>
                    </div>
                </div>
            </div>
        
            <!-- Columna derecha -->
            <div>
                <div class="mb-8">
                    <div class="flex items-start mb-3">
                        <div class="p-2 mr-4 rounded-full bg-biblio-orange">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-gray-800">Toma de decisiones basada en datos</h3>
                            <p class="text-gray-600">Obtén informes detallados sobre los hábitos de lectura, libros más solicitados y tendencias de uso, permitiéndote tomar decisiones informadas para la adquisición de nuevos materiales.</p>
                        </div>
                    </div>
                </div>
            
                <div class="mb-8">
                    <div class="flex items-start mb-3">
                        <div class="p-2 mr-4 rounded-full bg-biblio-orange">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-gray-800">Mejora de la experiencia del usuario</h3>
                            <p class="text-gray-600">Proporciona a estudiantes y profesores una interfaz intuitiva para buscar y reservar materiales, aumentando el uso de los recursos bibliotecarios y fomentando la lectura.</p>
                        </div>
                    </div>
                </div>
            
                <div>
                    <div class="flex items-start mb-3">
                        <div class="p-2 mr-4 rounded-full bg-biblio-orange">
                            <svg class="w-5 h-5 text-white" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M5 13l4 4L19 7"></path>
                            </svg>
                        </div>
                        <div>
                            <h3 class="mb-2 text-xl font-bold text-gray-800">Sostenibilidad y ahorro</h3>
                            <p class="text-gray-600">Reduce el uso de papel y optimiza la gestión de recursos, contribuyendo a la sostenibilidad ambiental y generando ahorros económicos a largo plazo.</p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    
        <div class="mt-12 text-center">
            <a href="#testimonios" class="inline-flex justify-center items-center px-6 py-3 text-white rounded bg-biblio-orange hover:bg-orange-600">
                Ver lo que dicen nuestros usuarios
            </a>
        </div>
    </div>
</section>

<!-- Testimonios Section -->
<section id="testimonios" class="py-12 md:py-20">
    <div class="container px-4 mx-auto">
        <h2 class="mb-12 text-2xl font-bold text-center md:text-3xl text-biblio-orange">Testimonios</h2>
    
        <div class="grid grid-cols-1 gap-8 md:grid-cols-3">
            <!-- Testimonio 1 -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div class="mr-4 w-12 h-12 bg-gray-300 rounded-full"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">María Rodríguez</h3>
                        <p class="text-sm text-gray-600">Bibliotecaria, Colegio San Agustín</p>
                    </div>
                </div>
                <p class="italic text-gray-700">
                    "BiblioGest ha transformado completamente nuestra biblioteca. Antes tardábamos horas en procesar préstamos y hacer inventario, ahora todo es automático y puedo dedicar más tiempo a ayudar a los estudiantes a encontrar los recursos que necesitan."
                </p>
                <div class="flex mt-4 text-biblio-orange">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
            </div>
        
            <!-- Testimonio 2 -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div class="mr-4 w-12 h-12 bg-gray-300 rounded-full"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Carlos Méndez</h3>
                        <p class="text-sm text-gray-600">Director, Instituto Tecnológico Moderno</p>
                    </div>
                </div>
                <p class="italic text-gray-700">
                    "Implementar BiblioGest fue una de las mejores decisiones que tomamos. Los informes estadísticos nos han permitido optimizar nuestro presupuesto para adquisiciones y hemos visto un aumento del 40% en el uso de la biblioteca por parte de los estudiantes."
                </p>
                <div class="flex mt-4 text-biblio-orange">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
            </div>
        
            <!-- Testimonio 3 -->
            <div class="p-6 bg-white rounded-lg shadow-md">
                <div class="flex items-center mb-4">
                    <div class="mr-4 w-12 h-12 bg-gray-300 rounded-full"></div>
                    <div>
                        <h3 class="font-bold text-gray-800">Laura Gómez</h3>
                        <p class="text-sm text-gray-600">Profesora de Literatura, Escuela Nueva Esperanza</p>
                    </div>
                </div>
                <p class="italic text-gray-700">
                    "Como profesora, BiblioGest me ha facilitado enormemente la tarea de recomendar lecturas a mis estudiantes. Puedo ver qué libros están disponibles en tiempo real y reservarlos para mis clases. El sistema de notificaciones automáticas ha reducido drásticamente los retrasos en las devoluciones."
                </p>
                <div class="flex mt-4 text-biblio-orange">
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                    <svg class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg">
                        <path d="M9.049 2.927c.3-.921 1.603-.921 1.902 0l1.07 3.292a1 1 0 00.95.69h3.462c.969 0 1.371 1.24.588 1.81l-2.8 2.034a1 1 0 00-.364 1.118l1.07 3.292c.3.921-.755 1.688-1.54 1.118l-2.8-2.034a1 1 0 00-1.175 0l-2.8 2.034c-.784.57-1.838-.197-1.539-1.118l1.07-3.292a1 1 0 00-.364-1.118L2.98 8.72c-.783-.57-.38-1.81.588-1.81h3.461a1 1 0 00.951-.69l1.07-3.292z"></path>
                    </svg>
                </div>
            </div>
        </div>
    
        <div class="mt-12 text-center">
            <a href="#" class="inline-flex justify-center items-center px-6 py-3 text-white rounded bg-biblio-orange hover:bg-orange-600">
                Solicitar una demostración
            </a>
        </div>
    </div>
</section>



<?php
include_once LAYOUTS . 'main_foot.php';

setFooter($d);

?>        <!-- JavaScript para el menú móvil -->
<script>
document.addEventListener('DOMContentLoaded', function() {
    const mobileMenuButton = document.getElementById('mobile-menu-button');
    const mobileMenu = document.getElementById('mobile-menu');
    
    mobileMenuButton.addEventListener('click', function() {
        mobileMenu.classList.toggle('hidden');
    });
    
    // Cerrar el menú al hacer clic en un enlace
    const mobileLinks = mobileMenu.querySelectorAll('a');
    mobileLinks.forEach(link => {
        link.addEventListener('click', function() {
            mobileMenu.classList.add('hidden');
        });
    });
    
    // Cerrar el menú al cambiar el tamaño de la ventana a desktop
    window.addEventListener('resize', function() {
        if (window.innerWidth >= 768) { // 768px es el breakpoint md de Tailwind
            mobileMenu.classList.add('hidden');
        }
    });
});
</script>
<?php

closefooter();
