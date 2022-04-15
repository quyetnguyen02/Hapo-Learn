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
                                <form action="{{ route('login') }}" method="post">
                                    @csrf
                                    @if (session()->has('message') )
                                        <div class="alert alert-success" id="success">
                                            {{ session()->get('message') }}
                                        </div>
                                    @endif
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="username"
                                               class="form-control @error('username') is-invalid login @enderror"
                                               placeholder="User Name"/>
                                        @error('username')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name="password"
                                               class="form-control @error('password') is-invalid login @enderror"
                                               placeholder="Password"/>
                                        @error('password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="checkbox">
                                        <input type="checkbox" class="checkbox-input" name="rememberme" id="rememberMe"
                                               value="true"/>
                                        <label class="control control-checkbox mb-0"><span class="caption">Remember
                                                    me</span></label>
                                        <a href="#">Forgot password</a>
                                    </div>
                                    @if (session()->has('error'))
                                        <div class="alert alert-danger" id="error">
                                            {{ session()->get('error') }}
                                        </div>
                                    @endif
                                    <button class="btn btn-login" type="submit">LOGIN</button>
                                </form>
                                <p class="line"><span>Login with</span></p>
                                <a class="login-gg" href="#"><i class="fa-brands fa-google-plus-g"></i>Google</a>
                                <a class="login-rg" href="#"><i class="fa-brands fa-facebook-f"></i>Facebook</a>
                            </div>
                            <div id="closeRegisterForm">
                                <form action="{{ route('register') }}" method="post">
                                    @csrf
                                    <div class="form-group">
                                        <label>Username:</label>
                                        <input type="text" name="register_username"
                                               class="form-control @error('register_username') is-invalid @enderror"
                                               placeholder="User Name"
                                               value="@error('register_username') {{ old('register_username') }} @enderror"/>
                                        @error('register_username')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Email:</label>
                                        <input type="email" name="email"
                                               class="form-control @error('email') is-invalid @enderror"
                                               placeholder="Email"
                                               value="@error('email') {{ old('email') }} @enderror "/>
                                        @error('email')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Password:</label>
                                        <input type="password" name="register_password"
                                               class="form-control @error('register_password') is-invalid @enderror"
                                               placeholder="Password"/>
                                        @error('register_password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <div class="form-group">
                                        <label>Repeat Password:</label>
                                        <input type="password" name="confirm_password"
                                               class="form-control @error('confirm_password') is-invalid @enderror"
                                               placeholder=" Repeat Password"/>
                                        @error('confirm_password')
                                        <span class="invalid-feedback" role="alert">
                                                <strong>{{ $message }}</strong>
                                            </span>
                                        @enderror
                                    </div>
                                    <button class="btn btn-login reg" type="submit">REGISTER</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
