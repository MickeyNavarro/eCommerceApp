<?php
//displays results using bootstrap cards


//BORDER CSS:
//https://stackoverflow.com/questions/5670879/css-html-create-a-glowing-border-around-an-input-field

//CAROUSEL CSS: 
//https://mdbootstrap.com/plugins/jquery/gallery/
?>
<html>
<head>
<meta charset="UTF-8">
<title>Search Results</title>

<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<style type="text/css">
body { 
  background-color: white;
  font-family: 'Vampiro One', cursive;
  
}
h2 { 
    font-family: 'Vampiro One', cursive;
    color:#80ffbf;
}
h3 { 
    font-family: 'Vampiro One', cursive;
    color:black;
}
.btn {
  background-color: #80ffbf;
  color: white;
  border: none;
  cursor: pointer;
}
</style>
</head>
<br><br><br>
<h2>Search Results</h2>
<body>
<div class = "card-deck">
<?php 
//loop to find each product that fits the criteria
for ($x = 0; $x < count($products); $x++) {
?>
    <div class = "col-12 col-sm-6 col-md-4 col-lg-3">
            	<div class="card text-white bg-dark mb-3" style="max-width: 18rem;">
                    <!--Carousel Wrapper-->
                    <div id="carousel-example-2-<?php echo $products[$x]['ID']?>" class="carousel slide carousel-fade z-depth-1-half" data-ride="carousel">
                      <!--Indicators-->
                      <ol class="carousel-indicators">
                        <li data-target="#carousel-example-2-<?php echo $products[$x]['ID']?>" data-slide-to="0" class="active"></li>
                        
                        <?php if (!$products[$x]['PHOTO2'] == null) {?>
                        <li data-target="#carousel-example-2-<?php echo $products[$x]['ID']?>" data-slide-to="1"></li>
                        <?php }?>
                        
                        	<?php if (!$products[$x]['PHOTO3'] == null) {?>
                        <li data-target="#carousel-example-2-<?php echo $products[$x]['ID']?>" data-slide-to="2"></li>
                        <?php }?>
                        
                      </ol>
                      <!--/.Indicators-->
                      <!--Slides-->
                      <div class="carousel-inner" role="listbox">
                        <div class="carousel-item active">
                          <div class="view">
            					<img class="card-img-top" src="/eCommerceApp/ProductPhotos/<?php echo $products[$x]['PHOTO1']?>" alt="Card image cap">
                            <div class="mask rgba-black-light"></div>
                          </div>
                        </div>
                        
                        <?php if (!$products[$x]['PHOTO2'] == null) {?>
                        <div class="carousel-item">
                          <!--Mask color-->
                          <div class="view">
            					<img class="card-img-top" src="/eCommerceApp/ProductPhotos/<?php echo $products[$x]['PHOTO2']?>" alt="Card image cap">
                            <div class="mask rgba-black-light"></div>
                          </div>
                        </div>
						<?php }?>
						
						<?php if (!$products[$x]['PHOTO3'] == null) {?>
                        <div class="carousel-item">
                          <!--Mask color-->
                          <div class="view">
            					<img class="card-img-top" src="/eCommerceApp/ProductPhotos/<?php echo $products[$x]['PHOTO3']?>" alt="Card image cap">
                            <div class="mask rgba-black-light"></div>
                          </div>
                        </div>
                        <?php }?>
                        
                      </div>
                      
                      <!--/.Slides-->
                      <!--Controls-->
                      <a class="carousel-control-prev" href="#carousel-example-2-<?php echo $products[$x]['ID']?>" role="button" data-slide="prev">
                        <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                        <span class="sr-only">Previous</span>
                      </a>
                      <a class="carousel-control-next" href="#carousel-example-2-<?php echo $products[$x]['ID']?>" role="button" data-slide="next">
                        <span class="carousel-control-next-icon" aria-hidden="true"></span>
                        <span class="sr-only">Next</span>
                      </a>
                      <!--/.Controls-->
                    </div>
                    <!--/.Carousel Wrapper-->
            	
            	
            		<div class="card-body">
            			<h3 class="card-title"><?php echo $products[$x]['PRODUCT_NAME'];?></h3>
            			<p class="card-text"><?php echo $products[$x]['DESCRIPTION']; ?></p>
            			<p class="card-text">QUANTITY: <?php echo $products[$x]['QUANTITY']; ?></p>
            			<?php 
            			//sets the locale info
            			setlocale(LC_MONETARY, 'en_US.UTF-8')?>
            			<p class = "card-text"><?php echo money_format("%.2n", $products[$x]['PRICE']);?></p>
            			
            			<form action ="/eCommerceApp/Presentation/Process/processCartAdd.php" method = "GET"> 
            				<input type = "hidden" name = "prod_id" value = "<?php echo $products[$x]['ID']?>">
            				<input class="btn btn-light btn-lg" type = "submit" value = "Add to cart">
            			</form>
              		</div>
            	</div>
    </div>
<br><br><br>
</body>
</html>
<?php 
}
?>
</div>
