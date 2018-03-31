<?php



function getEntries($name="%")
{

	$conn = initiateConnection();

	if (!$conn) {
		return false;
	}


	$name = $conn->real_escape_string($name);

	$sql = "SELECT name, host, download, upload, ping, time FROM log where name like \"".$name."\"";
	$result = $conn->query($sql);

	$conn->close();

	return $result;
}


function insert($name, $ip, $download, $upload, $ping)
{

	$conn = initiateConnection();

	if (!$conn) {
		return false;
	}


	$stmt = $conn->prepare("INSERT INTO log (name,host, download, upload, ping) VALUES (?, ?, ?, ?, ?)");
	$stmt->bind_param("sssss", $name,  $ip, $download, $upload, $ping);

	$stmt->execute();
	$stmt->close();
	$conn->close();

	return true;
}

function initiateConnection()
{
	$servername = "localhost";
	$username = "netLog";
	$password = "abcd";
	$database = "netSpeeds";

	$connection = mysqli_connect($servername, $username, $password, $database);

    //make sure connection was successful
    if (!$connection) {
            echo "Failed to connect";
            return false;
    }

    //set the charset
    if (!mysqli_set_charset($connection, 'utf8')) {
            echo "Failed to set the chatacter set";
            return false;
    }

    return $connection;
}
