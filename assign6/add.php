#!/usr/local/bin/php
<?php
$idAdd = filter_var($_POST['idAdd'], FILTER_VALIDATE_INT);
$titleAdd = filter_var($_POST['titleAdd'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$genreAdd = filter_var($_POST['genreAdd'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$yearAdd = filter_var($_POST['yearAdd'], FILTER_VALIDATE_INT);
$https = 'https://';
$linkAdd = $https .= filter_var($_POST['linkAdd'], FILTER_SANITIZE_URL);
$runtimeAdd = filter_var($_POST['runtimeAdd'], FILTER_VALIDATE_INT);

require_once('./mysql.log.data.php');
$conn = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
if ($conn->connect_error) {
  die('connection failed:' . $conn->connect_error);
}

$stmt = $conn->prepare('INSERT INTO movies (id, title, genre, year, link, runtime) VALUES (?, ?, ?, ?, ?, ?)');
$stmt->bind_Param('issisi', $idAdd, $titleAdd, $genreAdd, $yearAdd, $linkAdd, $runtimeAdd);
$stmt->execute();

$stmt->close();
$conn->close();

header('Location: index.php');
exit();
