<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>

<?php
$conn=mysqli_connect("localhost","root","","corephp");
  $title="";
  $description="";
  $shortdes="";
  $file_store="";
  if(isset($_POST['aboutpage']))
  {
      $title = $_POST['title'];
      $description = $_POST['description'];
      $shortdes = $_POST['shortdes'];
      $file_name=$_FILES['file']['name'];
      $file_type=$_FILES['file']['type'];
      $file_size=$_FILES['file']['size'];
      $file_tem_loc=$_FILES['file']['tmp_name'];
      $file_store="uploads/".$file_name;
      move_uploaded_file($file_tem_loc,$file_store);

      if($title==""){
        $title="Please enter title";
      }elseif ($description=="") {
        $description="Please enter description";
      }elseif($shortdes==""){
        $shortdes="Please enter short description";
      }elseif ($file_store=="") {
        $file_store="Choose a file";
      }else{

      
      $aboutsql = "insert into about_page(title,description,short_des,image) values('$title','$description','$shortdes','$file_store')";
      $aboutdata = mysqli_query($conn,$aboutsql);
      if($aboutdata==true)
      {
          echo "<script>
              alert('One row added successfully');
              window.location.href='about.php';
              </script>";
      }else{
          echo "Error". mysqli_error($conn);
      }
    }
  }
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
                    <li class="breadcrumb-item active"><a href="contact.php">Contact</a></li>
                    </ol>
                </div>
                </div>
            </div>
        </section>
        <section class="contact">
            <div class="container-fluid">
                <div class="">
                    <div class="col-md-8">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Title</label>                      
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="title" placeholder="title" value="" >
                          <span class="error"><?php echo $title;?></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                        <div class="col-sm-10">
                          <textarea type="text" class="form-control" name="description" placeholder="description" value="" ></textarea>
                          <span class="error"><?php echo $description;?></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Short Description</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="shortdes" placeholder="short description" value="" >
                          <span class="error"><?php echo $shortdes;?></span>
                        </div>
                      </div>
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="file" placeholder="image" value="" >
                          <span class="error"><?php echo $file_store;?></span>
                        </div>
                        <button type="submit" name="aboutpage" class="btn btn-primary offset-sm-2 mt-2">Submit</button>
                      </div>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
