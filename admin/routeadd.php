<?php
require_once('header.php');
?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Driver</h6>
                            <form method="post">
                                <div class="row">
                                    <div class="col-4">
                                    <div class="mb-3">
                                    <label for="name" class="form-label">Route</label>
                                    <input type="text" class="form-control" id="name" name="name">
                                    </div>
                                    </div>
                                    <div class="col-4">
                                    <div class="mb-3">
                                    <label for="owner" class="form-label">Driver</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="category" name="driver" required>
                                    <option selected>Select Driver</option>
                                        <?php
                                        $sql="SELECT * FROM `driver` WHERE status=1";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $name=$row['name'];
                                            $id1=$row['id']?>
                                        ?>
                                    <option value="<?php echo $id1;?>"><?php echo $name;?></option>
                                    <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-4">
                                    <div class="mb-3">
                                    <label for="owner" class="form-label">Bus</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="category" name="vehicle" required>
                                    <option selected>Select Bus</option>
                                    <?php
                                        $sql="SELECT * FROM `vehicle` WHERE status=1";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $number=$row['number'];
                                            $id2=$row['id']?>
                                    <option value="<?php echo $id2;?>"><?php echo $number;?></option>
                                    <?php
                                        }
                                        ?>
                                    </select>
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
                            $driver=$_POST['driver'];
                            $vehicle=$_POST['vehicle'];
                            $status=1;
                            $sql="INSERT INTO `route`(`route`, `bus`, `driver`, `status`) VALUES ('$name','$vehicle','$driver','$status')";
                            $qry=mysqli_query($conn,$sql);
                            $sql="UPDATE `vehicle` SET `status`='2' WHERE id=$vehicle";
                            $qry=mysqli_query($conn,$sql);
                            $sql="UPDATE `driver` SET `status`='2' WHERE id=$driver";
                            $qry=mysqli_query($conn,$sql);
                            ?>
                            <script>
                                alert('Route set successfully!');
                                window.location.href="route.php";
                            </script>
                            <?php
                        }
                        ?>

<?php
require_once('footer.php');
?>