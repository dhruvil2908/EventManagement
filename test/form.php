<?php
session_start();
if (!empty($_SESSION['adminEmail'])) {
    header("location:adminDashboard.php");
}
// $jsFileInclude = "adminExercise.js";
include "../lib/login.php";
// $connect = new Login("employeeManagement");
if (isset($_POST['submit'])) {
    $email = $_POST['userName'];
    $password = $_POST['loginPassword'];
    $loginUser = $connect->checkuser($email, $password, true);
}
?>
<!-- header -->
<?php include '../header.php' ?>
<style>
    body {
        /* background-color: #b3d4fc; */
        background-image: linear-gradient(to right ,#2C3531, #116466, #66FCF1);
    }
</style>
<!-- grid col content -->
<div class="col-md-9">
    <div class="row mt-5">
        <div class="col-md-4 mt-5 offset-5" style="background-image: url(../img2.jpg); background-repeat: no-repeat; background-size: cover; height: 500px; background-blend-mode: overlay;">
            <h2 class="text-white">Admin Log In</h2>
            <form method="post" class="my-5 text-white">
                <!-- <div class="form-floating mb-3">
                    <input type="email" class="form-control is-invalid" id="floatingInput" placeholder="name@example.com">
                    <label for="floatingInput">Email address</label>
                </div> -->
                <label class="form-label" for="userNameLabel">User Name :</label>
                <input class="form-control" type="text" name="userName" id="userName" placeholder="Enter Your User Name">
                <span class="text-danger userNameErr"></span>
                <label class="form-label" for="password">Password :</label>
                <input class="form-control" type="password" name="loginPassword" id="loginPassword" placeholder="Enter Your Password">
                <span class="text-danger pwdErr"><?php echo (isset($_POST['submit']) && !empty($emptyErr)) ? $emptyErr : ""; ?></span>
                <h6 class="text-danger"><?php echo (isset($_POST['submit']) && !empty($loginUser)) ? $loginUser : ""; ?></h6>
                <input class="btn btn-outline-light w-100 mt-2" type="submit" name="submit" id="submit" value="Submit">
            </form>
        </div>
    </div>
</div>
<!-- grid col content -->
<script src="../../jquery.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.bundle.min.js" integrity="sha384-MrcW6ZMFYlzcLA8Nl+NtUVF0sA7MsXsP1UyJoMp4YLEuNSfAP+JcXn/tWtIaxVXM" crossorigin="anonymous"></script>
<script type="text/javascript">
    $(document).ready(function() {
        $("#submit").click(function(e) {
            var userName = $("#userName").val();
            var pass = $("#loginPassword").val();
            if (userName == "") {
                $(".userNameErr").html("*Enter userName<br>");
                $("#userName").addClass("is-invalid");
                e.preventDefault();
            } else {
                $(".userNameErr").html("");
                $("#userName").removeClass("is-invalid");
            }
            if (pass == "") {
                $(".pwdErr").html("*Password Can't Be Empty<br>");
                $("#loginPassword").addClass("is-invalid");
                e.preventDefault();
            } else {
                $(".pwdErr").html("");
                $("#loginPassword").removeClass("is-invalid");
            }
        });
    });
</script>
</body>

</html>
