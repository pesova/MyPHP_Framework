<?php
require APPROOT . '/Views/include/header.php';?>

<div class="row">
    <div class="col-md-6 mx-auto">
        <div class="card card-body bg-light mt-5">
            <h2> Create an Account</h2>
            <p> Please Fill in your correct details To Register with Us</p>

            <form action="<?php echo URLROOT;?>/Users/register" method="POST">
        
                <div class="form-group">
                    <label for="name">Name<sup>*</sup> </label>
                    <input type="text" name="name" class="form-control form-control-lg <?php echo (!empty($data['name_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['name']; ?>">
                    <span class="invalid-feedback"><?php echo $data['name_err']; ?></span>

                </div>

                <div class="form-group">
                    <label for="email">Email<sup>*</sup> </label>
                    <input type="email" name="email" class="form-control form-control-lg <?php echo (!empty($data['email_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['email']; ?>">
                    <span class="invalid-feedback"><?php echo $data['email_err']; ?></span>

                </div>

                <div class="form-group">
                    <label for="password">Password<sup>*</sup> </label>
                    <input type="password" name="password" class="form-control form-control-lg <?php echo (!empty($data['password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['password_err']; ?></span>

                </div>


                <div class="form-group">
                    <label for="confirm_password">Confirm password<sup>*</sup> </label>
                    <input type="password" name="confirm_password" class="form-control form-control-lg <?php echo (!empty($data['confirm_password_err'])) ? 'is-invalid' : ''; ?>" value="<?php echo $data['confirm_password']; ?>">
                    <span class="invalid-feedback"><?php echo $data['confirm_password_err']; ?></span>

                </div>

                <div class="row">
                    <div class="col">
                        <input type="submit" class="btn btn-success btn-block" value="Register">
                    </div>

                    <div class="col">
                        <a href="<?php echo URLROOT;?>/Users/Login" class="btn btn-light btn-block">Have an Account? Login</a>
                    </div>
                </div>

            </form>
        </div>
    </div>
</div>









<!-- Footer -->
<?php require APPROOT . '/Views/include/footer.php';?>
