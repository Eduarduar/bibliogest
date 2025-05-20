<?php
include_once LAYOUTS . 'main_head.php';

setHeader($d);

?>

<!-- aqui va el home -->

<!--  TODO: vista pendiente del onepage-->

<?php
include_once LAYOUTS . 'main_foot.php';

setFooter($d);

?>
<script>
    //Script de la vusta Home
    $(function() {
        app.previousPosts()
        app.lastPost()
    })
</script>

<?php

closefooter();
