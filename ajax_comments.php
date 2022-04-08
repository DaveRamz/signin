<?php 
    include('./templates/header.php');
?>
<div id="searchbar">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form">
                        <h3 class="text-center text-info">::: Search News :::</h3>
                        <div class="form-group">
                            <label for="newsId" class="text-info">News ID:</label><br>
                            <input type="text" name="newsId" id="newsId" class="form-control">
                        </div>
                        <div class="form-group">
                            <button type="button" onclick="searchCommentNews()">search</button>
                        </div>
                    </form>
                </div>  
            </div>
            <div id="news">
                <div class="container_news">
                    <div class="col-md-12">    
                        <div id="ajaxResponse" ></div>     
                    </div>
                </div>
            </div>
        </div>
    </div>  
</div>

<?php include('./templates/footer.php'); ?>