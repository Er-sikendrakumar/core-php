<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php'; 
?>
<?php
$conn=mysqli_connect("localhost","root","","corephp");
$email="";
$phone="";
$address="";
if (isset($_POST['contactus'])){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    if($email==""){
        $email = "please Enter email";
        // echo "<script>document.getElementById('email')classList.add('error2'); </script>";
    }elseif(empty($phone)){
        $phone = "please Enter phone";
    }elseif(empty($address)){
        $address = "please Enter address";
    }else{
        
        $contactsql = "insert into contactus(email,phone,address) values('$email','$phone','$address')";
        $data = mysqli_query($conn, $contactsql);
        if($data==true)
        {
            echo "<script>
                alert('Contact added Successfully');
                window.location.href='contact.php';
            </script>";
        }else{
            echo "Error" . mysqli_error($conn);
        }
    }
}

?>
<script src="https://code.jquery.com/jquery-3.6.3.min.js"></script>
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
                        <form action="" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                              <span class="error"><?php echo $email; ?></span>                        
                            </div>
                            <div class="form-group">
                          <label for="">Phone</label>
                          <input type="text" name="phone" id="" class="form-control" placeholder="Phone" > 
                          <span class="error"><?php echo $phone; ?></span>                         
                       
                        </div>
                        <div class="form-group">
                          <label for="">Address</label>
                          <textarea type="text" name="address" id="" class="form-control" placeholder="Address" > </textarea>
                          <span class="error"><?php echo $address; ?></span>                         
                      
                        </div>
                        <button type="submit" name="contactus" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
    </div>
 <style>
    .error2{
        border-color: red;
    }
 </style>
<?php include 'footer.php' ;?>          
