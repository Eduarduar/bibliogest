<?php

    namespace app\models;

    use app\classes\DB as DB;

    /**
     * Clase base para los modelos de la aplicación.
     * Hereda de DB y proporciona funcionalidades comunes a los modelos.
     */
    class Model extends DB{
        /**
         * Constructor. Inicializa la conexión a la base de datos.
         */
        public function __construct(){
            parent::__construct();
        }
    }