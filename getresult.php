<?php
$conn = require "dbconnection.php";

//per page row count
$perPage = 15;

$initialSql = "SELECT count(*) as totalRows from row";
$sql = "SELECT * from row";
$page = 1;
if(!empty($_GET["page"])) {
	$page = $_GET["page"];
}

$start = ($page-1)*$perPage;
if($start < 0) $start = 0;

$getFiletedRows =  $sql . " limit " . $start . "," . $perPage; 
$result = $conn->query($getFiletedRows);

$countAllRows =  $initialSql; 
$result1 = $conn->query($countAllRows);
$totalRowsCount = $result1->fetch_assoc()['totalRows'];

$pages  = ceil($totalRowsCount/$perPage);
$output = '';

//please make sure you will always keep the input hidden field
//With the rest of the output you can do anything
if ($result->num_rows > 0) {
	$output .= '<input type="hidden" class="pagenumber" value="' . $page . '" /><input type="hidden" class="total-pages" value="' . $pages . '" />';
	while($row = $result->fetch_assoc()) {
		$output .=  '<div class="question">' . $row["id"] .'-'.$row["rowName"]. '</div>';
	}
}
echo $output;
?>
