<?php

abstract class Model
{
    private static $_bdd;
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=My_Blog;charset=utf8', 'root', 'root');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    protected function getBdd(){
        if (self::$_bdd == null) {
            self::setBdd();
            return self::$_bdd;
        }
    }
    //création de la méthode de récupération de la liste dans bdd
    protected function getAll($table, $obj){
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT * FROM '.$table.' ORDER BY id desc');
        $req->execute();

        //on crée la variable data qui va contenir les données
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            // var contiendra les données sou forme d'objet
            $var[] = new $obj($data);
        }
        return $var;
        $req->closeCursor();
    }

    protected function getOne($table, $obj, $id)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare("SELECT id, title, chapo, content, DATE_FORMAT(date, '%d/%m/%Y à %Hh%imin%ss') AS date FROM " .$table. " WHERE id = ?");
        $req->execute(array($id));
        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] =new $obj($data);
        }

        return $var;
        $req->closeCursor();
    }
//
// 
}
