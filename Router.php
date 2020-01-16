<?php
require_once 'views/View.php';

class Router
{
    private $ctrl;
    private $view;

    public function routeReq(){
        try{
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url = '';

            //on va déterminer le controleur en fonction de la valeur de cette variable
            if (isset($_GET['url'])) {
                //on décompose l'url et on lui applique un filtre
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                //on recupère le premier paramétre de l'url
                //on le met tout en miniscule
                $controller = ucfirst(strtolower($url[0]));
                //on met sa premiere lettre en majuscule
                $controllerClass = "Controller".$controller;
                //on retrouve le chemin du controleur voulu
                $controllerFile = "controllers/".$controllerClass.".php";

                //on check si le fichier du controleur existe
                if (file_exists($controllerFile)) {
                    //on lance la classe en question avec tous les paramétres url
                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);
                }
                else {
                    throw new \Exception("Page introuvable", 1);
                }
            }
            else {
                require_once('controllers/ControllerAccueil.php');
                $this->ctrl = new ControllerAccueil($url);
            }

        }  catch (\Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}