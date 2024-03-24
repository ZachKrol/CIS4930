#!/usr/local/bin/php
<?php
require_once('./mysql.log.data.php');
$connect = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
if ($connect->connect_error) {
    die('connection failed:' . $connect->connect_error);
}

$output = '';
$order = $_POST["order"];
if ($order == 'desc') {
    $order = 'asc';
} else {
    $order = 'desc';
}

$query = "SELECT * FROM movies ORDER BY " . $_POST["column_name"] . " " . $_POST["order"] . "";
$result = mysqli_query($connect, $query);
$output .= '  
    <table class="table table-hover border">  
        <thead class="table-primary">
            <tr>  
                <th scope ="col"><a class="column_sort" id="id" data-order="' . $order . '" href="#">ID</a></th>  
                <th scope ="col"><a class="column_sort" id="title" data-order="' . $order . '" href="#">Title</a></th>  
                <th scope ="col"><a class="column_sort" id="genre" data-order="' . $order . '" href="#">Genre</a></th>  
                <th scope ="col"><a class="column_sort" id="year" data-order="' . $order . '" href="#">Year</a></th>  
                <th scope ="col"><a class="column_sort" id="link" data-order="' . $order . '" href="#">iMDb</a></th>  
                <th scope ="col"><a class="column_sort" id="runtime" data-order="' . $order . '" href="#">Runtime(min)</a></th>  
            </tr>  
        </thead>
        <tbody>
    ';
while ($row = mysqli_fetch_array($result)) {
    $output .= '  
        <tr>  
            <td>' . $row["id"] . '</td>  
            <td>' . $row["title"] . '</td>  
            <td>' . $row["genre"] . '</td>  
            <td>' . $row["year"] . '</td>  
            <td><a class="web" target="_blank" href="' . $row["link"] . '">Link</a></td>
            <td>' . $row["runtime"] . '</td>  
        </tr>  
    ';
}
$output .= '
        </tbody>
    </table>
';
echo $output;
$connect->close();
