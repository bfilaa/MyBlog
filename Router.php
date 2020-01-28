<?php
require_once 'views/View.php';

class Router
{
    private $ctrl;
    private $view;

    public function routeReq(){
        try{
            //chargement automatique des classes
            spl_autoload_register(function($class){
                require_once('models/'.$class.'.php');
            });

            $url = '';

            //le controller est inclu selon l'action de l'utilisateur
            if (isset($_GET['url'])) {
                //on décompose l'url et on lui applique un filtre
                $url = explode('/', filter_var($_GET['url'], FILTER_SANITIZE_URL));

                $controller = ucfirst(strtolower($url[0]));
                $controllerClass = "Controller".$controller;
                $controllerFile = "controllers/".$controllerClass.".php";

                //on check si le fichier du controleur existe
                if (file_exists($controllerFile)) {
                    //on lance la classe en question avec tous les paramétres url
                    require_once($controllerFile);
                    $this->ctrl = new $controllerClass($url);

                }   
                elseif ($_GET['action'] == 'post') {
                    if(isset($_GET['id']) && $_GET['id'] > 0) {
                        post();
                    }   
                    else {
                        throw new \Exception("Page introuvable", 1);
                    }
                }
                elseif ($_GET['action'] == 'addComment') {
                    if(isset($_GET['id']) && $_GET['id'] > 0) {
                        if(!empty($_POST['author']) && !empty($_POST['comment'])) {
                            addComment($_GET['id'], $_POST['author'], $_POST['comment']);
                        }
                        else {
                            throw new Exception('Tous les champs ne sont pas remplis !');
                        }
                    }
                    else {
                        throw new Exception('aucun identifiant d\'article envoyé');
                    }
                }    
            }
            else {
                require_once('controllers/ControllerAccueil.php');
                $this->ctrl = new ControllerAccueil($url);
            }
            // Gestion des erreurs
        }  catch (\Exception $e) {
            $errorMsg = $e->getMessage();
            $this->_view = new View('Error');
            $this->_view->generate(array('errorMsg' => $errorMsg));
        }
    }
}