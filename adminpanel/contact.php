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
                    <h1>Contact</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="home.php">Home</a></li>
                    <li class="breadcrumb-item active"><a href="about.php">About</a></li>
                    </ol>
                </div>
                </div>
                <div class="container">
                    <div class="col-md-7">
                        <form action="code.php" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" name="email" id="" class="form-control" placeholder="" aria-describedby="helpId">                        
                            </div>
                            <div class="form-group">
                          <label for="">Phone</label>
                          <input type="text" name="phone" id="" class="form-control" placeholder="" aria-describedby="helpId">                        
                        </div>
                        <div class="form-group">
                          <label for="">Address</label>
                          <textarea type="text" name="address" id="" class="form-control" placeholder="" > </textarea>                      
                        </div>
                        <button type="submit" name="contactus" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
