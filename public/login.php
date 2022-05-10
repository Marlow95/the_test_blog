<?php require_once(__DIR__ . "/reusables/header.php") ?>
<?php require_once(__DIR__ . "/reusables/navbar.php") ?>

<div class="container login-page">
    <div class="row m-4 p-3">
        <div class="col-4 border p-4 login-form">
            <h2>Login</h2>
            <?php $email_login = isset($_POST['email_login']) ? htmlspecialchars($_POST['email_login']) : ''; ?>
            <?php $password_login = isset($_POST['password_login']) ? htmlspecialchars($_POST['password_login']) : ''; ?>
            <form method="post">
                <div class="form-group">
                    <label for="email_login">Email address</label>
                    <input type="email" class="form-control" id="email_login" name="email_login" value="<?php $email_login ?>" aria-describedby="emailHelp" placeholder="Enter email">
                    <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
                </div>
                <div class="form-group">
                    <label for="password_login">Password</label>
                    <input type="password" class="form-control" id="password_login" name="password_login" value="<?php $password_login ?>" placeholder="Password">
                </div>
                <div class="form-group form-check m-2">
                    <input type="checkbox" class="form-check-input" id="checkbox_login" name="checkbox_login">
                    <label class="form-check-label" for="checkbox_login">Check me out</label>
                </div>
                <button type="submit" name="submit_login" class="btn login-btn m-2">Submit</button>
                <?php isset($_POST['submit_login']) ? loginUsers($email_login, $password_login) : ''; ?>
            </form>
            <?php 

            if(isset($_SESSION['failed_login'])){
                $flash_error = $_SESSION['failed_login'];
                unset($_SESSION['failed_login']);
                echo('<h3 class="text-danger text-center">' . $flash_error . '</h3>');
            }  
            ?>
        </div>
        <div class="col-4 text-center align-self-center">
            <h2>LOGIN</h2>
            <br>
            <h2>OR</h2>
            <br>
            <h2 class="green">SIGN UP</h2>
        </div>
        <div class="col-4 border p-4 signup-form">
            <h2>Sign Up</h2>

            <?php $email_signup = isset($_POST['email_signup']) ? htmlspecialchars($_POST['email_signup']) : ''; ?>
            <?php $firstname_signup = isset($_POST['firstname_signup']) ? htmlspecialchars($_POST['firstname_signup']) : ''; ?>
            <?php $lastname_signup = isset($_POST['lastname_signup']) ? htmlspecialchars($_POST['lastname_signup']) : ''; ?>
            <?php $username_signup = isset($_POST['username_signup']) ? htmlspecialchars($_POST['username_signup']) : ''; ?>
            <?php $password_signup = isset($_POST['password_signup']) ? htmlspecialchars($_POST['password_signup']) : ''; ?>

            <form method="post">
            <div class="form-group">
                <label for="enail_signup">Email Address</label>
                <input type="email" class="form-control" id="email_signup" name="email_signup" value="<?php $email_signup ?>" aria-describedby="emailHelp" placeholder="Enter email">
                <small id="emailHelp" class="form-text text-muted">We'll never share your email with anyone else.</small>
            </div>
            <div class="form-group">
                <label for="firstname_signup">First Name</label>
                <input type="text" class="form-control" id="firstname_signup" name="firstname_signup" value="<?php $firstname_signup ?>" placeholder="Firstname">
            </div>
            <div class="form-group">
                <label for="lastname_signup">Last Name</label>
                <input type="text" class="form-control" id="lastname_signup" name="lastname_signup" value="<?php $lastname_signup ?>" placeholder="Lastname">
            </div>
            <div class="form-group">
                <label for="username_signup">User Name</label>
                <input type="text" class="form-control" id="username_signup" name="username_signup" value="<?php $username_signup ?>" placeholder="Username">
            </div>
            <div class="form-group">
                <label for="password_signup">Password</label>
                <input type="password" class="form-control" id="password_signup" name="password_signup" value="<?php $password_signup ?>" placeholder="Password">
            </div>
            <div class="form-group form-check m-2">
                <input type="checkbox" class="form-check-input" id="checkbox_signup" name="checkbox_signup">
                <label class="form-check-label" for="checkbox_signup">Check me out</label>
            </div>
            <button type="submit" name="submit_signup" class="btn signup-btn m-4">Submit</button>
            <?php isset($_POST['submit_signup']) ? signupUsers($email_signup, $firstname_signup, $lastname_signup, $username_signup, $password_signup)  : ''; ?>
            </form>
        </div>
    </div>
</div>

<div class="m-4 p-4" style="position: relative; top: 6rem;">
<?php require_once(__DIR__ . "/reusables/footer.php") ?>
</div>
