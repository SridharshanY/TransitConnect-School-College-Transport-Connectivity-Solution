<?php
session_start();

require_once('header.php');
?>
    <div class="intro-section site-blocks-cover innerpage" style="background:black;">
      <div class="container">
        <div class="row align-items-center text-center">
          <div class="col-lg-12 mt-5" data-aos="fade-up">
            <h1>Log In</h1>
            <p class="text-white text-center">
              <a href="index.php">Home</a>
              <span class="mx-2">/</span>
              <span>Login</span>
            </p>
          </div>
        </div>
      </div>
    </div>

    
    <div class="site-section">
        <div class="container">
        <form method="post">
                    <label for="fname">Roll Number</label>
                    <input type="text" id="uname" class="form-control form-control-lg" required name="roll">
                    </label>
                    <br><br>
                    <input type="submit" value="Log In" class="btn btn-primary rounded-0 px-3 px-5" name="submit">
                    <br>
                    <p>New User? <a href="register.php">Register Here!</a></p>
        </form>
        </div>
    </div>
    <?php
                        if(isset($_POST['submit'])){
                            $roll=$_POST['roll'];
                            $sql="SELECT * FROM `user` WHERE roll='$roll'";
                            $qry=mysqli_query($conn,$sql);
                            $rowcount=mysqli_num_rows($qry);
                            if($rowcount==0)
                            {
                          ?>
                          <script>
                          alert("Invalid Roll ID");
                          window.location.href = "contact.php";
                          </script>
                          <?php
                            }
                            else{
                            while($row=mysqli_fetch_assoc($qry))
                        {
                            $uname=$row['uname'];
                            $id=$row['id'];
                            $roll=$row['roll'];
                            $_SESSION['uname']=$uname;
                            $_SESSION['id']=$id;
                            $_SESSION['roll']=$roll;
                            ?>
                            <script>
                                alert('Log In successfull!');
                                window.location.href="student.php";
                            </script>
                            <?php

                            }
                          }
                        }
                            ?>            
<?php
require_once('footer.php');
?>