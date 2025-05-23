<?php

namespace app\controllers\auth;

use app\controllers\Controller as Controller;
use app\classes\Views as View;
use app\models\usuarios as user;

class RegisterController extends Controller
{
    public function __construct()
    {
        parent::__construct();
    }

    public function index($params = null)
    {
        $response = [
            'ua'    => ['sv' => 0],
            'title' => 'Registrarse',
            'code'  => 200
        ];
        View::render('auth/register', $response);
    }

    public function register($params = null) {
        $user = new user();
        try {
            $result = $user->newUser(filter_input_array(INPUT_POST, FILTER_SANITIZE_SPECIAL_CHARS));
            $this->apiResponse(true, 'Usuario registrado correctamente', $result);
        } catch (\Throwable $th) {
            $this->apiResponse(false, 'Error al registrar', null, $th->getMessage());
        }
    }
}
