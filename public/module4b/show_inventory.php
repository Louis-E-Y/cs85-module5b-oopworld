<!DOCTYPE html>
<html>
<head>
    <title>Inventory</title>
</head>
<body>


<?php
try {
  $db = new PDO("mysql:host=localhost;dbname=inventory_db", "root", "");
  $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

  $stmt = $db->query("SELECT * FROM items");
  $items = $stmt->fetchAll(PDO::FETCH_ASSOC);

    foreach ($items as $item) {
        echo "<tr>";
        echo "<td>{$item['item_name']}</td>";
        echo "<td>{$item['quantity']}</td>";
        echo "</tr>";
    }
    echo "</table>";

} catch (PDOException $e) {
  echo "Connection failed: " . $e->getMessage();
}

/* I chose my items mainly because they were stuff lying around me that I thought of
, but they also have a wide range of different categories and show (to me at least)
that this kind of entering of data is only as good as the person documenting stuff.
I imagine that clarity in terms of overlapping categories can become weaker as
the db is scaled up. 

To my understanding PDO protects against injection attacks because it separates
the user input and the SQL query, so that the user input is treated as data
rather than executable code.
*/
?>

</body>
</html>