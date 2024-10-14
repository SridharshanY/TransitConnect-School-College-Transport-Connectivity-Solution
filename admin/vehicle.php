<?php
require_once('header.php');
?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row">
                            <h6 class="mb-4">Vehicle Details</h6></div>
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Category</th>
                                            <th scope="col">Seats</th>
                                            <th scope="col">Number Plate</th>
                                            <th scope="col">Number</th>
                                            <th scope="col">Model Year</th>
                                            <th scope="col">Ownership</th>
                                            <th scope="col">Last Service</th>
                                            <th scope="col">Status</th>

                                            <th scope="col" class="d-flex justify-content-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="SELECT * FROM `vehicle` WHERE status != 0";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $name=$row['name'];
                                            $category=$row['category'];
                                            $seats=$row['seats'];
                                            $plate=$row['plate'];
                                            $number=$row['number'];
                                            $year=$row['year'];
                                            $owner=$row['owner'];
                                            $service=$row['service'];
                                            $status=$row['status'];
                                            if($status==1){
                                                $a="Unassigned";
                                            }
                                            elseif($status==2){
                                                $a="Assigned";
                                            }
                                            $id=$row['id'];
                                        ?>
                                        <tr>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $category;?></td>
                                            <td><?php echo $seats;?></td>
                                            <td><?php echo $plate;?></td>
                                            <td><?php echo $number;?></td>
                                            <td><?php echo $year;?></td>
                                            <td><?php echo $owner;?></td>
                                            <td><?php echo $service;?></td>
                                            <td><?php echo $a;?></td>
                                            <td><a href="student.php?feesid=<?php echo $id;?>"><button class="btn btn-primary" name="remove" id="remove">Remove</button>
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
                if(isset($_GET['feesid'])){
                    $id=$_GET['feesid'];
                    $sql="UPDATE `user` SET `status`='0' WHERE id=$id";}

require_once('footer.php');
?>