<?php

class ArticleManager extends Model
{
    public function getArticles(){
        return $this->getAll('articles', 'Article');
    }

    public function getArticle($id){
        return $this->getOne('articles', 'article', $id);
    }

}

