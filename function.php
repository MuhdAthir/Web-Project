<?php

date_default_timezone_set("Asia/Kuala_Lumpur");


function getAllDatafrom($conn,$table,$param1,$param2)
{
	$sql = "SELECT * FROM ".$table." WHERE ".$param1." = '".$param2."'";
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row;

}

function getData($conn,$table)
{
	$sql = "SELECT * FROM ".$table;
	$result = $conn->query($sql);
	$row = $result->fetch_assoc();
	return $row;

}



function loopTable($conn,$table)
{
	$listsql = "SELECT * FROM $table";
	$liststmt = $conn->prepare($listsql);
	$liststmt->execute();
	$listresult = $liststmt->get_result();	
	return $listresult;

}

function loopTableCond($conn,$table,$param,$status)
{
	$listsql = "SELECT * FROM $table WHERE $param = '$status'";
	$liststmt = $conn->prepare($listsql);
	$liststmt->execute();
	$listresult = $liststmt->get_result();	
	return $listresult;
}

function loopSQL($conn,$SQL)
{
	$liststmt = $conn->prepare($SQL);
	$liststmt->execute();
	$listresult = $liststmt->get_result();	
	return $listresult;
}

function getSQL($conn,$SQL)
{
	$result = $conn->query($SQL);
	$row = $result->fetch_assoc();
	return $row;
}

?>