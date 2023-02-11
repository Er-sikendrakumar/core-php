<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>
<?php
$conn=mysqli_connect("localhost","root","","corephp");
$file_name="";
$content="";
$file2_store="";
    if(isset($_POST['homepage']))
    {
        $file_name=$_FILES['file']['name'];
        $file_type=$_FILES['file']['type'];
        $file_size=$_FILES['file']['size'];
        $file_tem_loc=$_FILES['file']['tmp_name'];
        $file_store="uploads/".$file_name;
        move_uploaded_file($file_tem_loc,$file_store);
        $content=$_POST['content'];
    
        $file2_name=$_FILES['file2']['name'];
        $file2_type=$_FILES['file2']['type'];
        $file2_size=$_FILES['file2']['size'];
        $file2_tem_loc=$_FILES['file2']['tmp_name'];
        $file2_store="uploads/".$file2_name;
        move_uploaded_file($file2_tem_loc,$file2_store);

        if($file_name=""){
            $file_store="Choose a image";
        }elseif ($content=="") {
            $content="Enter some content";
        }elseif ($file2_store=="") {
            $file2_store="Select a image";
            
        }else{
            
        $homesql="insert into home_page(slider_img,content,image) values('$file_store','$content','$file2_store')";
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
                          <input type="file" class="form-control" multiple name="file" placeholder="image" required value="">
                          <span class="error"><?php echo $file_name;?></span>
                          <!-- <small class="text-danger"></small> -->
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
                          <input type="file" class="form-control" name="file2" placeholder="image" value="" >
                          <span class="error"><?php echo $file2_store;?></span>                        </div>
                       </div>
                        <button type="submit" name="homepage" class="btn btn-primary offset-sm-2 mt-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        
    </div>
 
<?php include 'footer.php' ;?>          
