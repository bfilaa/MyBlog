<?php
require_once 'views/View.php';

class ControllerPost
{
    private $_articleManager;
    private $_commentManager;
    private $_view;

    public function __construct()
    {
        if (isset($url) && count($url) < 1) {
            throw new \Exception("Page introuvable", 1);
        }
        else {
            $this->article();
        }
    }

    private function article()
    {
        // que mode POST
        if (isset($_POST['author'])) {

            // la on ajoute le commentaire en bdd
            $commentManager = new CommentManager();
            $commentManager->postComment($_GET['id'], $_POST['author'], $_POST['comment']);
        }

        // mode GET et POST ca marche
        if (isset($_GET['id'])) { 
            $this->_articleManager = new ArticleManager;
            $article = $this->_articleManager->getArticle($_GET['id']);
            $this->_view = new View('SinglePost');
            $this->_view->generate(array('article' => $article));
        }
    }
    private function articles()
    {
        $articleManager = new ArticleManager();
        $commentManager = new CommentManager();

        $post = $articleManager->getPost($_GET['id']);
        $comments = $commentManager->getComments($_GET['id']);

        $this->_view = new View('viewSinglePost');
    }

    private function addComment($postId, $author, $comment)
    {
        $commentManager = new CommentManager();
        $affectedLines = $commentManager->postComment($postId, $author, $comment);

        if ($affectedLines === false) {
            throw new Exception('Impossible d\'ajouter le commentaire !');  
        } 
        else {
            header('Location: index.php?action=post&id=' . $postId);
        }    
    }
}