<?php
include 'includes/connection.php';

//pdo query
$sql='SELECT * FROM aboutus  WHERE id = :id';
$stmt = $pdo->prepare($sql);
$stmt->execute(['id' => $id]);
$row = $stmt->fetch();
echo $row->info;

 		
?>