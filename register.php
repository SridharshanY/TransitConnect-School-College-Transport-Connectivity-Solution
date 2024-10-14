<?php
require_once('header.php');
?>
    <div class="intro-section site-blocks-cover innerpage" style="background:black;">
      <div class="container">
        <div class="row align-items-center text-center">
          <div class="col-lg-12 mt-5" data-aos="fade-up">
            <h1>Register</h1>
            <p class="text-white text-center">
              <a href="index.php">Home</a>
              <span class="mx-2">/</span>
              <span>Register</span>
            </p>
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section">
        <div class="container">
            <form method="post">
                    <label for="fname">Student Name</label>
                    <input type="text" id="uname" class="form-control form-control-lg" name="uname">
                    <label for="fname">Roll Number</label>
                    <input type="number" id="roll" class="form-control form-control-lg"  name="roll">
                    <label for="lname">Password</label>
                    <input type="password" id="password" class="form-control form-control-lg"  name="password">
                    <br><br>
                    <input type="submit" value="Register" class="btn btn-primary rounded-0 px-3 px-5" name="register">
                    <br>
                    <p>Already have an account? <a href="contact.php">Log in Here!</a></p>
            </form>
        </div>
    </div>
                <?php
                    if(isset($_POST['register'])){
                        $uname=$_POST['uname'];
                        $roll=$_POST['roll'];
                        $password=$_POST['password'];
                        $status=1;
                        $sql1="select * from user where roll='$roll'";
                        $qry1=mysqli_query($conn,$sql1);
                        $rowcount=mysqli_num_rows($qry1);
                        if($rowcount==0){
                        $sql="INSERT INTO `user`(`uname`, `roll`, `password`, `status`) 
                        VALUES ('$uname','$roll','$password','$status')";
                        $qry=mysqli_query($conn,$sql);
	                    ?>
	                    <script>
	                        alert("Registered Successfully!");
	                        window.location.href = "contact.php";
	                        </script>
	                    <?php
                        }
                        else{
	                    ?>
	                    <script>
	                        alert("You have already registered!");
	                         window.location.href = "contact.php";
	                        </script>
	                    <?php
}


}
?>

    
<?php
require_once('footer.php');
?>