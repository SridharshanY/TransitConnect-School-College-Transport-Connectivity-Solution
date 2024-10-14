<?php
require_once('header.php');
?>

<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Driver</h6>
                            <form method="post" enctype="multipart/form-data">
                                <div class="row">
                                    <div class="col">
                                <div class="mb-3">
                                    <label for="name" class="form-label">Name</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    <!-- <div id="emailHelp" class="form-text">We'll never share your email with anyone else.
                                    </div> -->
                                </div>
                                <div class="mb-3">
                                    <label for="age" class="form-label">Age</label>
                                    <input type="number" class="form-control" id="age" name="age" required>
                                </div>
                                <div class="mb-3">
                                    <label for="exp" class="form-label">Experience</label>
                                    <input type="number" class="form-control" id="exp" name="exp" required>
                                </div>

                                    </div>
                                    <div class="col">
                                <div class="mb-3">
                                    <label for="number" class="form-label">Mobile Number</label>
                                    <input type="number" class="form-control" id="number" name="number" required>
                                </div>
                                <div class="mb-3">
                                <label for="formFile" class="form-label">Upload License</label>
                                <input class="form-control bg-dark" type="file" id="formFile" name="file" required>
                                </div>
                                <div class="mb-3">
                                    <label for="email" class="form-label">Email ID</label>
                                    <input type="email" class="form-control" id="email" name="email" required>
                                </div>
                                <!-- <div class="mb-3 form-check">
                                    <input type="checkbox" class="form-check-input" id="exampleCheck1">
                                    <label class="form-check-label" for="exampleCheck1">Check me out</label>
                                </div> -->

                                    </div>
                                    </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Register">
                            </form>
                        </div>
                    </div>

                    <?php
                        if(isset($_POST['submit'])){
                            $name=$_POST['name'];
                            $age=$_POST['age'];
                            $vehicle=$_POST['vehicle'];
                            $exp=$_POST['exp'];
                            $address=$_POST['address'];
                            $number=$_POST['number'];
                            $email=$_POST['email'];
                            $file1=$_FILES['file']['name'];
                            $file2=$_FILES['file']['tmp_name'];
                            $dir="upload/".$file1;
                            $image=move_uploaded_file($file2,$dir);
                            $status=1;
                            $sql1="select * from driver where email='$email'";
                            $qry1=mysqli_query($conn,$sql1);
                            $rowcount=mysqli_num_rows($qry1);
                            if($rowcount==0){
                            $sql="INSERT INTO `driver`(`name`, `age`, `exp`, `address`, `number`, `file`, `email`, `status`) 
                            VALUES ('$name','$age','$exp','$address','$number','$dir','$email','$status')";
                            $qry=mysqli_query($conn,$sql);
                            ?>
                            <script>
                                alert("Driver Registered Successfully!");
                                window.location.href = "driveradd.php";
                                </script>
                            <?php
                            }
                            else{
                            ?>
                            <script>
                                alert("Driver already registered!");
                                 window.location.href = "driveradd.php";
                                </script>
                            <?php
    }
    
                        }


require_once('footer.php');
?>