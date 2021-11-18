<?php include("./includes/header.php"); ?>

<body  style="background-image:url('../images/img3.png')">
    <div class="row">
        <!-- login and signup tabs-->

        <div class="col l6 offset-l3 m8 offset-m2 s12" style="margin-top:100px">
            <div class="card-panel center  grey lighten-1" style="margin-bottom:0px">
                <ul class="tabs grey lighten-1">
                    <li class="tab">
                        <a href="#login">Login</a>
                    </li>
                    <li class="tab">
                        <a href="#signup">signup</a>
                    </li>
                </ul>
            </div>
        </div>
        <!--</div>--->
        <!--login area-->
        <!--<div class="row">-->
        <form action="login-check.php" method="post">
            <div class="col l6 offset-l3 m8 offset-m2 s12" id="login">
                <div class="card-panel center   red lighten-2" style="margin-top:1px">
                    <h5 style="color: #ffffff">Login to continue</h5>
                    <?php if(isset($_SESSION['message'])){
                        echo $_SESSION['message'];
                        unset($_SESSION['message']);
                    }
                        ?>

                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="Enter valid username" class="validate">

                    </div>
                    <div class="input-field">
                        <input type="password" id="username" name="password" placeholder="Enter valid password" class="validate">

                    </div>
                    <div class="input-field">
                        <input type="submit" name="login" class="btn" value="Login">
                    </div>

                </div>
            </div>
        </form>
    

    <!--Sign UP area-->

    
        <form action="signup.php" method="post">
            <div class="col l6 offset-l3 m8 offset-m2 s12" id="signup">
                <div class="card-panel center   purple lighten-2" style="margin-top:1px">
                    <h5 style=" color:#ffffff">Please Enter Details</h5>

                    <div class="input-field">
                        <input type="text" id="username" name="username" placeholder="Enter valid username" class="validate">

                    </div>
                    <div class="input-field">
                        <input type="email" id="email" name="email" placeholder="Enter valid Email" class="validate">
                        <label for="email" data-error="invalid Email" data-success="valid Email"></label>

                    </div>
                    <div class="input-field">
                        <input type="password" id="password" name="password" placeholder="Enter valid password" class="validate">

                    </div>
                    
                   
                    <div class="input-field">
                        <input type="submit" name="signup" class="btn" value="Signup">
                    </div>

                </div>
            </div>
        </form>
    </div>
</body>


<?php include("./includes/footer.php"); ?>