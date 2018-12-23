<?php 
require_once '../../Autoloader.php';
require_once '../../Header.php'; //holds the session start 

//https://stackoverflow.com/questions/7352444/how-can-i-render-a-partial-page-on-click-a-html-button
?>
<html>
<head>
<meta charset="UTF-8">
<title>Shopping Cart</title>

<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js"  integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="  crossorigin="anonymous"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
<script type="text/javascript" charset="utf8" src="https://cdn.datatables.net/1.10.19/js/jquery.dataTables.js"></script>

<style type="text/css">
body { 
  background-color: white;
  font-family: 'Vampiro One', cursive;
}
table.darkTable {
  background-color: #4A4A4A;
  width: 100%;
  height: 200px;
  text-align: center;
  border-collapse: collapse;
}
table.darkTable td, table.darkTable th {
  border: 1px solid #4A4A4A;
  padding: 3px 2px;
  color: white;
  font-family: 'Vampiro One', cursive;
}
table.darkTable tbody td {
  font-size: 13px;
  color: black;
  font-family: 'Vampiro One', cursive;
}
table.darkTable thead {
  background: #80ffbf;
  border-bottom: 3px solid #000000;
}
table.darkTable thead th {
  font-size: 15px;
  font-weight: bold;
  color: black;
  text-align: center;
  border-left: 2px solid #4A4A4A;
}
h2, h3 { 
    font-family: 'Vampiro One', cursive;
    color:#80ffbf;
}
.end{ 
    position:absolute; 
    right:10; 
}
* {
  box-sizing: border-box;
}

.row {
  display: -ms-flexbox; /* IE10 */
  display: flex;
  -ms-flex-wrap: wrap; /* IE10 */
  flex-wrap: wrap;
  margin: 0 -16px;
}

.col-25 {
  -ms-flex: 25%; /* IE10 */
  flex: 25%;
}

.col-50 {
  -ms-flex: 50%; /* IE10 */
  flex: 50%;
}

.col-75 {
  -ms-flex: 75%; /* IE10 */
  flex: 75%;
}

.col-25,
.col-50,
.col-75 {
  padding: 0 16px;
}

.container {
  background-color: #f2f2f2;
  padding: 5px 20px 15px 20px;
  border: 1px solid lightgrey;
  border-radius: 3px;
}

.row input[type=text] {
  width: 100%;
  margin-bottom: 20px;
  padding: 12px;
  border: 1px solid #ccc;
  border-radius: 3px;
}

label {
  margin-bottom: 10px;
  display: block;
}

.icon-container {
  margin-bottom: 20px;
  padding: 7px 0;
  font-size: 24px;
}

.btn {
  background-color: #161616;
  color: white;
  border: none;
  cursor: pointer;
}
.row input[type=submit] {
    width: 100%; 
}
.btn:hover {
  background-color: #4A4A4A;
}

a {
  color: #2196F3;
}

hr {
  border: 1px solid lightgrey;
}

span.price {
  float: right;
  color: grey;
}

/* Responsive layout - when the screen is less than 800px wide, make the two columns stack on top of each other instead of next to each other (also change the direction - make the "cart" column go on top) */
@media (max-width: 800px) {
  .row {
    flex-direction: column-reverse;
  }
  .col-25 {
    margin-bottom: 20px;
  }
  
}
</style>
</head>
<br><br><br>
<?php

$productBS = new ProductBusinessService(); 
$userBS = new UserBusinessService(); 

if (isset($_SESSION['cart'])) {
    $c = $_SESSION['cart'];
}
else { 
    echo "Nothing is in your cart yet! <br>"; 
    exit;
}

if (isset($_SESSION['ID'])) {
    $userid = $_SESSION['ID'];
} 
else{ 
    echo "Please login first!<br>"; 
    exit;
}

//check if cart belongs to the user logged in 
if (!$c->getUserid()==$userid){ 
    echo "Oops! This cart doesn't seem to belong to you. Please login again!<br>"; 
    exit; 
}

//get the user info
$user = $userBS->findByID($userid); 

//set locale for US
setlocale(LC_MONETARY, 'en_US.UTF-8'); 

//display the cart as a table 
echo "<h2>Shopping Cart</h2>"; 
echo "User: " . $user->getFirstname(); 

