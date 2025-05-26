<?php 

    namespace app\controllers;
    use app\classes\Views as View;
    use app\controllers\auth\LoginController as SC;
    use app\controllers\UsuariosController as UC;
    use app\controllers\PrestamosController as PC;
    use app\controllers\LibrosController as LC;
    use app\controllers\CategoriasController as CC;
    use app\controllers\AutoresController as AC;
    class DashboardController extends Controller {

        public function __construct(){
            parent::__construct();
        }

        public function validateSession(){
            $ua = SC::sessionValidate() ?? [ 'sv' => 0 ];
            if($ua['sv'] == 0){
                SC::logout();
            }
            return $ua;
        }

        public function index($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            View::render('dashboard/dashboard',$response);
        }

        public function libros($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            $response['categorias'] = CC::getAllCategorias();
            $response['autores'] = AC::getAllAutores();
            $response['libros'] = LC::getAllBooks();
            View::render('dashboard/libros/libros',$response);
        }

        public function usuarios($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            $response['usuarios'] = UC::getAllUsers();
            View::render('dashboard/usuarios/usuarios',$response);
        }

        public function prestamos($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            $response['libros'] = LC::getCatalog();
            $response['usuarios'] = UC::getCatalogUsers();
            $response['prestamos'] = PC::getAllPrestamos();
            View::render('dashboard/prestamos/prestamos',$response);
        }

        public function categorias($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            $response['categorias'] = CC::getAllCategorias();
            View::render('dashboard/categorias/categorias',$response);
        }

        public function autores($params = null){
            $response = [
                        'ua' => $this -> validateSession(),
                        'code'   => 200,
                        'title'  => 'BiblioGest'
                        ];
            $response['autores'] = AC::getAllAutores();
            View::render('dashboard/autores/autores',$response);
        }

    }