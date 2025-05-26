<?php
function setHeader($args){
    $ua = as_object($args->ua);
    if ($ua->sv == 0) {
        ?>
        <script>
            window.location.href = '/login';
        </script>
        <?php
        exit();
    }

    // obtener url actual
    $url = $_SERVER['REQUEST_URI'];
    $url = explode('/', $url);
    $url = (isset($url[2]) && $url[2] != '') ? $url[2] : $url[1];
    
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=CSS?>tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/2.3.1/css/dataTables.dataTables.css" />
    <script src="<?=JS?>jquery.js"></script>
    <script src="<?=JS?>app.js"></script>
    <title><?=$args->title?></title> 
<style>
    .tooltip-custom {
        pointer-events: none;
    }
</style>
</head>
<body class="text-gray-800 bg-gray-100">
    <!-- Layout wrapper -->
    <div class="flex overflow-hidden h-screen">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-[#ffe6c8] text-[#e6942c] text-xl font-bold fixed inset-y-0 left-0 z-50 w-64 shadow-md transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 ">
            <div class="flex justify-center items-center h-32 text-xl font-bold border-b">
                <img src="<?= ASSETS ?>img/logo.png" class="w-32" alt="Logo">
            </div>
            <nav class="flex flex-col p-4 space-y-2">
                <a href="/dashboard/libros" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out <?= (strpos($url, 'libros') !== false) ? 'bg-[#fff5dd] text-[#e6942c]' : 'hover:bg-[#e6942c] hover:text-[#ffe6c8]' ?>"><i class="mr-2 bi bi-house"></i> Libros</a>
                <a href="/dashboard/usuarios" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out <?= (strpos($url, 'usuarios') !== false) ? 'bg-[#fff5dd] text-[#e6942c]' : 'hover:bg-[#e6942c] hover:text-[#ffe6c8]' ?>"><i class="mr-2 bi bi-graph-up"></i> Usuarios</a>
                <a href="/dashboard/prestamos" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out <?= (strpos($url, 'prestamos') !== false) ? 'bg-[#fff5dd] text-[#e6942c]' : 'hover:bg-[#e6942c] hover:text-[#ffe6c8]' ?>"><i class="mr-2 bi bi-gear"></i> Prestamos</a>
                <a href="/dashboard/categorias" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out <?= (strpos($url, 'categorias') !== false) ? 'bg-[#fff5dd] text-[#e6942c]' : 'hover:bg-[#e6942c] hover:text-[#ffe6c8]' ?>"><i class="mr-2 bi bi-bar-chart-line"></i> Categorias</a>
                <a href="/dashboard/autores" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out <?= (strpos($url, 'autores') !== false) ? 'bg-[#fff5dd] text-[#e6942c]' : 'hover:bg-[#e6942c] hover:text-[#ffe6c8]' ?>"><i class="mr-2 bi bi-bar-chart-line"></i> Autores</a>
            </nav>
            <div class="flex justify-center items-center w-full h-full">
                <!-- // texto de agradecimiento -->
                <div class="relative group">
                    <p class="text-sm text-[#e6942c] cursor-pointer" id="pi2-busquets">
                        PI2 - Busquets
                    </p>
                    <div class="tooltip-custom invisible opacity-0 group-hover:visible group-hover:opacity-100 transition-opacity duration-200 absolute left-1/2 -translate-x-1/2 bottom-full mb-2 px-3 py-2 rounded bg-[#e6942c] text-white text-xs shadow-lg z-50 whitespace-nowrap">
                        proyecto integrador 2 - Rosales Busquets
                    </div>
                </div>
            </div>
        </aside>

        <!-- Overlay para móviles -->
        <div id="overlay" class="hidden fixed inset-0 z-40 bg-black bg-opacity-50 md:hidden" onclick="toggleSidebar()"></div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 w-full">
            <!-- Header -->
            <!-- Header -->
            <header class="h-16 shadow-md flex items-center justify-between px-4 bg-[#ffe6c8] relative">
                <button onclick="toggleSidebar()" class="text-2xl md:hidden">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="text-lg font-semibold">Panel de Control</h1>

                <!-- Usuario y menú -->
                <div class="relative">
                    <div id="user-menu-button" class="flex items-center space-x-2 cursor-pointer select-none" onclick="toggleUserMenu()">
                        <span class="text-sm text-gray-600"><?=$ua->nombre?></span>
                        <i class="bi bi-person-circle text-2xl text-[#e6942c]"></i>
                    </div>

                    <!-- Dropdown -->
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-[#e6942c] hidden z-50">
                        <a href="/login/logout" class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8] transition-colors duration-150">
                            <i class="mr-2 bi bi-box-arrow-right"></i> Cerrar sesión
                        </a>
                    </div>
                </div>
            </header>


            <!-- Page content -->
            <main class="overflow-y-auto flex-1 p-6">
<?php
}
