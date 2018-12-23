<html>
<head>
<meta charset="UTF-8">
<title>Order Reports</title>
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
<h2>Order Reports</h2>
<body>
<table id = orders class = "darkTable table-hover"> 
<thead>	
    <th>Order ID</th>
    <th>User</th>
    <th>Address</th>
    <th>City</th>
    	<th>State</th>
    	<th>Zip Code</th>
    	<th>Product</th>
    	<th>Quantity</th>
    	<th>Price</th>
    	<th>Subtotal</th>
</thead>
<tbody>
<?php
for ($x = 0; $x < count($orders); $x++) {  
    echo "<tr>";
    echo "<td>" . $orders[$x]['ORDERSID'] . "</td>"; 
    echo "<td>" . $orders[$x]['FIRSTNAME'] . "</td>";
    echo "<td>" . $orders[$x]['ADDRESS'] . "</td>";
    echo "<td>" . $orders[$x]['CITY'] . "</td>";
    echo "<td>" . $orders[$x]['STATE'] . "</td>";
    echo "<td>" . $orders[$x]['ZIP_CODE'] . "</td>";
    echo "<td>" . $orders[$x]['PRODUCT_NAME'] . "</td>";
    echo "<td>" . $orders[$x]['QUANTITY'] . "</td>";
    echo "<td>" . $orders[$x]['PRODUCT_PRICE'] . "</td>";
    echo "<td>" . $orders[$x]['SUBTOTAL'] . "</td>";
    
    echo "</tr>"; 
}
?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function () {
    $('#orders').DataTable();
} );
</script>
</body>
</html>