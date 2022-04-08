<?php 
    session_start();
    include('./templates/header.php'); 

    function createComments($comments){

        $html = '<table>';
        foreach($comments as $comment){
            if( is_null($comment['PARENT'])  ){
                $html .= '<tr>';
                $html .= '<td class="comment_row">'. htmlspecialchars($comment['TEXT']) .'</td id="'.htmlspecialchars($comment['ID']).'">' ;
                $html .= '</tr>';
            }else {
                $position = strpos($html,'</td id="'.htmlspecialchars($comment['PARENT']).'">',0);
                $subComment = '</tr><tr><td class="comment_row">--'. htmlspecialchars($comment['TEXT']) .'</td id="'.htmlspecialchars($comment['ID']).'"></tr>';
                $html = substr($html,0,$position) . $subComment . substr($html,$position);
            }
        }
        $html .= '</table>';
        return $html;
    }
?>
<div id="searchbar">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="./includes/comments_inc.php" method="post">
                        <h3 class="text-center text-info">::: Search News :::</h3>
                        <div class="form-group">
                            <label for="newsId" class="text-info">News ID:</label><br>
                            <input type="text" name="newsId" id="newsId" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" name="search_comments" value="Search" class="submit_button">
                        </div>
                    </form>
                </div>  
            </div>
            <div id="news">
                <div class="container_news">
                    <div class="col-md-12">         
                        <?php 
                            if(isset($_SESSION["NEWS_COMMENTS"])){
                                $comments = $_SESSION["NEWS_COMMENTS"];
                                echo createComments($comments);
                            }
                        ?>
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<?php include('./templates/footer.php'); ?>