echo "<table id = products class = 'darkTable table-hover'>";

    echo "<thead>"; 
    
        echo "<th>ID</th>";
        echo "<th>Product Name </th>";
        echo "<th>Description</th>";
        echo "<th>Photo</th>";
        echo "<th>Quantity </th>";
        echo "<th>Price</th>";
        echo "<th>Subtotal</th>"; 
        echo "<th>Remove from cart?</th>"; 
        
    echo "</thead>"; 

//print each row from the cart 
foreach($c->getItems() as $prod_id =>$qty) { 
    $product = $productBS->findByID($prod_id); 
    echo "<tr>";
    echo "<td>" . $product->getProduct_id(). "</td>"; 
    echo "<td>" . $product->getProduct_name(). "</td>";
    echo "<td>" . $product->getDescription(). "</td>";
    echo "<td>"; ?>
    <!--Carousel Wrapper-->
                    <div id="carousel-example-2-<?php echo $product->getProduct_id()?>" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
                      <!--Indicators-->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-2-<?php echo $product->getProduct_id()?>" data-slide-to="0" class="active"></li>
                        
                        <?php if (!$product->getPhoto2() == null) {?>
                        <li data-target="#carousel-example-2-<?php echo $product->getProduct_id()?>" data-slide-to="1"></li>
                        <?php }?>
                        
                        	<?php if (!$product->getPhoto3() == null) {?>
                        <li data-target="#carousel-example-2-<?php echo $product->getProduct_id()?>" data-slide-to="2"></li>
                        <?php }?>
                        
                      </ol>
                      <!--/.Indicators-->
                      <!--Slides-->
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <div class="view">
            					<img class="card-img-top" src="/eCommerceApp/ProductPhotos/<?php echo $product->getPhoto1()?>" alt="Card image cap">
                            <div class="mask rgba-black-light"></div>
                          </div>
                        </div>
                        
                        <?php if (!$product->getPhoto2() == null) {?>
                        <div class="carousel-item">
                          <!--Mask color-->
                          <div class="view">
            					<img class="card-img-top" src="/eCommerceApp/ProductPhotos/<?php echo $product->getPhoto2()?>" alt="Card image cap">
                            <div class="mask rgba-black-light"></div>
                          </div>
                        </div>
						<?php }?>
						
						<?php if (!$product->getPhoto3() == null) {?>
                        <div class="carousel-item">
                          <!--Mask color-->
                          <div class="view">
            					<img class="card-img-top" src="/eCommerceApp/ProductPhotos/<?php echo $product->getPhoto3()?>" alt="Card image cap">
                            <div class="mask rgba-black-light"></div>
                          </div>
                        </div>
                        <?php }?>
                        
                      </div>
                      
                      <!--/.Slides-->
                      <!--Controls-->
                      <a class="carousel-control-prev" href="#carousel-example-2-<?php echo $product->getProduct_id()?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-example-2-<?php echo $product->getProduct_id()?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      <!--/.Controls-->
                    </div>
                    <!--/.Carousel Wrapper-->
<?php echo "</td>";
   
    echo "<td>"; 
    
    echo "<form action='/eCommerceApp/Presentation/Process/processCartUpdateQty.php' method = 'GET'>";
    echo "<input type='hidden' name='id' value='".$product->getProduct_id(). "'>";
    echo "<span class = 'input-group-text'>"; 
    echo "<input class='form-control' size='10' type = 'text' name ='qty' value ='".$qty."'>";
    echo "<input class='btn btn-secondary' type = 'submit' name ='submit' value='update'>";
    echo "</span>";
    echo "</form>";
    echo "</td>";
    
    echo "<td>" . money_format('%.2n',$product->getPrice()). "</td>";
    echo "<td>" . money_format('%.2n',$qty * $product->getPrice()). "</td>";
    
    
    //include buttons for delete 
    echo "<td><form action = '/eCommerceApp/Presentation/Process/processCartDelete.php' method = 'GET'><input type = 'hidden' name = 'id' value = '".$product->getProduct_id()."'><input class = 'btn' type = 'submit' value = 'Remove'></form> </td>";
    
    echo "</tr>";  
}
echo "</table><br><br>"; 

echo "<div class='end'>";
echo "<h3>Total Cost: "; 
echo  money_format('%.2n',$c->getTotal_price());
echo "</h3>"; 

