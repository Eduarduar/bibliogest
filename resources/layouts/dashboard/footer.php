<?php
function setFooter($args){
?>
    <script src="<?=JS?>jquery.js"></script>
    <script src="<?=JS?>bootstrap.js"></script>
    <script src="<?=JS?>sweetalert2.js"></script>
    <script src="<?=JS?>app.js"></script>

    <!-- Script para toggle del sidebar en móviles -->
    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            if (sidebar.classList.contains('-translate-x-full')) {
                sidebar.classList.remove('-translate-x-full');
                overlay.classList.remove('hidden');
            } else {
                sidebar.classList.add('-translate-x-full');
                overlay.classList.add('hidden');
            }
        }
    </script>

    <script>
        function toggleSidebar() {
            const sidebar = document.getElementById('sidebar');
            const overlay = document.getElementById('overlay');

            sidebar.classList.toggle('-translate-x-full');
            overlay.classList.toggle('hidden');
        }

        // Toggle del menú de usuario
        function toggleUserMenu() {
            const menu = document.getElementById('user-dropdown');
            menu.classList.toggle('hidden');
        }

        // Cerrar el menú si se hace clic fuera
        document.addEventListener('click', function (e) {
            const menu = document.getElementById('user-dropdown');
            const button = document.getElementById('user-menu-button');

            if (!menu.contains(e.target) && !button.contains(e.target)) {
                menu.classList.add('hidden');
            }
        });
    </script>

<?php
}

function closeFooter(){ ?>
        </main> <!-- End of page content -->
    </div> <!-- End of main content -->
</div> <!-- End of layout wrapper -->
</body>
</html>
<?php }
