#!/usr/local/bin/php
<?php
$idUpdate = filter_var($_POST['idUpdate'], FILTER_VALIDATE_INT);
$titleUpdate = filter_var($_POST['titleUpdate'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$genreUpdate = filter_var($_POST['genreUpdate'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$yearUpdate = filter_var($_POST['yearUpdate'], FILTER_VALIDATE_INT);
$https = 'https://';
$linkUpdate = $https .= filter_var($_POST['linkUpdate'], FILTER_SANITIZE_URL);
$runtimeUpdate = filter_var($_POST['runtimeUpdate'], FILTER_VALIDATE_INT);

require_once('./mysql.log.data.php');
$conn = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
if ($conn->connect_error) {
    die('connection failed:' . $conn->connect_error);
}

$stmt = $conn->prepare('UPDATE movies SET title=?, genre=?, year=?, link=?, runtime=? WHERE id=?');
$stmt->bind_Param('ssisii', $titleUpdate, $genreUpdate, $yearUpdate, $linkUpdate, $runtimeUpdate, $idUpdate);
$stmt->execute();

$stmt->close();
$conn->close();

header('Location: index.php');
exit();
