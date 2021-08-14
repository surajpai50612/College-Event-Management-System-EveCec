<!-- Modal -->
<div class="modal fade my-5" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel">Login to Eve CEC</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form action="partials/_handleLogin.php" method="post" autocomplete="off">
                <div class="modal-body" style="font-weight:bold;">

                    <div class="form-group">
                        <label for="uname">Enter your username</label> <span style="color:red;">*</span>
                        <input type="text" class="form-control" id="uname" name="uname" placeholder="ex : xyz123" required>
                    </div>
                    <div class="form-group">
                        <label for="loginEmail">Enter your email-id</label> <span style="color:red;">*</span>
                        <input type="email" class="form-control" id="loginEmail" name="loginEmail" aria-describedby="emailHelp" placeholder="ex : xyz123@gmail.com" required>
                    </div>
                    <div class="form-group">
                        <label for="loginPass">Enter your password</label> <span style="color:red;">*</span>
                        <input type="password" class="form-control" id="loginPass" name="loginPass" placeholder="enter a password" required>
                    </div>
                    <div class="form-group">
                        <a href="" style="font-weight:normal;" data-toggle="modal" data-target="#signupModal">Don't have an account, Signup?</a>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-success b1" style="color:white;margin-right:40%;padding:10px 40px;">Login</button>
                </div>
            </form>
        </div>
    </div>
</div>