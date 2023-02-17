<?php 
include 'session.php';
include 'header.php';
include 'sidebar.php';
?>

<?php 
$conn=mysqli_connect("localhost","root","","corephp");
$fname=$lname=$email=$phone=$salary=$address=$addaddress="";
$fnameErr=$lnameErr=$emailErr=$phoneErr=$salaryErr=$addressErr=$addaddressErr="";
if($_SERVER["REQUEST_METHOD"]=="POST"){
    if(empty($_POST['fname'])){
        $fnameErr="Please Enter fname";
    }else{
        $fname=$_POST['fname'];
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {  
            $fnameErr = "Only alphabets and white space are allowed";  
        }  
    }
    if(empty($_POST['lname'])){
        $lnameErr="Please Enter lname";
    }else{
        $lname=$_POST['lname'];
    }
    if(empty($_POST['email'])){
        $emailErr="Please Enter email";
    }else{
        $email=$_POST['email'];
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
            $emailErr = "Invalid email format";  
        } 
    }
    if(empty($_POST['phone'])){
        $phoneErr="Please Enter phone";
    }else{
        $phone=$_POST['phone'];
        if (!preg_match ("/^[0-9]*$/", $phone) ) {  
            $phoneErr = "Only numeric value is allowed.";  
            }  
          if (strlen ($phone) != 10) {  
            $phoneErr = "Mobile no must contain 10 digits.";  
            } 
    }
    if(empty($_POST['salary'])){
        $salaryErr="Please Enter salary";
    }else{
        $salary=$_POST['salary'];
    }
    if(empty($_POST['gender'])){
        $addressErr="Please select address";
    }else{
        $address=$_POST['gender'];
    }
    if(empty($_POST['addaddress'])){
        $addaddressErr="Please Enter addaddress";
    }else{
        $addaddress=$_POST['addaddress'];
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
                    <h1>Update Employee</h1>
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
        <section>
            <div class="container">
                <div class="col-md-9">
                    <div>
                        <?php
                            if(isset($_GET['empupdateid'])){
                                $id=$_GET['empupdateid'];
                                $empsql="select * from employee where id=$id";
                                $empquery=mysqli_query($conn,$empsql);
                                $emprow=mysqli_fetch_assoc($empquery);
                                // Add more query
                               
                         ?>
                        
                        <form method="POST" action="code.php" enctype="multipart/form-data">
                           <div class="form-group">
                             <label for="">First-name:</label>
                             <input type="hidden" name="empid" value="<?php echo $emprow['id'];?>">
                             <input type="text" name="fname" id="" class="form-control" placeholder="" value="<?php echo $emprow['fname'];?>">
                             <small id="helpId" class="error"><?php echo $fnameErr; ?></small>
                           </div> 
                           <div class="form-group">
                             <label for="">Last-name:</label>
                             <input type="text" name="lname" id="" class="form-control" placeholder="" value="<?php echo $emprow['lname'];?>">
                             <small id="helpId" class="error "><?php echo $lnameErr; ?></small>
                           </div>
                           <div class="form-group">
                             <label for="">E-mail:</label>
                             <input type="email" name="email" id="" class="form-control" placeholder="" value="<?php echo $emprow['email'];?>">
                             <small id="helpId" class="error"><?php echo $emailErr; ?></small>
                           </div> 
                           <div class="form-group">
                             <label for="">Phone:</label>
                             <input type="text" name="phone" id="" class="form-control" placeholder="" value="<?php echo $emprow['phone'];?>">
                             <small id="helpId" class="error"><?php echo $phoneErr;?></small>
                           </div> 
                           <div class="form-group">
                             <label for="">Salary:</label>
                             <input type="text" name="salary" id="" class="form-control" placeholder="" value="<?php echo $emprow['salary'];?>">
                             <small id="helpId" class="error"><?php echo $salaryErr; ?></small>
                           </div> 
                           <div class="form-inline">
                             <label for="">Address:</label>
                             <input type="radio" name="gender" id="" class="form-inline" placeholder="" value="Permanentaddress" <?php if($emprow['select_address']=="Permanentaddress"){ echo "checked";}?>>PermanentAddress
                             <input type="radio" name="gender" id="" class="form-inline" placeholder="" value="Persentaddress"<?php if($emprow['select_address']=="Persentaddress"){ echo "checked";}?>>PresentAddress
                             
                            </div> 
                            <small id="helpId" class="error"><?php echo $addressErr; ?></small>

                           <div class="form-group mt-3">
                             <label for="">Add-Address:</label>
                             <textarea type="text" name="addaddress" id="" class="form-control" placeholder="" value=""><?php echo $emprow['address'];?></textarea>
                             <small id="helpId" class="error"><?php echo $addaddressErr; ?></small>
                           </div>
                           <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field" name="addmore">  
                                <?php
                                     $addsql="select * from employee_other_salary where emp_id=$id";
                                     $addresult=mysqli_query($conn,$addsql);
                                     while($addrow=mysqli_fetch_assoc($addresult)){
                                    
                                ?>
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Income Type" value="<?php echo $addrow['name'];?>" class="form-control name_list" /></td>  
                                         <td><input type="text" name="salary1[]" placeholder="Earning Amount" value="<?php echo $addrow['other_salary'];?>" class="form-control " /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr> 
                                    <?php  } ?> 
                               </table>  
                          </div>   
                           <button type="submit" name="updateemployee" class="btn btn-primary">Submit</button>
                        </form>
                        <?php       
                            }
                         ?>
                    </div>
                </div>
            </div>
        </section>    
 </div>
<?php include 'footer.php'; ?>