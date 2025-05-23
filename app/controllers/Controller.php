<?php

    namespace app\controllers;

    class Controller {
        public function __construct(){}
        
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