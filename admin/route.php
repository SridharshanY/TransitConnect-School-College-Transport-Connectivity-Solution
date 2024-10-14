<?php
require_once('header.php');
?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <h6 class="mb-4">Route Details</h6>
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Route</th>
                                            <th scope="col">Driver</th>
                                            <th scope="col">Bus Number</th>
                                            <th scope="col" class="d-flex justify-content-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                            $sql="SELECT * FROM `route` WHERE status=1";
                                            $qry=mysqli_query($conn,$sql);
                                            while($row=mysqli_fetch_assoc($qry)){
                                                $route=$row['route'];
                                                $bus=$row['bus'];
                                                $driver=$row['driver'];
                                                $id=$row['id'];

                                            
                                            $sql1="SELECT * FROM `driver` WHERE id=$driver";
                                            $qry1=mysqli_query($conn,$sql1);
                                            while($row1=mysqli_fetch_assoc($qry1)){
                                                $name=$row1['name'];
                                            }
                                            $sql2="SELECT * FROM `vehicle` WHERE id=$bus";
                                            $qry2=mysqli_query($conn,$sql2);
                                            while($row2=mysqli_fetch_assoc($qry2)){
                                                $number=$row2['number'];
                                            }
                                            ?>
                                            <tr>
                                                <td><?php echo $route;?></td>
                                                <td><?php echo $name;?></td>
                                                <td><?php echo $number;?></td>
                                                <td class="d-flex justify-content-center"><a href="route.php?routeid=<?php echo $id;?>"><button class="btn btn-primary" name="remove" id="remove">Remove</button>
                                            </a></td>
                                                <?php } ?>
                                            </tr>
                                        </tbody>
                                    </table>
                            </div>
                        </div>
                    </div>
                </div>
    <?php
                        if(isset($_GET['routeid'])){
                            $id=$_GET['routeid'];
                            $sql="SELECT * FROM `route` WHERE id=$id";
                            $qry=mysqli_query($conn,$sql);
                            while($row1=mysqli_fetch_assoc($qry)){
                                $driver=$row1['driver'];
                                $vehicle=$row1['bus'];
                            }
                            $sql="DELETE FROM `route` WHERE id=$id";
                            $qry=mysqli_query($conn,$sql);
                            $sql1="UPDATE `vehicle` SET `status`='1' WHERE id=$driver";
                            $qry=mysqli_query($conn,$sql1);
                            $sql2="UPDATE `driver` SET `status`='1' WHERE id=$vehicle";
                            $qry=mysqli_query($conn,$sql2);
                            $sql3="UPDATE `user` SET `status`=1,`route`=NULL WHERE route=$id";
                            $qry=mysqli_query($conn,$sql3);
                            ?>
                            <script>
                                        alert("Status Changed!");
                                         window.location.href = "route.php";
                                        </script>
                                    <?php
        
                        }
                        ?>

                                        

<?php
require_once('footer.php');
?>