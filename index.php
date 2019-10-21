<?php include('templates/header.php') ?>
    <div class="container" >

        <div class="row justify-content-md-center align-items-center" style="height: 100vh;">
            <div class="col-md-6">
                <div style="display:none" id="error-panel" class="alert alert-danger" role="alert"></div>
                <form id="loginForm" method="post">

                    <div class="form-group">

                        <label for="email">Email</label>
                        <input id="email" class="form-control" type="email" name="email" required>

                    </div>
                    <div class="form-group">

                        <label for="password">Password</label>
                        <input id="password" class="form-control" type="password" name="password" required>

                    </div>
                    <div class="form-row align-items-center">
                        <div class="col-5">
                            <input class="btn btn-primary" type="submit" name="authLogin" value="Login">
                        </div>
                        <div class="col-3">
                            <a href="/registration.php">Registration</a>

                        </div>
                        <div class="col-4">
                            <a href="#">Forgot password?</a>
                        </div>
                    </div>

                </form>
            </div>
        </div>
    </div>
<?php include('templates/footer.php') ?>