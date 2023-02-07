
<?php 
$conn=mysqli_connect("localhost","root","","ecommerce");
if(isset($_POST['addcategory'])){
    $catname=$_POST['cat_name'];
    $file_name=$_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
    $file_size=$_FILES['file']['size'];
    $file_tem_loc=$_FILES['file']['tmp_name'];
    $file_store="uploads/".$file_name;
    move_uploaded_file($file_tem_loc,$file_store);
    $catseo=$_POST['cat_seo_name'];
    $catsql="insert into category(cat_name,cat_image,cat_seo_name) values('$catname','$file_store','$catseo')";
    $catdata=mysqli_query($conn,$catsql);
    if($catdata==true)

    {
        echo "<script>
                alert('Category added successfully');
                window.location.href='addcategory.php';
            </script>"; 
    }

else{
    echo "Error". mysqli_error($conn);
     }
}
// Add product query start here-------

if(isset($_POST['addproduct'])){
    $productname=$_POST['product_name'];
    $seoname=$_POST['seo_name'];
    $categoryid=$_POST['category_id'];
    $productcode=$_POST['product_code'];
    $productprice=$_POST['product_price'];

    $productimage=$_FILES['file']['name'];
    $file_type=$_FILES['file']['type'];
    $file_size=$_FILES['file']['size'];
    $file_tem_loc=$_FILES['file']['tmp_name'];
    $file_store="uploads/".$productimage;
    move_uploaded_file($file_tem_loc,$file_store);
    $productweight=$_POST['product_weight'];
    $productsql=" insert into product(product_name,seo_name,category_id,product_code, product_price,product_image,product_weight)
     values('$productname','$seoname','$categoryid','$productcode','$productprice','$file_store','$productweight')";
     $result=mysqli_query($conn,$productsql);
     //var_dump($result);
     if($result==true)
     {
        echo 
        "<script>
            alert('Product added successfully');
            window.location.href='addproduct.php';
        </script>"; 
 
     }
     else{
        echo "Error". mysqli_error($conn);
         }
    
}
?>