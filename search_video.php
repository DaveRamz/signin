<?php 
    session_start();
    include ('./templates/header.php') ?>
<div id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="./includes/video_inc.php" method="post">
                        <h3 class="text-center text-info">Busca por ID</h3>
                        <div class="form-group">
                            <label class="text-info">Video ID: </label><br>
                            <input type="text" name="videoId" id="videoId" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="buscar" name="search" class="submit_button">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php 
            if(isset($_SESSION["VIDEO_SEARCH"])){
                $video = $_SESSION["VIDEO_SEARCH"];
        ?>
            <video width="600" height="400" controls="controls" preload="metadata">
               <source src="<?php echo $video; ?> "/>
            </video>
        <?php 
            }
        ?>
    </div>
</div>
<?php include ('./templates/footer.php') ?>