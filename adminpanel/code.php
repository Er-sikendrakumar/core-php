
<?php 
$conn=mysqli_connect("localhost","root","","corephp");
// if($conn){
//     echo "Connection successful";
// }else{
//     echo "Error" .mysqli_connect_error();
// }

// Home page inserted
// if(isset($_POST['homepage']))
// {
//     $file_name=$_FILES['file']['name'];
//     $file_type=$_FILES['file']['type'];
//     $file_size=$_FILES['file']['size'];
//     $file_tem_loc=$_FILES['file']['tmp_name'];
//     $file_store="uploads/".$file_name;
//     move_uploaded_file($file_tem_loc,$file_store);
//     $content=$_POST['content'];

//     $file2_name=$_FILES['file2']['name'];
//     $file2_type=$_FILES['file2']['type'];
//     $file2_size=$_FILES['file2']['size'];
//     $file2_tem_loc=$_FILES['file2']['tmp_name'];
//     $file2_store="uploads/".$file2_name;
//     move_uploaded_file($file2_tem_loc,$file2_store);
//     $homesql="insert into home_page(slider_img,content,image) values('$file_store','$content','$file2_store')";
//     $homedata=mysqli_query($conn,$homesql);
//     if($homedata==true)
//     {
//         echo "<script>
//                 alert('Home image added successfully');
//                 window.location.href='home.php';
//             </script>"; 
//     }
//     else{
//     echo "Error". mysqli_error($conn);
//      }
// }

//About page 
// if(isset($_POST['aboutpage']))
// {
//     $title = $_POST['title'];
//     $description = $_POST['description'];
//     $shortdes = $_POST['shortdes'];
//     $file_name=$_FILES['file']['name'];
//     $file_type=$_FILES['file']['type'];
//     $file_size=$_FILES['file']['size'];
//     $file_tem_loc=$_FILES['file']['tmp_name'];
//     $file_store="uploads/".$file_name;
//     move_uploaded_file($file_tem_loc,$file_store);
//     $aboutsql = "insert into about_page(title,description,short_des,image) values('$title','$description','$shortdes','$file_store')";
//     $aboutdata = mysqli_query($conn,$aboutsql);
//     if($aboutdata==true)
//     {
//         echo "<script>
//             alert('One row added successfully');
//             window.location.href='about.php';
//             </script>";
//     }else{
//         echo "Error". mysqli_error($conn);
//     }
// }

//contact us page insert
// if(isset($_POST['contactus']))
// {
//     $email = $_POST['email'];
//     $phone = $_POST['phone'];
//     $address = $_POST['address'];
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

// Category inserted
// if(isset($_POST['categorypag']))
// {
//     $category = $_POST['category'];
//     $description = $_POST['description'];
//     $dquery = mysqli_query($conn,"select * from category where cat_name='$category'" );
//     if(mysqli_num_rows($dquery)>0){      
//         echo "<script>
//         alert('Ctaegory Name already exists');
//         window.location.href='category.php';
//     </script>";
//     } else {
//         $catsql = "insert into category(cat_name,description) values('$category','$description')";
//         $catdata = mysqli_query($conn, $catsql);
//         if ($catdata == true) {
//             echo " <script>
//             alert('One category added successfully');
//             window.location.href='category.php';
//             </script>";
//         } else {
//             echo "Error" . mysqli_error($conn);
//         }
//     }
// }

// Delete Category
if(isset($_GET['deleteid'])){
    $id = $_GET['deleteid'];
    $delsql = "delete  from category where id=$id";
    $delresult = mysqli_query($conn, $delsql);
    if($delresult==true){
        echo "<script>
            alert('One data deleted successfully');
            window.location.href='list_category.php';
        </script>";
    }else{
        echo "Error" . mysqli_error($conn);
    }
}

// Category Updated
if(isset($_POST['cat_update']))
{
    $cid = $_POST['cid'];
    $category = $_POST['category'];
    $description = $_POST['description'];
    $catsql = "update category set cat_name='$category',description='$description' where id=$cid";
    $catdata = mysqli_query($conn, $catsql);
    if($catdata==true){
        echo " <script>
            alert('One category updated successfully');
            window.location.href='list_category.php';
            </script>";
    }else{
        echo "Error" . mysqli_error($conn);
    }
}

// Post multiple category
// if(isset($_POST['multi_cat_select']))
// {
//     $title = $_POST['title'];
//     $multicat = $_POST['multiselect'];
//     $cont = $_POST['content'];
//     $file_name=$_FILES['file']['name'];
//     $file_type=$_FILES['file']['type'];
//     $file_size=$_FILES['file']['size'];
//     $file_tem_loc=$_FILES['file']['tmp_name'];
//     $file_store="uploads/".$file_name;
//     move_uploaded_file($file_tem_loc,$file_store);    
//         // echo $item . "<br>";
//         $postsql = "insert into post(title,content,image) values('$title','$cont','$file_store')";
//         $presult = mysqli_query($conn, $postsql);
//         $post_id = $conn->insert_id;
//         foreach ($multicat as $item) {
//         $sql1 = "insert into post_category(post_id,category_id) values('$post_id','$item')";
//         $res1 = mysqli_query($conn, $sql1);
//         }
//         if($presult==true){           
//             echo "<script>
//                 alert('Post added successfully');
//                 window.location.href='post.php';
//                 </script>";
//         }else{
//             echo "Error" . mysqli_error($conn);
//         }
// }

// Delete post name
if(isset($_GET['postdeleteid'])){
    $id = $_GET['postdeleteid'];
    $delsql = "delete   from post where id=$id";
    $delresult = mysqli_query($conn, $delsql);
    $categsql1 = "delete  from post_category where post_id=$id";
    $categres = mysqli_query($conn, $categsql1);
    if($delresult==true){
        echo "<script>
            alert('One data deleted successfully');
            window.location.href='list_postassign.php';
        </script>";
    }else{
        echo "Error" . mysqli_error($conn);
    }
}

//Update post
 if(isset($_POST['postupdate'])){
    $id = $_POST['pid'];
    $title = $_POST['title'];
    $multicat = $_POST['multiselect'];
    $cont = $_POST['content'];
    $file_name=$_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
    $file_size=$_FILES['file']['size'];
    $file_tem_loc=$_FILES['file']['tmp_name'];
    $file_store="uploads/".$file_name;
    move_uploaded_file($file_tem_loc,$file_store);
    $updsql = "update post set title='$title',content='$cont',image='$file_store' where id='$id'";
    $updres = mysqli_query($conn, $updsql); 
    // $sqlpost = "update post_category  set post_id='$id'";
    // $respost = mysqli_query($conn, $sqlpost);
    if($updres==true){
        echo " <script>
            alert('One updated successfully');
            window.location.href='list_postassign.php';
            </script>";       
    }else{
        echo "Error" . mysqli_error($conn);
    }
}
?>

