#!/usr/local/bin/php
<?php
$idRemove = filter_var($_POST['idRemove'], FILTER_VALIDATE_INT);
$titleRemove = filter_var($_POST['titleRemove'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$genreRemove = filter_var($_POST['genreRemove'], FILTER_SANITIZE_FULL_SPECIAL_CHARS);
$yearRemove = filter_var($_POST['yearRemove'], FILTER_VALIDATE_INT);
$https = 'https://';
$linkRemove = $https .= filter_var($_POST['linkRemove'], FILTER_SANITIZE_URL);
$runtimeRemove = filter_var($_POST['runtimeRemove'], FILTER_VALIDATE_INT);

require_once('./mysql.log.data.php');
$conn = mysqli_connect($mysql_host, $mysql_login, $mysql_passw, $mysql_database);
if ($conn->connect_error) {
    die('connection failed:' . $conn->connect_error);
}

$stmt = $conn->prepare('DELETE FROM movies WHERE id=?');
$stmt->bind_Param('i', $idRemove);
$stmt->execute();

$stmt->close();
$conn->close();

header('Location: index.php');
exit();
