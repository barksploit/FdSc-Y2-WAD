<!DOCTYPE html>
<html>
    <head>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
        <link rel="stylesheet" href="https://cdn.datatables.net/2.3.7/css/dataTables.dataTables.min.css">
        
</head>
<body>

<?php 



include "connect.php";

$result = $conn->query("SELECT * FROM users");


?>
<table id="users">
    <thead>
    <tr>
    <?php

    foreach(mysqli_fetch_fields($result) as $field) {
        echo "<th>$field->name</th>";
    }


?>
</tr>
</thead>
<tbody>

<?php 



while ($user = $result->fetch_assoc()) {
    echo "<tr>";

        foreach($user as $column) {
            echo "<td>$column</td>";
        }
        echo "</tr>";
}


?>
</tbody>
</table>
<script src="https://code.jquery.com/jquery-4.0.0.min.js" integrity="sha256-OaVG6prZf4v69dPg6PhVattBXkcOWQB62pdZ3ORyrao=" crossorigin="anonymous"></script>
<script src="https://cdn.datatables.net/2.3.7/js/dataTables.min.js"></script>

<script> 

</script>
</body>
</html>