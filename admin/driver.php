<?php
require_once('header.php');
?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row">
                            <h6 class="mb-4">Driver Details</h6></div>
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Age</th>
                                            <th scope="col">Experience</th>
                                            <th scope="col">Mobile Number</th>
                                            <th scope="col">License</th>
                                            <th scope="col">Email ID</th>
                                            <th scope="col" class="d-flex justify-content-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="SELECT * FROM `driver` WHERE status != 0";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $name=$row['name'];
                                            $age=$row['age'];
                                            $exp=$row['exp'];
                                            $number=$row['number'];
                                            $file=$row['file'];
                                            $email=$row['email'];
                                            $id=$row['id'];
                                        
                                        ?>
                                        <tr>
                                            <td><?php echo $name;?></td>
                                            <td><?php echo $age;?></td>
                                            <td><?php echo $exp;?></td>
                                            <td><?php echo $number;?></td>
                                            <td class="d-flex justify-content-center"><img src="./<?php echo $file;?>" height="100px" width="100px"></td>
                                            <td><?php echo $email;?></td>
                                            <td><a href="driver.php?feesid=<?php echo $id;?>"><button class="btn btn-primary" name="remove" id="remove">Remove</button>
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