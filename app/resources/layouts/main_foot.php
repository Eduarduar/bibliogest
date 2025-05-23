<?php

function setFooter($args)
{
    $ua = as_object($args->ua);
?>


    <footer class="py-8 bg-[#fff3e0]">
        <div class="container px-4 mx-auto text-center">
            <p class="text-gray-600">© 2025 BiblioGest - Sistema de Gestión de Biblioteca Escolar</p>
        </div>
    </footer>

    <script src="<?= JS ?>jquery.js"></script>
    <script src="<?= JS ?>bootstrap.js"></script>
    <script src="<?= JS ?>sweetalert2.js"></script>
    <script src="<?= JS ?>app.js"></script>
<?php
}
function closeFooter()
{ ?>
    </body>

    </html>
<?php }
