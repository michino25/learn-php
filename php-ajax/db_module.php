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

function queryData($link, $q)
{
	$result = mysqli_query($link, $q);
	return $result;
}

function queryNoData($link, $q)
{
	$result = mysqli_query($link, $q);
	return $result;
}

// function dispose($link, $result)
// {
// 	try {
// 		mysqli_close($link);
// 		mysqli_free_result($result);
// 	} catch (TypeError $e) {
// 	}
// }

function dispose($link)
{
	try {
		mysqli_close($link);
	} catch (TypeError $e) {
	}
}

function executeNonQuery($q) {
	$link = NULL;
	connect($link);
	$result = queryNoData($link, $q);
	dispose($link);
	return $result;
}

function executeQuery($q) {
	$link = NULL;
	connect($link);
	$result = queryData($link, $q);
	dispose($link);
	return $result;
}