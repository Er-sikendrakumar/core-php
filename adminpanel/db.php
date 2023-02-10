<?php 
$conn=mysqli_connect("localhost","root","","corephp");
session_start();
if($conn){
    echo "Connection successful";
}else{
    echo "Error" .mysqli_connect_error();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $action = $_POST['action'];
    switch ($action) {
        case 'Login': adminLogin($conn);
            break;
        default:
            header("Location: http://localhost/core-php/adminpanel/");
            break;
    }
}else{
    $action = $_GET['action'];
    switch ($action) {
        case 'logout':logOut();
            break;
        
        default: 
            header("Location: http://localhost/core-php/adminpanel/");
            break;
    }
}
function adminLogin($conn)
{
    $eml = $_POST['username'];
    $pwd = $_POST['password'];
    $qry = "select * from users where email='$eml' and password='$pwd'";
    $data = mysqli_query($conn,$qry);
    $data = mysqli_fetch_assoc($data);
    $_SESSION['useremail'] = $data['email'];
    $_SESSION['username'] = $data['name'];
    header("Location: home.php");
}
function logOut()
{
    unset( $_SESSION['useremail']);
    unset( $_SESSION['username']);
    session_destroy();
    header("Location: http://localhost/core-php/adminpanel/");
    
}

if(isset($_POST['register'])){
    $name = $_POST['username'];
    $emil = $_POST['useremail'];
    $pwd = $_POST['password'];
    $sql = "insert into users(name,email,password) values('$name','$emil','$pwd')";
    $result = mysqli_query($conn, $sql);
    if($result==true){
        echo "<script>
            alert('Register success');
            window.location.href='sigin.php';
        </script>";
    }else{
        echo "Error" . mysqli_error($conn);
    }
}
?>