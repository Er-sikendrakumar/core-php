<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>
<?php 
$conn=mysqli_connect("localhost","root","","corephp");
$category="";
$description="";
if(isset($_POST['categorypag']))
{
    $category = $_POST['category'];
    $description = $_POST['description'];
    if($category==""){
        $category="Please enter category";
    }if ($description=="") {
        $description="Please enter some description";
    }else{
  
    $dquery = mysqli_query($conn,"select * from category where cat_name='$category'" );
    if(mysqli_num_rows($dquery)>0){      
        echo "<script>
        alert('Ctaegory Name already exists');
        window.location.href='category.php';
    </script>";
    } else {
        $catsql = "insert into category(cat_name,description) values('$category','$description')";
        $catdata = mysqli_query($conn, $catsql);
        if ($catdata == true) {
            echo " <script>
            alert('One category added successfully');
            window.location.href='category.php';
            </script>";
        } else {
            echo "Error" . mysqli_error($conn);
        }
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
                    <h1>Category</h1>
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
                                <label for="inputName" class="col-sm-2 col-form-label">Category_Name</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="category" placeholder="category name" value="" >
                                <span class="error"><?php echo $category;?></span>                               
                                </div>
                            </div>
                            <div class="form-group row">
                                <label for="inputName" class="col-sm-2 col-form-label">Description</label>
                                <div class="col-sm-10">
                                <input type="text" class="form-control" name="description" placeholder="description" value="">
                                <span class="error"><?php echo $description; ?></span>                               
                                </div>
                            </div>
                            <button type="submit" name="categorypag" class="btn btn-primary offset-sm-2">add</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 
<?php include 'footer.php' ;?>          
