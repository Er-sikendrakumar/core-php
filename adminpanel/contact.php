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
$emailerr = $phoneerr = $addresserr ="";
if ($_SERVER["REQUEST_METHOD"]=="POST"){
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $address = $_POST['address'];
    
    if(empty($_POST['email'])){
        $emailerr = "please Enter email";
    }else{
        $email = input_data($_POST["email"]);  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailerr = "Invalid email format";  
            }  
    }
    if(empty($_POST['phone'])){
        $phoneerr="Phone No is required";
    }else
    {
        $phone = input_data($_POST["phone"]);  
        if (!preg_match ("/^[0-9]*$/", $phone) ) {  
        $phoneerr = "Only numeric value is allowed.";  
        }  
      if (strlen ($phone) != 10) {  
        $phoneerr = "Mobile no must contain 10 digits.";  
        } 
    }
    if(empty($_POST['address'])){
        $addresserr=" Please enter address";
    }else{
        $address=input_data($_POST['address']);
    }
    // else{
        
    //     $contactsql = "insert into contactus(email,phone,address) values('$email','$phone','$address')";
    //     $data = mysqli_query($conn, $contactsql);
    //     if($data==true)
    //     {
    //         echo "<script>
    //             alert('Contact added Successfully');
    //             window.location.href='contact.php';
    //         </script>";
    //     }else{
    //         echo "Error" . mysqli_error($conn);
    //     }
    // }
}
    function input_data($data) {  
        $data = trim($data);  
        $data = stripslashes($data);  
        $data = htmlspecialchars($data);  
        return $data;  
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
                        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                              <label for="">Email</label>
                              <input type="email" name="email" id="email" class="form-control" placeholder="Email" >
                              <span class="error"><?php echo $emailerr; ?></span>                        
                            </div>
                            <div class="form-group">
                          <label for="">Phone</label>
                          <input type="text" name="phone" id="" class="form-control" placeholder="Phone" > 
                          <span class="error"><?php echo $phoneerr; ?></span>                         
                       
                        </div>
                        <div class="form-group">
                          <label for="">Address</label>
                          <textarea type="text" name="address" id="" class="form-control" placeholder="Address" > </textarea>
                          <span class="error"><?php echo $addresserr; ?></span>                         
                      
                        </div>
                        <button type="submit" name="contactus" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
            <?php  
            if(isset($_POST['contactus'])) {  
                if($emailerr == "" && $phoneerr == "" && $addresserr == "") {   
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
        </section>
    </div>
 <style>
    .error2{
        border-color: red;
    }
 </style>
<?php include 'footer.php' ;?>          
