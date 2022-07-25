<?php
include "../../config/db.php";
$sql = "DELETE FROM users WHERE email=";

if (mysqli_query($link, $sql)) {
    echo "Record deleted successfully";
} else {
    echo "Error deleting record: " . mysqli_error($link);
}



?>
