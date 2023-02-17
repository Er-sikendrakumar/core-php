<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>

 <!-- Horizontal Form -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6 text-green">
                    <h1> List Employee</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="category">
        <div class="container"> 
        <div class=" ">
            <div class="col-sm-8 py-3">
                <div class="table-responsive-md">
                <a href="add_employee.php"><button class="btn btn-primary  mb-2">Add Employee</button></a>
                    <table class="table table-hover table-bordered border-primary table-sm">
                        <thead class="col-sm-5 thead-light">
                            <tr>
                                <th>S.No</th>
                                <th>F.name</th>                                
                                <th>L.name</th> 
                                <th>Email</th>
                                <th>Phone</th>    
                                <th>Salary</th> 
                                <th>Address Status</th>
                                <th>Address</th> 
                                <th colspan="2" rowspan="2">Member Salary</th>                                                 
                                <th colspan="2">Action</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn=mysqli_connect("localhost","root","","corephp");
                            
                            $sql = "select * from employee";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) >0){
                                while($row=mysqli_fetch_assoc($result)){
                                $id = $row['id']; 
                                $addsql="select * from employee_other_salary where emp_id=$id"; 
                                $result1= mysqli_query($conn,$addsql);
                                    
                                                                  
                                 echo "<tr>
                                    <td>".$id. "</td>
                                    <td>".$row['fname']."</td>                                 
                                    <td>".$row['lname']."</td>
                                    <td>".$row['email']."</td> 
                                    <td>".$row['phone']."</td>
                                    <td>".$row['salary']."</td>
                                    <td>".$row['select_address']."</td>
                                    <td>".$row['address']."</td>
                                    <td><table class='table'><tbody>";
                                    while($addrow=mysqli_fetch_assoc($result1)){
                                        $empid=$addrow['emp_id'];
                                    echo "<tr><td>".$addrow['name']."</td><td>".$addrow['other_salary']."</td></tr>";
                                    }
                                    echo "</tbody></table></td>
                                    <td><button class='btn btn-warning'><a href='update_employee.php?empupdateid=$id' class='text-dark'>Edit</a></button></td>
                                    <td><button class='btn btn-danger'><a href='code.php?delempid=$id' class='text-dark'>Delete</a></button></td>
                                 </tr>";
                                }                                 
                            }
                            ?>                                                                
                        </tbody>
                    </table>
                </div>
            </div>       
        </section>
    </div>
 
<?php include 'footer.php';?>          
