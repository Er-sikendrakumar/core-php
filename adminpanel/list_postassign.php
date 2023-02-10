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
                    <h1> List Post Assign</h1>
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
                <a href="post.php"><button class="btn btn-primary offset-sm-10 mb-2">Add Post</button></a>
                    <table class="table table-hover table-bordered table-sm">
                        <thead>
                            <tr>
                                <th>S.No</th>
                                <th>Title</th>                                
                                <th>Content</th> 
                                <th>image</th>                             
                                <th colspan="2">Action</th>                               
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $conn=mysqli_connect("localhost","root","","corephp");
                            $sql = "select * from post";
                            $result = mysqli_query($conn, $sql);
                            if(mysqli_num_rows($result) >0){
                                while($row=mysqli_fetch_assoc($result)){
                                    $id = $row['id'];
                                    
                                   echo "<tr>
                                <td>".$id. "</td>
                                <td>".$row['title']."</td>                                 
                                <td>".$row['content']."</td> 
                                <td>"."<img src=".$row['image']." height=100 width=100 />"."</td>                                                       
                                <td><button class='btn btn-warning'><a href='update_post.php?postupdateid=$id' class='text-dark'>Edit</a></button></td>
                                <td><button class='btn btn-danger'><a href='code.php?postdeleteid=$id' class='text-dark'>Delete</a></button></td>
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
