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
                    <h1> List Category</h1>
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
        <div class="row ">
            <div class="col-md-8 py-3">
                <div class="table-responsive-md">
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Category</th>
                                <th>Description</th>
                                <th colspan="2">Action</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn=mysqli_connect("localhost","root","","corephp");
                            $sql = "select * from category";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) >0){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                   echo "<tr>
                                <td>".$id. "</td>
                                <td>".$row['cat_name']."</td>
                                <td>".$row['description']."</td>
                                <td><button class='btn btn-warning'><a href='catupdate.php?updateid=$id' class='text-dark'>Edit</a></button></td>
                                <td><button class='btn btn-danger'><a href='code.php?deleteid=$id' class='text-dark'>Delete</a></button></td>
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
 
<?php include 'footer.php' ;?>          