echo "<a class='btn btn-light btn-lg' href = '/eCommerceApp/Presentation/Show/showAllProducts.php'>Continue Shopping</a>";
echo "<button class='btn btn-light btn-lg' id='show-partial'>Checkout</button><br><br>";

echo "</div>";

echo "<br><br><br>";
echo "<br><br><br>";

?>

<div style="display:none; " id="partial">
<h2>Checkout</h2>
    <div class="row">
      <div class="col-75">
        <div class="container">
          <form action="/eCommerceApp/Presentation/Process/processCheckout.php">
          
            <div class="row">
              <div class="col-50">
                <h3>Billing Address</h3>
                <label for="fname"><i class="fa fa-user"></i> Full Name</label>
                <input type="text" id="fname" name="firstname" placeholder="John M. Doe" required>
                <label for="email"><i class="fa fa-envelope"></i> Email</label>
                <input type="text" id="email" name="email" placeholder="john@example.com" required>
                <label for="adr"><i class="fa fa-address-card-o"></i> Address</label>
                <input type="text" id="adr" name="address" placeholder="542 W. 15th Street" required>
                <label for="city"><i class="fa fa-institution"></i> City</label>
                <input type="text" id="city" name="city" placeholder="New York" required>
    
                <div class="row">
                  <div class="col-50">
                    <label for="state">State</label>
                    <input type="text" id="state" name="state" placeholder="NY" required>
                  </div>
                  <div class="col-50">
                    <label for="zip">Zip</label>
                    <input type="text" id="zip" name="zip" placeholder="10001" required>
                  </div>
                </div>
              </div>
    
              <div class="col-50">
                <h3>Payment</h3>
                <label for="fname">Accepted Cards</label>
                <div class="icon-container">
                  <i class="fa fa-cc-visa" style="color:navy;"></i>
                  <i class="fa fa-cc-amex" style="color:blue;"></i>
                  <i class="fa fa-cc-mastercard" style="color:red;"></i>
                  <i class="fa fa-cc-discover" style="color:orange;"></i>
                </div>
                <label for="cname">Name on Card</label>
                <input type="text" id="cname" name="cardname" placeholder="John More Doe" required>
                <label for="ccnum">Credit card number</label>
                <input type="text" id="ccnum" name="cardnumber" placeholder="1111-2222-3333-4444" required>
                <label for="expmonth">Exp Month</label>
                <input type="text" id="expmonth" name="expmonth" placeholder="September" required>
                <div class="row">
                  <div class="col-50">
                    <label for="expyear">Exp Year</label>
                    <input type="text" id="expyear" name="expyear" placeholder="2018" required>
                  </div>
                  <div class="col-50">
                    <label for="cvv">CVV</label>
                    <input type="text" id="cvv" name="cvv" placeholder="352" required>
                  </div>
                </div>
              </div>
              
            </div>
            <label>
              <input type="checkbox" checked="checked" name="sameadr"> Shipping address same as billing
            </label>
            <a class = "btn btn-light btn-lg" href = "/eCommerceApp/Presentation/Show/showCart.php">Cancel</a>
            <button class = "btn btn-light btn-lg" type="submit">Continue to checkout</button>
          </form>
        </div>
      </div>
      <div class="col-25">
        <div class="container">
          <h2>Shopping Cart <span class="price" style="color:black"><i class="fa fa-shopping-cart"></i></span></h2>
          <?php 
          foreach($c->getItems() as $prod_id =>$qty) {
              $product = $productBS->findByID($prod_id); 
              echo "<p>".$product->getProduct_name()."<br>". $qty." x ". $product->getPrice() ."<span class='price'>".$qty * $product->getPrice()."</span></p>"; 
          }
          
          echo "<hr>"; 
          echo "<p>Total <span class='price' style='color:black'><b>".$c->getTotal_price()."</b></span></p>";
          ?>
        </div>
        <?php 
        echo "<br>"; 
        /* 
         * <div class="col-15">
        <div class="container">
          <h2>Coupon/Discount Code:<span class="price" style="color:black"></span></h2>
           <input type="text" id="coupon" name="coupon" placeholder ="lol doesn't work yet">
           <input type="submit" value="Add Discount" class="btn">
        </div>
         */
        ?>
        
      </div>
    </div>
</div>

<script type="text/javascript">
$(document).ready( function () {
    $('#products').DataTable();
} );

$('#show-partial').click(function(){
    $('#partial').show();
});
</script>
</body>
</html>