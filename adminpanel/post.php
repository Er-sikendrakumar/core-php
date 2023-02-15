<?php 
include 'session.php';
include 'header.php';?>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"></script>
<?php include 'sidebar.php'; ?> 
?>
<?php
$conn=mysqli_connect("localhost","root","","corephp");
    $title="";
   $multicat="";
    $cont="";
    $file_type="";
    if(isset($_POST['multi_cat_select']))
    {
        // print_r($_POST);exit();
        $title = $_POST['title'];
        $multicat = isset($_POST['multiselect'])?$_POST['multiselect']:"";
        $cont = $_POST['content1'];         
            
            if($title==""){
                $title="Please enter title";
            }if($multicat==""){
                $multicat="Select category";    
            }if($cont==""){
                $cont="Please enter content";         
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
            else{
            $target = "uploads/" . basename($_FILES["file-input"]["name"]);
             move_uploaded_file($_FILES["file-input"]["tmp_name"], $target);   
            $postsql = "insert into post(title,content,image) values('$title','$cont','$target')";
            $presult = mysqli_query($conn, $postsql);
            $post_id = $conn->insert_id;
            foreach ($multicat as $item) {
            $sql1 = "insert into post_category(post_id,category_id) values('$post_id','$item')";
            $res1 = mysqli_query($conn, $sql1);
            }
            if($presult==true){           
                echo "<script>
                    alert('Post added successfully');
                    window.location.href='post.php';
                    </script>";
            }else{
                echo "Error" . mysqli_error($conn);
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
                    <h1>Create Post</h1>
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
                        <form action="" method="post" enctype="multipart/form-data">
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Title</label>
                                <div class="col-sm-10">
                                    <input type="text" class="form-control" name="title" placeholder="title" value="" >
                                    <span class="error"><?php echo $title; ?></span>
                                </div>
                            </div>
                        <div class="container mt-3">                                          
                            <label for="sel2" class="form-label ">   Category:</label>
                            <select multiple class="form-select bg-light" id="sel2" name="multiselect[]" >
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
                           <span class="error"><?php echo $multicat; ?> </span>
                        </div> 
                        <div class="form-group row mt-4">
                            <label for="inputName" class="col-sm-2 col-form-label">Content</label>
                            <div class="col-sm-10">
                                <textarea type="text" class="form-control" name="content1" placeholder="content" value=""></textarea>
                                <span class="error"><?php echo $cont; ?></span>
                            </div>
                       </div>
                       <div class="form-group row">
                            <label for="inputName" class="col-sm-2 col-form-label">Image</label>
                            <div class="col-sm-10">
                                <input type="file" class="form-control" name="file-input" placeholder="image" value="">
                                <?php if(!empty($response)) { ?>
                                <div class="response <?php echo $response["type"]; ?>"><?php echo $response["message"]; ?></div>
                                <?php }?>
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
