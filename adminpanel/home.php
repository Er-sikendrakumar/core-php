<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>
<?php
$conn=mysqli_connect("localhost","root","","corephp");
$content="";
    if(isset($_POST['homepage']))
    { 
        // multi image 
        $allowed_image_extension1 = array(
            "png",
            "jpg",
            "jpeg"
        );
        // Get image file extension
        $file_extension1 = pathinfo($_FILES["file-input1"]["name"], PATHINFO_EXTENSION);
        
        // Validate file input to check if is not empty
        if (! file_exists($_FILES["file-input1"]["tmp_name"])) {
            $response = array(
                "type" => "error",
                "message" => "Choose image file to upload."
            );
        }    // Validate file input to check if is with valid extension
        else if (! in_array($file_extension1, $allowed_image_extension1)) {
            $response = array(
                "type" => "error",
                "message" => "Upload valid images. Only PNG and JPEG are allowed."
            );
            
        }    // Validate image file size
        else if (($_FILES["file-input1"]["size"] > 2000000)) {
            $response = array(
                "type" => "error",
                "message" => "Image size exceeds 2MB"
            );
        }  else {
            $target1 = "uploads/" . basename($_FILES["file-input1"]["name"]);
            if (move_uploaded_file($_FILES["file-input1"]["tmp_name"], $target1)) {
                $response = array(
                    "type" => "success",
                    "message" => "Image uploaded successfully."
                );
            } else {
                $response = array(
                    "type" => "error",
                    "message" => "Problem in uploading image files."
                );
            }
        }

        $content=$_POST['content'];
        if($content==""){
            $content="Please enter some content";
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
            else 
            {
                $target = "uploads/" . basename($_FILES["file-input"]["name"]);
                move_uploaded_file($_FILES["file-input"]["tmp_name"], $target);     
                $homesql="insert into home_page(slider_img,content,image) values('$target1','$content','$target')";
                $homedata=mysqli_query($conn,$homesql);
                if($homedata==true)
                {
                    echo "<script>
                            alert('Home image added successfully');
                            window.location.href='home.php';
                        </script>"; 
                }
                else{
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
                    <h1>Home</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                    <li class="breadcrumb-item"><a href="about.php">About</a></li>
                    <li class="breadcrumb-item "><a href="contact.php">Contact</a></li>
                    </ol>
                </div>
                </div>
            </div><!-- /.container-fluid -->
        </section>
        <section class="contact">
            <div class="container-fluid">
                <div class="">
                    <div class="col-md-8">
                        <form action="" method="post" enctype="multipart/form-data">
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label"> Slider Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" multiple name="file-input1" placeholder="image"  value="">
                          <?php if(!empty($response)) { ?>
                          <div class="response <?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
                          <?php }?>
                        </div>
                       </div>
                        <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Content</label>
                        <div class="col-sm-10">
                          <input type="text" class="form-control" name="content" placeholder="content" value="" >
                          <span class="error"><?php echo $content;?></span>
                        </div>
                      </div>
                      
                      <div class="form-group row">
                        <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                        <div class="col-sm-10">
                          <input type="file" class="form-control" name="file-input" placeholder="image" value="" >
                          <?php if(!empty($response)) { ?>
                          <div class="response <?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
                          <?php }?>                      </div>
                       </div>
                        <button type="submit" name="homepage" class="btn btn-primary offset-sm-2 mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
 
<?php include 'footer.php' ;?>          
