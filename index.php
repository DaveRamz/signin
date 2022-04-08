<?php 
    session_start();
    include ('templates/header.php');
?>
    
<div id="login">
    <div class="container">
        <div class="row justify-content-center align-items-center">
            <div class="col-md-6">
                <div class="col-md-12">
                    <form class="form" action="./includes/login_inc.php" method="post">
                        
                    <?php 
                        if(isset($_SESSION["user_email"])){
                    ?>
                        <h3 class="text-center text-info"><?php echo $_SESSION["user_email"];?></h3>
                    <?php 
                        }else{
                    ?>
                        <h3 class="text-center text-info">Test</h3>
                    <?php 
                        }
                    ?>
                    
                        <div class="form-group">
                            <label class="text-info">Email:</label>
                            <input type="text" name="email" id="email" class="form-control">
                        </div>
                        <div class="form-group">
                            <label class="text-info">Password:</label>
                            <input type="text" name="password" id="password" class="form-control">
                        </div>
                        <div class="form-group">
                            <input type="submit" value="iniciar" name="submit" class="submit_button">
                        </div>
                        <div class="form-group">
                            <div class="text-right">
                                <a href="register.php" class="text-info">Registro</a>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>

<?php include ('templates/footer.php') ?>
