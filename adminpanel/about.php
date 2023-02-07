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
                    <h1>About</h1>
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
                        <form action="" method="post">
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" placeholder="title" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="description" placeholder="description" value=""></textarea>
                          <!-- <small class="text-danger"></small> -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="shortdes" placeholder="short description" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="image" placeholder="image" value="">
                          <!-- <small class="text-danger"></small> -->
                        </div>
                        <button type="submit" class="btn btn-primary offset-sm-2 mt-2">Submit</button>
                      </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
