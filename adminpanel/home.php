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
                    <h1>Home</h1>
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
                        <label for="inputName" class="col-sm-2 col-form-label"> Slider Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" multiple name="file" placeholder="image" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                       </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="content" placeholder="content" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="file2" placeholder="image" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                       </div>
                        <button type="submit" name="homepage" class="btn btn-primary offset-sm-2 mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
 
<?php include 'footer.php' ;?>          
