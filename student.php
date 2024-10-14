<?php
session_start();
$uname=$_SESSION['uname'];
$id=$_SESSION['id'];
require_once('header.php');
$sql="SELECT * FROM `user` WHERE `id`=$id";
$qry=mysqli_query($conn,$sql);
while($row=mysqli_fetch_assoc($qry)){
$roll=$row['roll'];
$fees=$row['fees'];
$route=$row['route'];
}
$sql1="SELECT * FROM `route` WHERE `id`=$route";
$qry1=mysqli_query($conn,$sql1);
while($row=mysqli_fetch_assoc($qry1)){
$name=$row['route'];
$bus=$row['bus'];
$driver=$row['driver'];
}
$sql2="SELECT * FROM `vehicle` WHERE `id`=$bus";
$qry2=mysqli_query($conn,$sql2);
while($row=mysqli_fetch_assoc($qry2)){
$bname=$row['number'];
}
$sql3="SELECT * FROM `driver` WHERE `id`=$driver";
$qry3=mysqli_query($conn,$sql3);
while($row=mysqli_fetch_assoc($qry3)){
$dname=$row['name'];}
?>
<br>
<br>
<section id="printableArea">
            <div class="container mt-5 pt-4">
            
                <div class="row g-4">
                <div class="col-12">
                        <div class="rounded h-100 p-4" style="border:2px solid black">
                            <h6 class="mb-4">Route Details</h6>
                                <table class="table table-bordered table-dark">
                                        <tr>
                                            <th scope="col">Name</th>
                                            <td><?php echo $uname;?></td>
</tr>
<tr>
                                            <th scope="col">Roll number</th>
                                            <td><?php echo $roll;?></td>
</tr>
<tr>
                                            <th scope="col">Route</th>
                                            <td><?php echo $name;?></td>
</tr>
<tr>
                                            <th scope="col">Bus Number</th>
                                            <td><?php echo $bname;?></td>
</tr>
<tr>
                                            <th scope="col">Driver</th>
                                            <td><?php echo $dname;?></td>
</tr>
<tr>
                                            <th scope="col">Fees Status</th>
                                            <td><?php echo $fees;?></td>
</tr>

<tr>
                                            <th scope="col">Print</th>
                                            <td><button class="btn btn-primary" name="remove" id="remove" onclick="printPageArea('printableArea')">Print</button></td>
</tr>
                                    </table>
</section>
                            </div>
                        </div>
                    </div>
                </div>
<br>
<br>
        <script>
            function printPageArea(printableArea){
    var printContent = document.getElementById(printableArea).innerHTML;
    var originalContent = document.body.innerHTML;
    document.body.innerHTML = printContent;
    window.print();
    document.body.innerHTML = originalContent;
}
        </script>
<?php
require_once('footer.php');
?>