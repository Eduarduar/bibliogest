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
    $url = $url[2];
    
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=CSS?>tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title><?=$args->title?></title> 
</head>
<body class="bg-gray-100 text-gray-800">
    <!-- Layout wrapper -->
    <div class="flex h-screen overflow-hidden">
        
        <!-- Sidebar -->
        <aside id="sidebar" class="bg-[#ffe6c8] text-[#e6942c] text-xl font-bold fixed inset-y-0 left-0 z-50 w-64 bg-white shadow-md transform -translate-x-full transition-transform duration-300 md:relative md:translate-x-0 ">
            <div class=" h-32 flex items-center justify-center font-bold text-xl border-b">
                <img src="<?= ASSETS ?>img/logo.png" class="w-32" alt="Logo">
            </div>
            <nav class="flex flex-col p-4 space-y-2">
                <a href="/dashboard/libros" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out hover:bg-[#e6942c] hover:text-[#ffe6c8] <?= (strpos($url, 'libros') !== false) ? 'bg-[#ffefdd] text-[#e6942c]' : '' ?>"><i class="bi bi-house mr-2"></i> Libros</a>
                <a href="/dashboard/usuarios" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out hover:bg-[#e6942c] hover:text-[#ffe6c8] <?= (strpos($url, 'usuarios') !== false) ? 'bg-[#ffefdd] text-[#e6942c]' : '' ?>"><i class="bi bi-graph-up mr-2"></i> Usuarios</a>
                <a href="/dashboard/prestamos" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out hover:bg-[#e6942c] hover:text-[#ffe6c8] <?= (strpos($url, 'prestamos') !== false) ? 'bg-[#ffefdd] text-[#e6942c]' : '' ?>"><i class="bi bi-gear mr-2"></i> Prestamos</a>
                <a href="/dashboard/reportes" class="flex items-center px-4 py-2 rounded transition-all transform hover:scale-110 hover:ease-in-out hover:bg-[#e6942c] hover:text-[#ffe6c8] <?= (strpos($url, 'reportes') !== false) ? 'bg-[#ffefdd] text-[#e6942c]' : '' ?>"><i class="bi bi-bar-chart-line mr-2"></i> Reportes</a>
            </nav>
            <div class="flex items-center h-full justify-center w-full">
                <!-- // texto de agradecimiento -->
                <p class="text-sm text-[#e6942c]">PI2 - Busquets</p>
            </div>
        </aside>

        <!-- Overlay para móviles -->
        <div id="overlay" class="fixed inset-0 bg-black bg-opacity-50 z-40 hidden md:hidden" onclick="toggleSidebar()"></div>

        <!-- Main content -->
        <div class="flex flex-col flex-1 w-full">
            <!-- Header -->
            <!-- Header -->
            <header class="h-16 bg-white shadow-md flex items-center justify-between px-4 bg-[#ffe6c8] relative">
                <button onclick="toggleSidebar()" class="md:hidden text-2xl">
                    <i class="bi bi-list"></i>
                </button>
                <h1 class="text-lg font-semibold">Panel de Control</h1>

                <!-- Usuario y menú -->
                <div class="relative">
                    <div id="user-menu-button" class="flex items-center space-x-2 cursor-pointer select-none" onclick="toggleUserMenu()">
                        <span class="text-sm text-gray-600">Usuario</span>
                        <i class="bi bi-person-circle text-2xl text-[#e6942c]"></i>
                    </div>

                    <!-- Dropdown -->
                    <div id="user-dropdown" class="absolute right-0 mt-2 w-40 bg-white rounded-lg shadow-lg border border-[#e6942c] hidden z-50">
                        <a href="/salir" class="block px-4 py-2 text-sm text-[#e6942c] hover:bg-[#ffe6c8] transition-colors duration-150">
                            <i class="bi bi-box-arrow-right mr-2"></i> Cerrar sesión
                        </a>
                    </div>
                </div>
            </header>


            <!-- Page content -->
            <main class="flex-1 overflow-y-auto p-6">
<?php
}
