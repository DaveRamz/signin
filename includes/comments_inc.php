<?php
include ('../classes/comments-contr.classes.php');
  if(isset($_POST["search_comments"])){
    $newsId =  $_POST["newsId"];
    CommentsContr::withID($newsId)->getCommentsByID();
    header("location: ../comments.php?error=none");
  }else if(isset($_POST["ajax_submit"])){
    $newsId =  $_POST["id"];
    $comments = CommentsContr::withID($newsId)->getCommentsByID();
    echo json_encode($comments);
  }
?>