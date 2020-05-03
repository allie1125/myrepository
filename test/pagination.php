<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Pagination</title>
</head>
<body>
<?php

include_once "DBconnect.php";

mysqli_select_db($conn, 'db');

//define how many results you want per page
$results_per_page = 5;

//find out the number of result stored in database
//limit 0,5 means start from result number 0  and show 5 results
$sql="SELECT * FROM board_findDonghaeng order by no desc";
$result=mysqli_query($conn,$sql);
$number_of_result= mysqli_num_rows($result);

//while($row = mysqli_fetch_array($result)){
//    echo $row['title'] . '<br>';
//
//}

//determine number of total pages available
$number_of_pages = ceil($number_of_result / $results_per_page);

//determine which page number visitor is currently on
if (!isset($_GET['page'])){
    $page=1;
}else{
    $page=$_GET['page'];
}

//determine the sql LIMIT starting number for the results on the displaying page
$this_page_first_result = ($page-1)*$results_per_page;

//retrieve selected results from database and display them on page
$sql1 = "SELECT * FROM board_findDonghaeng order by no desc LIMIT " . $this_page_first_result . ',' . $results_per_page;
$result = mysqli_query($conn,$sql1);

//display the result from the query
while ($row = mysqli_fetch_array($result)){
    echo $row['title'] . '<br>';
}

for ($page=1;$page<=$number_of_pages;$page++){
    echo '<a href="pagination.php?page='. $page. '">' .$page . '</a>';
}
?>
</body>
</html>