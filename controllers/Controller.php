<?php

    namespace app\controllers;

    /**
     * Clase base para todos los controladores.
     */
    class Controller {
        /**
         * Constructor vacío del controlador base.
         */
        public function __construct(){}
        
        /**
         * Envía una respuesta API en formato JSON.
         * @param bool $success Indica si la operación fue éxitosa
         * @param string $message Mensaje de respuesta
         * @param mixed $data Datos a retornar
         * @param mixed $errors Errores a retornar
         * @param int $code Código HTTP de respuesta
         * @return void
         */
        protected function apiResponse($success, $message, $data = null, $errors = null, $code = 200)
        {
            http_response_code($code);
            echo json_encode([
                'success' => $success,
                'message' => $message,
                'data' => $data,
                'errors' => $errors,
                'code' => $code,
            ], $code);
        }
    }