<!DOCTYPE html>  
<html>  
<head> 
     <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> 
    <style>  
    .error {color: #FF0001;}  
    </style>  
</head>  
<body>    
  
<?php  
$nameErr = $emailErr = $mobilenoErr = $genderErr = $websiteErr =  "";  
$name = $email = $mobileno = $gender = $website =  "";   
//Input fields validation  
if ($_SERVER["REQUEST_METHOD"] == "POST") {  
      
    if (empty($_POST["name"])) {  
         $nameErr = "Name is required";  
    } else {  
        $name = input_data($_POST["name"]);  
            if (!preg_match("/^[a-zA-Z ]*$/",$name)) {  
                $nameErr = "Only alphabets and white space are allowed";  
            }  
    }  
      
    if (empty($_POST["email"])) {  
            $emailErr = "Email is required";  
    } else {  
            $email = input_data($_POST["email"]);  
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {  
                $emailErr = "Invalid email format";  
            }  
     }  
    
    if (empty($_POST["mobileno"])) {  
            $mobilenoErr = "Mobile no is required";  
    } else {  
            $mobileno = input_data($_POST["mobileno"]);  
            if (!preg_match ("/^[0-9]*$/", $mobileno) ) {  
            $mobilenoErr = "Only numeric value is allowed.";  
            }  
        if (strlen ($mobileno) != 10) {  
            $mobilenoErr = "Mobile no must contain 10 digits.";  
            }  
    }  
      
    if (empty($_POST["website"])) {  
        $website = "";  
    } else {  
            $website = input_data($_POST["website"]);  
            if (!preg_match("/\b(?:(?:https?|ftp):\/\/|www\.)[-a-z0-9+&@#\/%?=~_|!:,.;]*[-a-z0-9+&@#\/%=~_|]/i",$website)) {  
                $websiteErr = "Invalid URL";  
            }      
    }  
      
    if (empty ($_POST["gender"])) {  
            $genderErr = "Gender is required";  
    } else {  
            $gender = input_data($_POST["gender"]);  
    }  
}  
function input_data($data) {  
  $data = trim($data);  
  $data = stripslashes($data);  
  $data = htmlspecialchars($data);  
  return $data;  
}  
?>  
<section>
    <div class="container-fluid">
        <div class="col-sm-6">    
        <h2>Registration Form</h2>  
        <span class = "error">* required field </span>  
        
        <form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" >    
        <div class="form-group">
          <label for="">Name:</label>
          <input type="text" name="name" id="" class="form-control" placeholder="" aria-describedby="helpId">
          <span class="error">* <?php echo $nameErr; ?> </span>  
        </div>  
        
       <div class="form-group">
        <label for="my-input">E-mail:</label>
        <input id="my-input" class="form-control" type="text" name="email">
        <span class="error">* <?php echo $emailErr; ?> </span>  
       </div>  
        <div class="form-group">
            <label for="my-input">Mobileno:</label>
            <input id="my-input" class="form-control" type="text" name="mobileno">
            <span class="error">* <?php echo $mobilenoErr; ?> </span>  
        </div> 
         <div class="form-group">
            <label for="">Website: </label>
            <input id="" class="form-control" type="text" name="website">
            <span class="error"><?php echo $websiteErr; ?> </span>  
         </div>  
       <div class="form-check form-check-inline">
        Gender:  
        <input type="radio" name="gender" value="male" class="form-check-input"> Male  
        <input type="radio" name="gender" value="female" class="form-check-input"> Female  
        <input type="radio" name="gender" value="other" class="form-check-input"> Other  
    </div> <br>    
      <span class="error">* <?php echo $genderErr; ?> </span>  <br>
      
        <button type="submit" class="btn btn-primary mt-2" name="submit" value="Submit">Submit</button>                           
    </form>  
        </div>
    </div>
</section>
  
<?php  
    if(isset($_POST['submit'])) {  
    if($nameErr == "" && $emailErr == "" && $mobilenoErr == "" && $genderErr == "" && $websiteErr == "") {   
        echo "<h2>Your Input:</h2>";  
        echo "Name: " .$name;  
        echo "<br>";  
        echo "Email: " .$email;  
        echo "<br>";  
        echo "Mobile No: " .$mobileno;  
        echo "<br>";  
        echo "Website: " .$website;  
        echo "<br>";  
        echo "Gender: " .$gender;  
    } else {  
        echo "<h3> <b>You  are not filling correctly.</b> </h3>";  
    }  
    }  
?>  
  
</body>  
</html>  