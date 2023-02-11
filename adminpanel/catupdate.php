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
                    <h3> Update Category</h3>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active">About</li>
                    </ol>
                </div>
                </div>
            </div>
        </section>
        <section class="contact">      
            <div class="container-fluid">
                <div class="">
                    <div class="col-md-8">
                     <?php
                        $conn=mysqli_connect("localhost","root","","corephp");
                        $id = $_GET['updateid'];
                        $sql = "select * from category where id=$id";
                        $result = mysqli_query($conn, $sql);
                     if (mysqli_num_rows($result) > 0) {
                         while ($row = mysqli_fetch_assoc($result)) {
                             ?>
                        <form action="code.php" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Category_Name</label>
                                <div class="col-sm-10">
                                    <input type="hidden" name="cid" value="<?php echo $row['id']; ?>">
                                <input type="text" class="form-control" name="category" placeholder="category name" value="<?php echo $row['cat_name']; ?>">                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" placeholder="description" value="<?php echo $row['description']; ?>">                               
                                </div>
                            </div>
                            <button type="submit" name="cat_update" value="update" class="btn btn-primary offset-sm-2">update</button>
                        </form>
                        <?php
                         }
                     } 
                        ?>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
