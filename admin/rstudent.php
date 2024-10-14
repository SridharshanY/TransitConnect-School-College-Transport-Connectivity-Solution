<?php
require_once('header.php');
?>
<div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                    <div class="col-sm-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Add Student</h6>
                            <form method="post">
                                <div class="row">
                                    <div class="col-6">
                                    <div class="mb-3">
                                    <label for="owner" class="form-label">Driver</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="category" name="driver" required>
                                    <option selected>Select Student</option>
                                        <?php
                                        $sql="SELECT * FROM `user` WHERE (`fees`='Paid') and (`status`= 1)";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $name=$row['uname'];
                                            $id1=$row['id']?>
                                        ?>
                                    <option value="<?php echo $id1;?>"><?php echo $name;?></option>
                                    <?php
                                        }
                                        ?>
                                    </select>
                                    </div>
                                    </div>
                                    <div class="col-6">
                                    <div class="mb-3">
                                    <label for="owner" class="form-label">Bus</label>
                                    <select class="form-select mb-3" aria-label="Default select example" id="category" name="vehicle" required>
                                    <option selected>Select Route</option>
                                    <?php
                                        $sql="SELECT * FROM `route` WHERE `status`=1";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $route=$row['route'];
                                            $id2=$row['id']?>
                                    <option value="<?php echo $id2;?>"><?php echo $route;?></option>
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
                            $id1=$_POST['driver'];
                            $id2=$_POST['vehicle'];                            
                            $status=1;
                            $sql="SELECT * FROM `route` WHERE id=$id2";
                            $qry=mysqli_query($conn,$sql);
                            while($row1=mysqli_fetch_assoc($qry)){
                                $driver=$row1['driver'];
                                $vehicle=$row1['bus'];
                            }

                            $sql="UPDATE `user` SET `route`='$id2',`status`=2 WHERE id=$id1";
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