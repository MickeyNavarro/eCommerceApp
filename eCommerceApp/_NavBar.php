<?php 
//https://bootsnipp.com/snippets/featured/bootstrap-4-navbar-with-icon-top
?>
<link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css" integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
<script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.3/umd/popper.min.js" integrity="sha384-ZMP7rVo3mIykV+2+9J3UJ46jBk0WLaUAdn689aCwoqbBJiSnjAK/l8WvCWPIPm49" crossorigin="anonymous"></script>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/js/bootstrap.min.js" integrity="sha384-ChfqqxuZUCnJSK3+MXmPNIyE6ZbWh2IMqE241rYiqJxyMiZ6OW/JmZQ5stwEULTy" crossorigin="anonymous"></script>

<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">

<nav class="navbar fixed-top navbar-expand-lg navbar-dark" style="background-color: #232222;font-family: 'Vampiro One', cursive;">
  <a class="navbar-brand" href="#">Luminous Lights</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
    
    	  <!--HOME-->	
      <li class="nav-item">
      <a class="nav-link" href="/eCommerceApp/Presentation/Show/showHome.php">
      	<i class = "fa fa-home fa-lg"></i>
      </a>
      </li>
      
      <!--CART-->
      <li class="nav-item">
        <a class="nav-link" href="/eCommerceApp/Presentation/Show/showCart.php">
          <i class="fa fa-shopping-cart">
            <span class="badge badge-danger"> 
            <?php 
            if (isset($_SESSION['cart'])) {
                $cq = 0; 
                foreach($_SESSION['cart']->getItems() as $ci) { 
                    $cq++; 
                }
                echo $cq; 
            }
            else { 
                echo "0"; 
            }
            ?>
            </span>
          </i>
        </a>
      </li>
      
      <!--SEARCH-->
      <li class="nav-item">
          <a class="nav-link" href="/eCommerceApp/Presentation/Show/showSearchPage.php">
              <i class = "fa fa-search">		
              </i>
          </a>     	
      </li>
      
      <!--USER - ADMIN PAGES - ACCOUNT INFO - LOGOUT-->
      <li class="nav-item dropdown">
      	<a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
        <i class = "fa fa-user">	
        <?php 
        if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {  
            echo $_SESSION['USERNAME'];
        }
        ?></i></a>
        <?php 
        if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) {
        ?>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Account Info</a>
          <a class="dropdown-item" href="#">Order History</a>
		
		<?php 
        } 
        else {
        ?> 
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="/eCommerceApp/Presentation/Show/showHome.php">Please login or register</a>
        <?php        
        }
		if (isset($_SESSION['ROLE'])) { 
		    if ($_SESSION['ROLE'] == '1'){

    		  echo "<div class='dropdown-divider'></div>";
              echo "<a class='dropdown-item' href='/eCommerceApp/Presentation/Show/showUserAdmin.php'>User(s)</a>";
              echo "<a class='dropdown-item' href='/eCommerceApp/Presentation/Show/showProductAdmin.php'>Products(s)</a>";
              
    		 echo "<div class='dropdown-divider'></div>";
              echo "<a class='dropdown-item' href='/eCommerceApp/Presentation/Show/showProductAdd.php'>Add New Product</a>";
              
              echo "<div class='dropdown-divider'></div>";
              echo "<a class='dropdown-item' href='/eCommerceApp/Presentation/Show/showOrdersReportsCreator.php'>Report(s)</a>";
          }
		}
      if (isset($_SESSION['ID']) && isset($_SESSION['USERNAME'])) { 
      	  echo "<div class='dropdown-divider'></div>"; 
          echo "<a class='dropdown-item'  href='/eCommerceApp/Presentation/Process/processLogout.php'>Logout</a>";
      }
       echo "</div>";
      echo "</li>";
    echo "</ul>";
    //echo "<!--PRODUCT QUICK SEARCH-->";
    //echo "<form class='form-inline my-2 my-lg-0' action='/eCommerceApp/Presentation/Process/processProductSearch.php' method='POST'>";
    //echo "<input class='form-control mr-sm-2' type ='search' name='productSearch' placeholder='Search for a product' aria-label='Search' required>";
    //echo "<button class='btn btn-outline  my-2 my-sm-0'  type='submit' style = 'background-color: #80ffbf'></button>";
    //echo "<button class='btn btn-outline btn-light my-2 my-sm-0' type='submit' style = 'background-color: #80ffbf'><span class = 'fa fa-search'></span></button>";
    //echo"</form>";
  echo "</div>"; 
echo "</nav>";