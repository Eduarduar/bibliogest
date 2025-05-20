<?php
function setHeader($args)
{
    $ua = as_object($args->ua);

?>
    <!DOCTYPE html>
    <html lang="es">

    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" type="text/css" href="<?= CSS ?>tailwind.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
        <title><?= $args->title ?></title>
    </head>

    <body>

        <!--  TODO: header del onepage-->
    <?php
}
