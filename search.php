<?php 
    session_start();
    include ('./templates/header.php') ?>
<div id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="./includes/image_inc.php" method="post">
                        <h3 class="text-center text-info">Busca por ID</h3>
                        <div class="form-group">
                            <label class="text-info">ID de la Imagen: </label><br>
                            <input type="text" name="imageId" id="imageId" class="form-control"/>
                        </div>
                        <div class="form-group">
                            <input type="submit" value="buscar" name="search" class="submit_button">
                        </div>
                    </form>
                </div>
            </div>
        </div>

        <?php 
            if(isset($_SESSION["IMAGE_SEARCH"])){
                $image = $_SESSION["IMAGE_SEARCH"];
        ?>

                <img width=400 height=500 src='<?php echo $image; ?>'/>

        <?php 
            }
        ?>
    </div>
</div>
<?php include ('./templates/footer.php') ?>