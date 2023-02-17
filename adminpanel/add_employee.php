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
        $fname=input_data($_POST['fname']);
        if (!preg_match("/^[a-zA-Z ]*$/",$fname)) {  
            $fnameErr = "Only alphabets and white space are allowed";  
        }  
    }
    if(empty($_POST['lname'])){
        $lnameErr="Please Enter lname";
    }else{
        $lname=input_data($_POST['lname']);
    }
    if(empty($_POST['email'])){
        $emailErr="Please Enter email";
    }else{
        $email=input_data($_POST['email']);
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
            $emailErr = "Invalid email format";  
        } 
    }
    if(empty($_POST['phone'])){
        $phoneErr="Please Enter phone";
    }else{
        $phone=input_data($_POST['phone']);
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
        $salary=input_data($_POST['salary']);
    }
    if(empty($_POST['gender'])){
        $addressErr="Please select address";
    }else{
        $address=input_data($_POST['gender']);
    }
    if(empty($_POST['addaddress'])){
        $addaddressErr="Please Enter addaddress";
    }else{
        $addaddress=input_data($_POST['addaddress']);
    }
}

function input_data($data){
    $data=trim($data);
    $data = stripslashes($data);  
    $data = htmlspecialchars($data);  
    return $data;  
}
?>
 <!-- Horizontal Form -->
 <div class="content-wrapper">
        <!-- Content Header (Page header) -->
        <section class="content-header">
            <div class="container-fluid">
                <div class="row mb-2">
                <div class="col-sm-6 text-green">
                    <h1>Add Employee</h1>
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
                        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" name="add_name" id="add_name" enctype="multipart/form-data" class="pb-5">
                           <div class="form-group">
                             <label for="">First-name:</label>
                             <input type="text" name="fname" id="" class="form-control" placeholder="Enter first name" aria-describedby="helpId">
                             <small id="helpId" class="error"><?php echo $fnameErr; ?></small>
                           </div> 
                           <div class="form-group">
                             <label for="">Last-name:</label>
                             <input type="text" name="lname" id="" class="form-control" placeholder="Enter last name" aria-describedby="helpId">
                             <small id="helpId" class="error "><?php echo $lnameErr; ?></small>
                           </div>
                           <div class="form-group">
                             <label for="">E-mail:</label>
                             <input type="email" name="email" id="" class="form-control" placeholder="Enter e-mail" aria-describedby="helpId">
                             <small id="helpId" class="error"><?php echo $emailErr; ?></small>
                           </div> 
                           <div class="form-group">
                             <label for="">Phone:</label>
                             <input type="text" name="phone" id="" class="form-control" placeholder="Enter phone no." aria-describedby="helpId">
                             <small id="helpId" class="error"><?php echo $phoneErr;?></small>
                           </div> 
                            
                           <div class="form-inline">
                             <label for="">Address:</label>
                             <input type="radio" name="gender" id="" class="form-inline" placeholder="" value="Permanentaddress">PermanentAddress
                             <input type="radio" name="gender" id="" class="form-inline" placeholder="" value="Persentaddress">PresentAddress
                            </div> 
                            <small id="helpId" class="error"><?php echo $addressErr; ?></small>

                           <div class="form-group mt-3">
                             <label for="">Add-Address:</label>
                             <textarea type="text" name="addaddress" id="" class="form-control" placeholder="Enter full address" aria-describedby="helpId"></textarea>
                             <small id="helpId" class="error"><?php echo $addaddressErr; ?></small>
                           </div> 
                           <div class="form-group">
                             <label for="">Salary:</label>
                             <input type="text" name="salary" id="" class="form-control" placeholder="Enter salary" aria-describedby="helpId">
                             <small id="helpId" class="error"><?php echo $salaryErr; ?></small>
                           </div>
                           <div class="form-group">
                            <label for="">Other Salary: </label>
                           </div>
                           <div class="table-responsive">  
                               <table class="table table-bordered" id="dynamic_field" name="addmore">  
                                    <tr>  
                                         <td><input type="text" name="name[]" placeholder="Income Type" class="form-control name_list" /></td>  
                                         <td><input type="text" name="salary1[]" placeholder="Earning Amount" class="form-control " /></td>  
                                         <td><button type="button" name="add" id="add" class="btn btn-success">Add More</button></td>  
                                    </tr>  
                               </table>  
                          </div>   
                           <button type="submit" name="addemployee" id="addemployee" class="btn btn-primary">Submit</button>
                        </form>
                    </div>
                </div>
            </div>
        </section>
        <?php 
        if(isset($_POST['addemployee'])){
            if($fnameErr=="" && $lnameErr== "" && $emailErr== "" && $phoneErr== "" && $salaryErr== "" && $addressErr== "" && $addaddressErr==""){
                 $sql="insert into employee(fname,lname,email,phone,salary,select_address,address) values('$fname','$lname','$email','$phone','$salary','$address','$addaddress')";
                 $result=mysqli_query($conn,$sql);

                 $last_id= $conn->insert_id;
                 foreach ($_POST['name'] as $key => $value) {
                    $salary=$_POST['salary1'][$key];
                    // echo $salary;echo '<br>';
                    $sql="insert into employee_other_salary(name,other_salary,emp_id) values('$value', $salary,'$last_id')";
                    $smpt=mysqli_query($conn,$sql);
                 }
                 if($result==true){
                    echo "<script>
                            alert('One row added successfully');
                            window.location.href='add_employee.php';
                        </script>";
                 } else{
                    echo "Error" .mysqli_error($conn);
                 }             
            }
        }
        ?>
 </div>
<?php include 'footer.php'; ?>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.6/js/bootstrap.min.js"></script>  
<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.0/jquery.min.js"></script>