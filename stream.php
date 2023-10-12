<?php
//Author: Erick Saddam | Linkedn:https://www.linkedin.com/in/erick-saddam-44b71aa1
//include auth_session.php file on all user panel pages
include("auth_session.php");

// Connect to the database
$conn = mysqli_connect("localhost","root","root","stream");

// Check connection
if (!$conn) {
	die("Connection failed: " . mysqli_connect_error());
}

// Execute a SQL query to get the data
$result = mysqli_query($conn, "SELECT * FROM users");

// Loop through the results and generate the URL for the iframe
while ($row = mysqli_fetch_assoc($result)) {
	$url = "http://admin:". $row['token'];
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <title>Dashboard - User area</title>
    <link rel="stylesheet" href="styles.css" />
</head>

<body>
<h2 class = "user"><?php echo $_SESSION['username']; ?></h2>
	<Form>
    <h2>  Welcome to Your Dashboard </h2>
	<iframe	class= "card" id = "cam1" src="<?php echo $url; ?>@cameraIP:80/Streaming/Channels/1/picture/" height="300" width="320" title="Camera Feed"></iframe>
	<iframe	class= "card" id = "cam2" src="<?php echo $url; ?>@cameraIP:80/Streaming/Channels/1/picture/" height="300" width="320" title="Camera Feed"></iframe>
	<iframe	class= "card" id = "cam3" src="<?php echo $url; ?>@cameraIP:80/Streaming/Channels/1/picture/" height="300" width="320" title="Camera Feed"></iframe>
	<iframe	class= "card" id = "cam4" src="<?php echo $url; ?>@cameraIP:80/Streaming/Channels/1/picture/" height="300" width="320" title="Camera Feed"></iframe></br>
	<iframe	class= "card" id = "cam5" src="<?php echo $url; ?>@cameraIP:80/Streaming/Channels/1/picture/" height="300" width="320" title="Camera Feed"></iframe>
	<iframe	class= "card" id = "cam5" src="<?php echo $url; ?>@cameraIP:80/Streaming/Channels/1/picture/" height="300" width="320" title="Camera Feed"></iframe></br>
	<div class="container" style="background-color:#f1f1f1">
    <button type="button" class="cancelbtn" onclick="location.href='logout.php'">Logout</button>
    <span class="psw"><button type="button" class="refreshbtn" onClick="window.location.reload();">Refresh</button></span>
  </div>
	</form>
</body>
<script>
function refreshIframes() {
  // Get a reference to the iframes
  var cam1 = document.getElementById("cam1");
  var cam2 = document.getElementById("cam2");
  var cam3 = document.getElementById("cam3");
  var cam4 = document.getElementById("cam4");
  var cam5 = document.getElementById("cam5");
  var cam6 = document.getElementById("cam6");

  // Refresh the iframes by setting the src attribute to itself
  cam1.src = cam1.src;
  cam2.src = cam2.src;
  cam3.src = cam3.src;
  cam4.src = cam4.src;
  cam5.src = cam5.src;
  cam6.src = cam6.src;
}

// Call the refreshIframes function every 10 seconds (10000 milliseconds)
setInterval(refreshIframes, 10000);
</script>
</html>
