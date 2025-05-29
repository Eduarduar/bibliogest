<?php

    namespace app\controllers;

    /**
     * Controlador para el manejo de errores.
     */
    class ErrorController extends Controller {

        /**
         * Muestra el error 404 (no encontrado).
         * @return void
         */
        public function error404(){
            echo "Error 404, no encontrado";
            die;
        }

        /**
         * Muestra el error de método no encontrado.
         * @return void
         */
        public function errorMNF(){
            echo "El método no se encontró";
            die;
        }
    }