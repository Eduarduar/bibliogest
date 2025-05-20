<?php
    function setHeader($args){
        $ua = as_object( $args->ua );
        
?>
<!DOCTYPE html>
<html lang="es">
<head>    
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="<?=CSS?>tailwind.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.3/font/bootstrap-icons.css">
    <title><?=$args->title?></title>
    
    <style>
        body {
            font-family: 'Arial', sans-serif;
        }
        .hero-bg {
            background-color: #FFF3E0;
        }
        .feature-icon {
            background-color: #F39C12;
            color: white;
            width: 50px;
            height: 50px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin-bottom: 1rem;
        }
        .step-number {
            background-color: #F39C12;
            color: white;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 1.5rem;
            font-weight: bold;
            margin-right: 1rem;
        }
    </style>
</head>
<body>
<?php
}
