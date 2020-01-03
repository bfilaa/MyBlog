<?php
require_once 'views/View.php';

class ControllerContact
{
    private $_articleManager;

    public function __construct()
    {
        if (isset($url) && count($url) > 1) {
            throw new \Exception("Page introuvable", 1);
        }
        else {
            $this->contact();
        }
    }

    private function contact(){
       
        $view = new View(); 
        $view->initialiser('Contact'); // initialise lapparance de la page contact, n'affiche rien pour le moment
        $view->afficher_lapparence();

        #$this->_view->generate(array('articles' => $articles));
    }
}
