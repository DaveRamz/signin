<?php include ('./templates/header.php') ?>
    
<div id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="./includes/register_inc.php" method="post">
                        <h3 class="text-center text-info">Registro</h3>
                        <div class="form-group">
                            <label class="text-info">Email:</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-info">Password:</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-info">Confirmar Password:</label>
                            <input type="text" name="confirmPassword" id="confirmPassword" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="iniciar" name="submit" class="submit_button">
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('./templates/footer.php') ?>