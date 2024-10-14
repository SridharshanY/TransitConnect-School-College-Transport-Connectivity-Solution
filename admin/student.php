<?php
require_once('header.php');
?>
            <div class="container-fluid pt-4 px-4">
                <div class="row g-4">
                <div class="col-12">
                        <div class="bg-secondary rounded h-100 p-4">
                            <div class="row">
                                <div class="col-10">
                            <h6 class="mb-4">Student Details</h6></div>
                            <div class="col-2"><form method="post"><button class="btn btn-primary" name="reset">Reset Fees Status</button></form></div></div>
                                <table class="table table-bordered table-dark">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Roll Number</th>
                                            <th scope="col">Fees Status</th>
                                            <th scope="col">Bus Status</th>
                                            <th scope="col" class="d-flex justify-content-center">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php
                                        $sql="SELECT * FROM `user` WHERE status!=0";
                                        $qry=mysqli_query($conn,$sql);
                                        while($row=mysqli_fetch_assoc($qry)){
                                            $uname=$row['uname'];
                                            $roll=$row['roll'];
                                            $fees=$row['fees'];
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
                                            <td><?php echo $uname;?></td>
                                            <td><?php echo $roll;?></td>
                                            <td><?php echo $fees;?></td>
                                            <td><?php echo $a;?></td>
                                            <td class="d-flex justify-content-center">
                                            <a href="student.php?feesid=<?php echo $id;?>"><button class="btn btn-secondary" name="paid" id="paid" style="margin-right:30px">Paid Fees</button>
                                            <a href="student.php?studentid=<?php echo $id;?>"><button class="btn btn-primary" name="remove" id="remove">Remove</button>
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
                    $sql="UPDATE `user` SET `fees`='Paid' WHERE id=$id";
                   
                   
                    $qry=mysqli_query($conn,$sql);
                    ?>
                    <script>
                                alert("Status Changed!");
                                 window.location.href = "student.php";
                                </script>
                            <?php
                }
                if(isset($_GET['studentid'])){
                    $id=$_GET['studentid'];
                    $sql="DELETE FROM `user` WHERE id=$id";
                   
                   
                    $qry=mysqli_query($conn,$sql);
                    ?>
                    <script>
                                alert("Student Removed!");
                                 window.location.href = "student.php";
                                </script>
                            <?php
                }

                if(isset($_POST['reset'])){
                    $sql="UPDATE `user` SET `fees`='Pending',`status`=1 WHERE 1";
                   
                   
                    $qry=mysqli_query($conn,$sql);
                    ?>
                    <script>
                                alert("Status for all students changed!");
                                 window.location.href = "student.php";
                                </script>
                            <?php
                }

require_once('footer.php');
?>