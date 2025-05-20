<?php

    function setFooter($args){
        $ua = as_object( $args->ua );
?>
    <script src="<?=JS?>jquery.js"></script>
    <script src="<?=JS?>bootstrap.js"></script>
    <script src="<?=JS?>sweetalert2.js"></script>
    <script src="<?=JS?>app.js"></script>
<?php
    }
    function closeFooter(){?>
        </body>
        </html>
    <?php }