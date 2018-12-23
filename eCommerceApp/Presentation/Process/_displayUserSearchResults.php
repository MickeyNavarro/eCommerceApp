<?php
//expects an array of $users; display search results in a table

//$users = array

//https://divtable.com/table-styler/
?>
<html>
<head>
<meta charset="UTF-8">
<title>Search Results</title>
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
<h2>Search Results</h2>
<body>
<table id = users class = "darkTable table-hover"> 
<thead>
    <th>ID</td>
    <th>First Name </th>
    <th>Last Name</th>
    <th>Username</th>
</thead>
<tbody>
<?php
for ($x = 0; $x < count($users); $x++) {  
    echo "<tr>"; 
    echo "<td>" . $users[$x]['ID'] . "</td>"; 
    echo "<td>" . $users[$x]['FIRSTNAME'] . "</td>";
    echo "<td>" . $users[$x]['LASTNAME'] . "</td>";
    echo "<td>" . $users[$x]['USERNAME'] . "</td>";
    echo "</tr>"; 
}
?>
</tbody>
</table>
<script type="text/javascript">
$(document).ready( function () {
    $('#users').DataTable();
} );
</script>
</body>
</html>