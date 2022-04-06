<div class="modal fade" id="loginModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel"
     aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="login" id="login">
                    <div class="login-form">
                        <div class="close-form" id="close" data-dismiss="modal"><i class="fa-solid fa-xmark"></i>
                        </div>
                        <div class="d-flex login-register">
                            <a class="link-login" id="btnLogin">login</a>
                            <a class="link-register" id="btnRegister">register</a>
                        </div>
                        <div class="col-md-12 form-lg">
                            <div id="closeFormLogin">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="userName" class="form-control"
                                               placeholder="User Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Password"/>
                                    </div>
                                    <div class="checkbox-a">
                                        <input type="checkbox"/>
                                        <label class="control control--checkbox mb-0"><span class="caption">Remember
                                                    me</span></label>
                                        <a href="#">Forgot password</a>
                                    </div>
                                    <button class="btn btn-login" type="submit">LOGIN</button>
                                </form>
                                <p class="line"><span>Login with</span></p>
                                <a class="login-gg" href="#"><i class="fa-brands fa-google-plus-g"></i>Google</a>
                                <a class="login-rg" href="#"><i class="fa-brands fa-facebook-f"></i>Facebook</a>
                            </div>
                            <div id="closeRegisterForm">
                                <form action="#" method="post">
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="userName" class="form-control"
                                               placeholder="User Name"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email" class="form-control" placeholder="Email"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name="password" class="form-control"
                                               placeholder="Password"/>
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password::</label>
                                        <input type="password" name="confirmPassword" class="form-control"
                                               placeholder=" Repeat Password"/>
                                    </div>
                                    <button class="btn btn-login" type="submit">REGISTER</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

