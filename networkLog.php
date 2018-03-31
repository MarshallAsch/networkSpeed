<?php

include_once "networkSql.php";

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
	$body = json_decode(file_get_contents('php://input'));
	$headers = apache_request_headers();


	$ip = $headers["X-Forwarded-For"];
	$download = $body->Download;
	$upload = $body->Upload;
	$ping = $body->Ping;
	$name =  $body->host;


	insert($name, $ip, $download, $upload, $ping);
}
else {

	$result = getEntries();


	if ($result->num_rows > 0) {
	    echo "<table><tr><th>host</th><th>ip</th><th>Download</th><th>Upload</th><th>Ping</th><th>Time</th></tr>";
	    // output data of each row
	    while($row = $result->fetch_assoc()) {
	        echo "<tr><td>".$row["name"]."</td><td>".$row["host"]."</td><td>".$row["download"]."</td><td>".$row["upload"]."</td><td>".$row["ping"]."</td><td>".$row["time"]."</td></tr>";
	    }
	    echo "</table>";
	} else {
	    echo "0 results";
	}
}

?>
