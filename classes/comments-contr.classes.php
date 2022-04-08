<?php
include ('../classes/comments.classes.php');
class CommentsContr extends Comments{

    private $newsId;

    public function __construct(){}

    public static function withID($newsId){
        $instance = new self();
        $instance->newsId = $newsId;
        return $instance;
    }

    public function getCommentsByID(){
       return $this->getComments($this->newsId);
    }
}
?>