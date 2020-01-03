<?php

//class responsable de l'apparence d'une page
class View
{
    //fichier vue
    private $_file;

    //titre de la page
    private $_t;

    // initialisation
    function __construct($action)
    {
        $this->_file = 'views/view'.$action.'.php'; // ca c'est juste un string avec un chemin vers le fichier apparence
    }

    // crée une fonction qui va générer et afficher la vue
    public function generate($data){
        //définir le fichier à envoyer
        $content = $this->generateFile($this->_file, $data);

        //template
        $view = $this->generateFile('views/template.php',array('t' => $this->_t, 'content' => $content));
        echo $view;
    }

    private function generateFile($file, $data){
        if (file_exists($file)) {
         extract($data);

         //commencer la temporisation
         ob_start();

         require $file;

         //arreter la temporisation
         return ob_get_clean();
        }
        else {
            throw new \Exception("Fichier ".$file." introuvable", 1);
        }
    }
}




