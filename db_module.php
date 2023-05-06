<?php
require_once "config.php";

function connect(&$connection)
{
	$connection = mysqli_connect(HOST, USER, PASSWORD, DB);
	mysqli_set_charset($connection, 'UTF8');
	if (mysqli_connect_errno()) {
		echo "Lỗi kết nối đến máy chủ: " . mysqli_connect_error();
		exit();
	}
}

function queryData($connection, $query)
{
	$result = mysqli_query($connection, $query);
	return $result;
}

// function dispose($connection, $result)
// {
// 	try {
// 		mysqli_close($connection);
// 		mysqli_free_result($result);
// 	} catch (TypeError $e) {
// 	}
// }

function dispose($connection)
{
	try {
		mysqli_close($connection);
	} catch (TypeError $e) {
	}
}

function executeNonQuery($query)
{
	$connection = NULL;
	connect($connection);
	$result = queryData($connection, $query);
	dispose($connection);
	return $result;
}

function executeQuery($query)
{
	$connection = NULL;
	connect($connection);
	$result = queryData($connection, $query);
	dispose($connection);
	return $result;
}

function stringSQL($string)
{
	$link = NULL;
	connect($link);
	mysqli_real_escape_string($link, $string);
	dispose($link);
	return $string;
}
