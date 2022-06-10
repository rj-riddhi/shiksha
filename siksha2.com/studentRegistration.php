<div class="modal fade" id="signupModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content rounded-0 border-0 p-4">
            <div class="modal-header border-0">
                <h3>Register</h3>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                 <!-- <div class="login">  -->
                    <form id="stuRegForm">
                         <div class="form-group">
                            <i class="fas fa-user"></i>
                            <label for="stuname" class="pl-2 font-weight-bold" style="color: black;">Name</label>
                            <small id="statusMsg1"></small>
                            <input type="text" class="form-control" id="stuname" name="stuname" placeholder="Name">
                        </div>
                         <div class="form-group">
                            <i class="fas fa-envelope"></i>
                            <label for="stuemail" class="pl-2 font-weight-bold" style="color: black;">Email</label>
                            <small id="statusMsg2"></small>
                            <input type="email" class="form-control mb-3" id="stuemail" name="stuemail" placeholder="Email">
                            <small class="form-text">We'll never share your email with anyone else.</small>
                        </div>
                        <div class="form-group">
                            <i class="fas fa-key"></i>
                            <label for="stupass" class="pl-2 font-weight-bold" style="color: black;">Password</label>
                            <small id="statusMsg3"></small>
                            <input type="password" class="form-control mb-3" id="stupass" name="stupass" placeholder="Password">
                        </div> 
                        <!-- <div class="form-group">
                            <span id="sucessMsg"></span>
                            <button type="submit" class="btn btn-primary" onclick="addstu()">SIGN UP</button>
                        </div>  -->
                    </form>

                 <!-- </div>  -->
            </div>
            <div class="modal-footer">
            <span id="sucessMsg"></span>
                <button type="submit" class="btn btn-primary" onclick="addstu()" id="signup">SIGN Up</button>
                <!-- <button type="submit" class="btn btn-primary" data-bs-dismiss="modal">Close</button> -->
            </div>
        </div>
    </div>
</div>