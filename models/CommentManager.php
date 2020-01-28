<?php
require_once 'model.php';

class CommentManager extends Model
{
    public function getComments($postId)
    {
        $this->getBdd();
        $comments = self::$_bdd->prepare('SELECT id, post_id, author, comment, DATE_FORMAT(comment_date, \'%d/%m/%Y à %Hh%imin%ss\') AS comment_date_fr FROM comments WHERE post_id = ? ORDER BY comment_date DESC');
        $comments->execute(array($postId));

        return $comments;
    }

    public function postComment($postId, $author, $comment)
    {
        $this->getBdd();
        $comments = self::$_bdd->prepare('INSERT INTO comments(post_id, author, comment, comment_date) VALUES(?, ?, ?, NOW())');
        $affectedLines = $comments->execute(array($postId, $author, $comment));

        return $affectedLines;
    }

    // fonction get tous les commentaires et tout post confondu

    // fonction get tous les commentaires validés et tout post confondu 

    // fonction get tous les commentaires pas validés et tout post confondu 

    // fonction get tous les commentaires d'un Post ID précis (deja fait ligne 6)

    // fponction get tous les commentaires valiés d'un Post ID précis 

    // fponction get tous les commentaires pas validés d'un Post ID précis
}

