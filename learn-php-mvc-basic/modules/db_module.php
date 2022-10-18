<?php
require_once "config.php";

function connect(&$link)
{
	$link = mysqli_connect(HOST, USER, PASSWORD, DB);
	if (mysqli_connect_errno()) {
		echo "Lỗi kết nối đến máy chủ: " . mysqli_connect_error();
		exit();
	}
}

function dispose($link)
{
	try {
		mysqli_close($link);
	} catch (TypeError $e) {
	}
}

function executeQuery($q) {
	$link = NULL;
	connect($link);
	$result = mysqli_query($link, $q);
	dispose($link);
	return $result;
}