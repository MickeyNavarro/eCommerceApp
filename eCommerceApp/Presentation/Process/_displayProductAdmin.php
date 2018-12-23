<html>
<head>
<meta charset="UTF-8">
<title>Product Admin</title>
<link href="https://fonts.googleapis.com/css?family=Vampiro+One" rel="stylesheet">
<script   src="https://code.jquery.com/jquery-3.3.1.slim.min.js"   integrity="sha256-3edrmyuQ0w65f8gfBsqowzjJe2iM6n0nKciPUp8y+7E="   crossorigin="anonymous"></script> 
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/1.10.19/css/jquery.dataTables.css">
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
.btn {
  background-color: #80ffbf;
  color: white;
  border: none;
  cursor: pointer;
}
</style>
</head>
<br><br><br>
<h2>Product Admin</h2>
<body>
<table id = products class = "darkTable table-hover"> 
<thead>	
    <th>ID</th>
    <th>Product Name </th>
    <th>Description</th>
    <th>Price</th>
    	<th>Quantity</th>
    	<th>Photo(s)</th>
	<th>Photo File # 1</th>
		<th>Photo File # 2</th>
			<th>Photo File # 3</th>
	<th></th>
	<th></th>
</thead>
<tbody>
<?php
for ($x = 0; $x < count($products); $x++) {
    echo "<tr>";
    echo "<td>" . $products[$x]['ID'] . "</td>";
    echo "<td>" . $products[$x]['PRODUCT_NAME'] . "</td>";
    echo "<td>" . $products[$x]['DESCRIPTION'] . "</td>";
    echo "<td>" . $products[$x]['PRICE'] . "</td>";
    echo "<td>" . $products[$x]['QUANTITY'] . "</td>";
    echo "<td>"; ?> 
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
    
    <?php echo "</td>";
    echo "<td>" . $products[$x]['PHOTO1'] . "</td>";
    echo "<td>" . $products[$x]['PHOTO2'] . "</td>";
    echo "<td>" . $products[$x]['PHOTO3'] . "</td>";
    
    //include buttons for edit and delete user
    echo "<td><form action = '/eCommerceApp/Presentation/Show/showProductEdit.php' method = 'POST'><input type = 'hidden' name = 'id' value = ".$products[$x]['ID']."><input type = 'submit' value = 'Edit'></form> </td>";
    echo "<td><form action = '/eCommerceApp/Presentation/Process/processProductDelete.php' method = 'GET'><input type = 'hidden' name = 'id' value = ".$products[$x]['ID']."><input type = 'submit' value = 'Delete'></form> </td>";
    
    echo "</tr>"; 
}
?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function () {
    $('#products').DataTable();
} );
</script>
</body>
</html>