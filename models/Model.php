<?php

abstract class Model
{
    protected static $_bdd;

    //instancie la connexion a la base de donnée
    private static function setBdd(){
        self::$_bdd = new PDO('mysql:host=localhost;dbname=My_Blog;charset=utf8', 'root', 'root');
        self::$_bdd->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_WARNING);
    }
    // récupére la connexion a la bdd
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
            // var contiendra les données sous forme d'objet
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
// rajout de fonction pour ajout de post

    protected function getArticles()
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT id, title, chapo, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin\') AS creation_date_fr FROM posts ORDER BY creation_date DESC LIMIT 0, 5');

        return $req;
    }

    protected function getArticle($postId)
    {
        $this->getBdd();
        $var = [];
        $req = self::$_bdd->prepare('SELECT id, author, content, DATE_FORMAT(creation_date, \'%d/%m/%Y à %Hh%imin%ss\') AS creation_date_fr FROM posts WHERE post_id = ?');
        $req->execute(array($postId));
        $post = $req->fetch();

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] =new $obj($article);
        }

        return $var;
        $req->closeCursor();
    }
    protected function getComments($postId)
    {
        $this->getBdd();
        $var = [];
        $comments = self::$_bdd->prepare('SELECT id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] =new $obj($comments);
        }

        return $var;
        $req->closeCursor();
    }

    function postComment($postId, $author, $comment)
    {
        $this->getBdd();
        $var = [];
        $comments = self::$_bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        while ($data = $req->fetch(PDO::FETCH_ASSOC)) {
            $var[] =new $obj($affectedLines);
        }

        return $var;
        $req->closeCursor();
    } 
}
