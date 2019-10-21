<?php include_once('templates/header.php')?>
<div class="container" >
    <div class="row justify-content-md-center align-items-center" style="height: 100vh;">
        <div class="col-md-6">
            <div style="display:none" id="error-panel" class="alert alert-danger" role="alert"></div>
            <div style="display:none" id="success-panel" class="alert alert-success" role="alert"></div>
            <form id="regForm" method="post">

                <div class="form-group">

                    <label for="name">Name</label>
                    <input id="name" class="form-control" type="text" name="name" required>
                    <small style="display: none;" class="text-danger error name-error">Incorrect name</small>
                </div>
                <div class="form-group">

                    <label for="email">Email</label>
                    <input id="email" class="form-control" type="email" name="email" required>
                    <small style="display: none;" class="text-danger error email-error">Incorrect email</small>
                </div>

                <div class="form-group">

                    <label for="password">Password</label>
                    <input id="password" class="form-control" type="password" name="password" required>
                    <small style="display: none;" class="text-danger error password-error">Password must contain one digit one uppercase and one small letter</small>
                </div>
                <div class="form-group">

                    <label for="password_2">Password repeat</label>
                    <input id="password_2" class="form-control" type="password" name="password_2" required>
                    <small style="display: none;" class="text-danger error password_2-error">Mismatch password</small>
                </div>
                <div class="form-row align-items-center">
                    <div class="col-12">
                        <input id="submit" class="btn btn-primary" type="submit" name="authReg" value="Register">
                        <a href="/">Back</a>
                    </div>

                </div>

            </form>
        </div>
    </div>
</div>
<?php include_once('templates/footer.php')?>