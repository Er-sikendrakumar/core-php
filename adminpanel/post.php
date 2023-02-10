<?php 
include 'session.php';
include 'header.php';?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'sidebar.php'; ?> 
?>

 <!-- Horizontal Form -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6 text-green">
                    <h1>Create Post</h1>
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
        <section class="contact">
            <div class="container-fluid">
                <div class="">
                    <div class="col-md-8">
                   
                        <form action="code.php" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" placeholder="title" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                       </div>
                        <div class="container mt-3">                                          
                            <label for="sel2" class="form-label ">   Category:</label>
                            <select multiple class="form-select bg-light" id="sel2" name="multiselect[]">
                                <!-- <option>Select Category</option> -->
                        <?php
                        $conn=mysqli_connect("localhost","root","","corephp");                    
                        $sql = "select * from category ";
                        $result = mysqli_query($conn, $sql);
                    if (mysqli_num_rows($result) > 0) {
                        while ($row = mysqli_fetch_assoc($result)) {
                            ?>
                            <option value="<?php echo $row['id']; ?>"> <?php echo $row['cat_name'];?></option>
                         <?php
                        }
                    } 
                         ?>                                          
                                </select>
                            </div> 
                        <div class="form-group row mt-4">
                        <label for="inputName" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="content" placeholder="content" value=""></textarea>
                          <!-- <small class="text-danger"></small> -->
                        </div>
                       </div>
                       <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="file" placeholder="image" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                       </div>
                            <button type="submit" name="multi_cat_select" class="btn btn-primary mt-3">Submit</button>                                                    
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
