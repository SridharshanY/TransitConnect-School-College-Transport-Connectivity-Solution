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
                                <label for="owner" class="form-label">Category</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="category" name="category" required>
                                <option selected>Select Category</option>
                                <option value="New">Van</option>
                                <option value="Pre-Owned">Bus</option>
                                </select>
                                <div class="mb-3">
                                    <label for="seat" class="form-label">Seats</label>
                                    <input type="number" class="form-control" id="seat" name="seat" required>
                                </div>
                                <div class="mb-3">
                                    <label for="plate" class="form-label">Number Plate</label>
                                    <input type="text" class="form-control" id="plate" name="plate" required>
                                </div>
                                    </div>
                                    <div class="col">
                                <div class="mb-3">
                                    <label for="number" class="form-label">Bus Number</label>
                                    <input type="number" class="form-control" id="number" name="number" required>
                                </div>
                                <div class="mb-3">
                                    <label for="year" class="form-label">Year</label>
                                    <input type="number" class="form-control" id="year" name="year" required>
                                </div>
                                <label for="owner" class="form-label">Ownership</label>
                                <select class="form-select mb-3" aria-label="Default select example" id="owner" name="owner" required>
                                <option selected>Select Ownership</option>
                                <option value="New">New</option>
                                <option value="Pre-Owned">Pre-Owned</option>
                                </select>
                                <div class="mb-3">
                                    <label for="service" class="form-label">Last Service</label>
                                    <input type="date" class="form-control" id="service" name="service" required>
                                </div>
                                    </div>
                                    </div>
                                <input type="submit" class="btn btn-primary" name="submit" value="Register">
                            </form>
                        </div>
                    </div>

                    <?php
                        if(isset($_POST['submit'])){
                            $name=$_POST['name'];
                            $category=$_POST['category'];
                            $seat=$_POST['vehicle'];
                            $plate=$_POST['plate'];
                            $number=$_POST['number'];
                            $year=$_POST['year'];
                            $owner=$_POST['owner'];
                            $service=$_POST['service'];
                            $status=1;
                            $driver="Unassigned";
                            $route="Unassigned";
                            $sql1="select * from vehicle where number='$number'";
                            $qry1=mysqli_query($conn,$sql1);
                            $rowcount=mysqli_num_rows($qry1);
                            if($rowcount==0){
                            $sql="INSERT INTO `vehicle`(`name`, `category`, `seats`, `plate`, `number`, `year`, `owner`, `service`, `status`) 
                            VALUES ('$name','$category','$seat','$plate','$number','$year','$owner','$service','$status')";
                            $qry=mysqli_query($conn,$sql);
                            ?>
                            <script>
                                alert("Vehicle Registered Successfully!");
                                window.location.href = "vehicleadd.php";
                                </script>
                            <?php
                            }
                            else{
                            ?>
                            <script>
                                alert("Vehicle Number already assigned!");
                                 window.location.href = "vehicleadd.php";
                                </script>
                            <?php
    }
    
                        }


require_once('footer.php');
?>