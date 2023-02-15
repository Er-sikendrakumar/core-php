
<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>

<?php
   $title="";
   $description="";
   $shortdes="";
   $file_extension="";
   $conn=mysqli_connect("localhost","root","","corephp");
  if(isset($_POST['aboutpage']))
  {
    $title = $_POST['title'];
    $description = $_POST['description'];
    $shortdes = $_POST['shortdes'];
    // $file=$_FILES['file']['name'];

    if($title==""){
      $title="Please enter title";
    }
    if($description==""){
      $description="Please enter description";
    }
    if($shortdes==""){
      $shortdes="Please enter short desc";
    }
    // image part
    $allowed_image_extension = array(
      "png",
      "jpg",
      "jpeg"
  );
  // Get image file extension
  $file_extension = pathinfo($_FILES["file-input"]["name"], PATHINFO_EXTENSION);
  
  // Validate file input to check if is not empty
  if (! file_exists($_FILES["file-input"]["tmp_name"])) {
      $response = array(
          "type" => "error",
          "message" => "Choose image file to upload."
      );
  }    // Validate file input to check if is with valid extension
  else if (! in_array($file_extension, $allowed_image_extension)) {
      $response = array(
          "type" => "error",
          "message" => "Upload valid images. Only PNG and JPEG are allowed."
      );
      
  }    // Validate image file size
  else if (($_FILES["file-input"]["size"] > 2000000)) {
      $response = array(
          "type" => "error",
          "message" => "Image size exceeds 2MB"
      );
  }   
      else {
      $target = "uploads/" . basename($_FILES["file-input"]["name"]);
      move_uploaded_file($_FILES["file-input"]["tmp_name"], $target);
      $aboutsql = "insert into about_page(title,description,short_des,image) values('$title','$description','$shortdes','$target')";
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
                          <input type="file" class="form-control" name="file-input" placeholder="image" value="" >
                          <?php if(!empty($response)) { ?>
                          <div class="response <?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
                          <?php }?>
                        </div>
                        <button type="submit" name="aboutpage" class="btn btn-primary offset-sm-2 mt-2">Submit</button>
                      </div>
                        </form>
                    </div>
                </div>
            </div>
            <?php  
            
            // if(isset($_POST['aboutpage'])) {  
            //     if($titleerr == "" && $descriptionerr == "" && $file_storeerr=="" &&$shortdeserr == "") {   
            //       $aboutsql = "insert into about_page(title,description,short_des,image) values('$title','$description','$shortdes','$file_store')";
            //       $aboutdata = mysqli_query($conn,$aboutsql);
            //       if($aboutdata==true)
            //       {
            //           echo "<script>
            //               alert('One row added successfully');
            //               window.location.href='about.php';
            //               </script>";
            //       }else{
            //           echo "Error". mysqli_error($conn);
            //       }
            //     } 
            // }  
            ?>  
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
