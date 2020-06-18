<?php

$sku = $_GET['sku'];
$name = $_GET['name'];
$description  = $_GET['description'];

$mysqlServer = mysqli_connect('localhost', 'user', 'pass');

for($i=0; $i<10; $i++){
    $skuid = $sku."-".$i;
    $shortDescription = substr($description, 0, 50);

    $insertProductQuery = "INSERT INTO Products (sku, name, short_description);
            VALUES ('$skuid', '$name', '$shortDescription');";

    $mysqlServer->query($insertProductQuery);
}

$getAllProductsQuery = "SELECT * FROM Products";

$result = $mysqlServer->query($getAllProductsQuery);

if ($result->num_rows > 0) {
    while($row = $result->fetch_assoc()) {
        echo "SKU: " . $row["sku"]. " - Name: " . $row["name"]. " " . $row["short_description"]. "<br>";
    }
} else {
    echo "0 result";
}

mysqli_close($mysqlServer);

?>
