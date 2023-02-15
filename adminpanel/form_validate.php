<!doctype html>
<html lang="en">
  <head>
    <title>Validate</title>
    <style>
      .error{
        color:brown;
      }
    </style>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">
  </head>
  <body>
    <?php
    $name="";
    $email="";
    $address="";
    $errname="";
    $erremail="";
    $erraddress="";
    if(isset($_POST['submit'])){
      
      if(empty($_POST['name'])){
        $errname="Please enter name";
      }else{
        $name=$_POST['name'];
      }
      if(empty($_post['email'])){
        $erremail="Please enter email";
      }else{
        $email=$_POST['email'];
      }
      if(empty($_POST['address'])){
        $erraddress="Please enter address";
      }else{
        $address=$_POST['address'];
      }
    } 
    ?>
    <section>
      <div class="container">
        <div class="row">
          <form action="" method="post">
            <div class="form-group">
              <label for="">Name</label>
              <input type="text" name="name" id="" class="form-control" placeholder="" >
              <span class="error"><?php echo $errname;?></span>
            </div>
            <div class="form-group">
              <label for="">Email</label>
              <input type="email" name="email" id="" class="form-control" placeholder="" >
              <span class="error"><?php echo $erremail; ?></span>
            </div>
            <div class="form-group">
              <label for="">Address</label>
              <input type="text" name="address" id="" class="form-control" placeholder="" >
              <span class="error"><?php echo $erraddress;?></span>
            </div>
            <button type="submit" name="submit" class="btn btn-primary">Submit</button>
          </form>
        </div>
      </div>
    </section>  
    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
  </body>
</html>
<?php 
echo $name;
echo "<br>";
echo $email;
echo "<br>";
echo $address;
?>