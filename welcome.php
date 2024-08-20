<!DOCTYPE html>
<html>
<head>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<link rel="stylesheet" href="css/welcome.css">
<title>Welcome to Treasure of Maker</title>
</head>
<body>
    <div class="topnav">
  <!-- <a href="products.php">Products</a> -->
  <a href="cart.php">Cart</a>
  <div class="search-container" >
  <form action="" method="post" enctype="multipart/form-data">
    <!-- <form action="products.php"> -->
      <input type="text" placeholder="Search.." name="search">
      <button type="submit"><i class="fa fa-search"></i></button>
    </form>
</div>
</div>
<?php

@include 'config.php';

if(isset($_POST['add_to_cart'])){

   $product_name = $_POST['product_name'];
   $product_price = $_POST['product_price'];
   $product_image = $_POST['product_image'];
   $product_quantity = 1;

   $select_cart = mysqli_query($conn, "SELECT * FROM `cart` WHERE name = '$product_name'");

   if(mysqli_num_rows($select_cart) > 0){
      $message[] = 'product already added to cart';
   }else{
      $insert_product = mysqli_query($conn, "INSERT INTO `cart`(name, price, image, quantity) VALUES('$product_name', '$product_price', '$product_image', '$product_quantity')");
      $message[] = 'product added to cart successfully';
   }

}

?>

<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="UTF-8">
   <meta http-equiv="X-UA-Compatible" content="IE=edge">
   <meta name="viewport" content="width=device-width, initial-scale=1.0">
   <title>products</title>

   <!-- font awesome cdn link  -->
   <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css">

   <!-- custom css file link  -->
   <link rel="stylesheet" href="css/style.css">
</head>
<body>
   
<?php

if(isset($message)){
   foreach($message as $message){
      echo '<div class="message"><span>'.$message.'</span> <i class="fas fa-times" onclick="this.parentElement.style.display = `none`;"></i> </div>';
   };
};

?>


<div class="container">

<section class="products">

   <h1 class="heading">latest products</h1>

   <div class="box-container">

      <?php
      
      $select_products = mysqli_query($conn, "SELECT * FROM `products`");
      if(mysqli_num_rows($select_products) > 0){
         while($fetch_product = mysqli_fetch_assoc($select_products)){
      ?>

      <form action="" method="post">
         <div class="box">
            <img src="uploaded_img/<?php echo $fetch_product['image']; ?>" alt="">
            <h3><?php echo $fetch_product['name']; ?></h3>
            <div class="price">Rs <?php echo $fetch_product['price']; ?>/-</div>
            <input type="hidden" name="product_name" value="<?php echo $fetch_product['name']; ?>">
            <input type="hidden" name="product_price" value="<?php echo $fetch_product['price']; ?>">
            <input type="hidden" name="product_image" value="<?php echo $fetch_product['image']; ?>">
            <input type="submit" class="btn" value="add to cart" name="add_to_cart">
         </div>
      </form>

      <?php
         };
      };
      ?>

   </div>
</section>

</div>

<!-- custom js file link  -->
<script src="js/script.js"></script>

</body>
</html>


<!-- <div class="slider-box">
        <div id="slider">
            <img src="img/bg5.jpg" width="800 px" height="900 px">
            <img src="img/bg2.jpg" width="800 px" height="900 px">
            <img src="img/elastic.jpg" width="800 px" height="1000 px">
            <img src="img/bg4.jpg" width="800 px" height="900 px">
        </div>
        <div class="indicators">
            <span id="btn1" class="active"></span>
            <span id="btn2"></span>
            <span id="btn3"></span>
            <span id="btn4"></span>
        </div>
    </div>
<script>

        var slide = document.getElementById("slider");
        var btn1 = document.getElementById('btn1');
        var btn2 = document.getElementById('btn2');
        var btn3 = document.getElementById('btn3');
        var btn4 = document.getElementById('btn4');

        btn1.onclick = function () {
            slide.style.transform = "translateX(0px)";
            btn1.classList.add('active');
            btn2.classList.remove('active');
            btn3.classList.remove('active');
            btn4.classList.remove('active');
        };
        btn2.onclick = function () {
            slide.style.transform = "translateX(-100%)";
            btn1.classList.remove('active');
            btn2.classList.add('active');
            btn3.classList.remove('active');
            btn4.classList.remove('active');
        };
        btn3.onclick = function () {
            slide.style.transform = "translateX(-200%)";
            btn1.classList.remove('active');
            btn2.classList.remove('active');
            btn3.classList.add('active');
            btn4.classList.remove('active');
        };
        btn4.onclick = function () {
            slide.style.transform = "translateX(-300%)";
            btn1.classList.remove('active');
            btn2.classList.remove('active');
            btn3.classList.remove('active');
            btn4.classList.add('active');
        };

    </script> -->

 



<?php 
    $con = mysqli_connect("localhost","root","","craft");

    if(isset($_GET['search']))
     {
        $filtervalues = $_GET['search'];
        $query = "SELECT * FROM products WHERE CONCAT(name,price,image) LIKE '%$filtervalues%' ";
        $query_run = mysqli_query($con, $query);

        if(mysqli_num_rows($query_run) > 0)
          {
            foreach($query_run as $items)
            {
             ?>
             <table>
             <tr>
                <td><?= $items['id']; ?></td>
                <td><?= $items['name']; ?></td>
                <td><?= $items['price']; ?></td>
                <td><?= $items['image']; ?></td>
            </tr>
            </table>
            <?php
            }
         }
          else
          {
            ?>
            <table>
              <tr>
                <td colspan="4">No Record Found</td>
              </tr>
          </table>
            <?php
            }
          }
            ?>

   
    
</body>
</html>




<!-- <?php

$con = new PDO("mysql:host=localhost;dbname=craft",'root','');

if (isset($_POST["submit"])) {
	$str = $_POST["search"];
	$sth = $con->prepare("SELECT * FROM `search` WHERE Name = '$str'");

	$sth->setFetchMode(PDO:: FETCH_OBJ);
	$sth -> execute();

	if($row = $sth->fetch())
	{
		?>
		<br><br><br>
		<table>
			<tr>
                <th>Product Image</th>
				<th>Product Name</th>
				<th>Product Price</th>
			</tr>
			<tr>
                <td><?php echo $row->image;?></td>
				<td><?php echo $row->name; ?></td>
				<td><?php echo $row->price;?></td>
			</tr>

		</table>
<?php 
	}
		
		
		else{
			echo "Name Does not exist";
		}


}

?> -->










<!-- <?php
@include 'config.php'; 
$search = $_GET['search'];
$search = $mysqli -> real_escape_string($search);

//$query = "SELECT username FROM member WHERE username LIKE '%".$search."%'";
$query = "SELECT product_name FROM products WHERE product_name LIKE '%".$search."%'";
$result= $mysqli -> query($query);

while($row = $result -> fetch_object()){
    echo "<div id='link' onClick='addText(\"".$row -> username."\");'>" . $row -> username . "</div>";  
}
?> -->

