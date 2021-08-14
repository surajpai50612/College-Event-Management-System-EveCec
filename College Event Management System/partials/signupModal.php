<!-- Modal -->
<div class="modal fade my-5" id="signupModal" tabindex="-1" aria-labelledby="signupModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="signupModalLabel">Signup for an Eve CEC account</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form style="font-weight:bold;" action="partials/_handleSignup.php" method="post" autocomplete="off">
                <div class="modal-body">

                    <div class="form-group">
                        <label for="exampleInputUsername1">Enter a username</label> <span style="color:red;">*</span>
                        <input type="text" class="form-control" id="signupUsername" name="signupUsername" aria-describedby="emailHelp" placeholder="ex : xyz123" required autofill='off'>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputUSN1">Enter your USN</label> <span style="color:red;">*</span>
                        <input type="text" class="form-control" id="signupUSN" name="signupUSN" aria-describedby="emailHelp" placeholder="ex : 4CBXXYYZZZ" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputEmail1">Enter your email-id</label> <span style="color:red;">*</span>
                        <input type="email" class="form-control" id="signupEmail" name="signupEmail" aria-describedby="emailHelp" placeholder="ex : xyz123@gmail.com" required >
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Enter a Password</label> <span style="color:red;">*</span>
                        <input type="password" class="form-control" id="signuppassword" name="signuppassword" placeholder="enter a password" required>
                    </div>
                    <div class="form-group">
                        <label for="exampleInputPassword1">Confirm your password</label> <span style="color:red;">*</span>
                        <input type="password" class="form-control" id="signupcpassword" name="signupcpassword" placeholder="confirm your password" required>
                        <small>Enter the same password as above</small>
                    </div>
                </div>

                <div class="modal-footer">
                    <button type="submit" class="btn btn-success b1" style="color:white;margin-right:40%;padding:10px 40px;">Signup</button>
                </div>
            </form>
        </div>
    </div>
</div>