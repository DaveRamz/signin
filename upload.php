<?php include ('./templates/header.php') ?>
<div id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="./includes/image_inc.php" method="post" enctype="multipart/form-data">
                        <h3 class="text-center text-info">Selecciona una imagen</h3>
                        <input type="file" name="image"/>
                        <div class="form-group">
                            <input type="submit" value="cargar" name="load" class="submit_button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?php include ('./templates/footer.php') ?>