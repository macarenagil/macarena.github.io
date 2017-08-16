<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>List of Members in Our Database</title>
<meta name="description" content="List of Members in the gym" />
<link rel="icon" href="/favicon.ico" type="image/x-icon">
<link type="text/css" rel="stylesheet" href="./css/style.css" media="screen"/>

</head>
<body>

  <header>

<div class="container">
    <div id="branding">
      <h1><span class="highlight">11th Hour</span> Fitness</h1>
    </div>
    <nav>
      <ul>
        <li><a href="index.html">Home</a></li>
        <li><a href="aboutme.html">About Me</a></li>
        <li><a href="http://mrhenrychen.com">Next Student</a></li>
	      <li><a href="fitness.html">Why You Should Exercise</a></li>
        <li class= "current"><a href="services.html">Information</a></li>
      </ul>
    </nav>
  </div>
  </header>

<div class="database">
<h2>Members Page</h2>

<?php
error_reporting(E_ALL); ini_set('display_errors', 1);
$servername = 'mysql.hostinger.com';
$username = 'u534058315_me';
$password = 'blinkhealth';
$dbname = 'u534058315_sampl';

if(isset($_POST['add']))
{

  $conn = new mysqli($servername, $username, $password, $dbname);
if(! $conn )
{
die('Could not connect: ' . mysql_error());
}

if(! get_magic_quotes_gpc() )
{
$name = addslashes ($_POST['name']);
$email_address = addslashes ($_POST['email_address']);
}
else
{
$name = $_POST['name'];
$email_address = $_POST['email_address'];
}

$sql = "INSERT INTO members". "(name,email, added) ". "VALUES('$name','$email_address', NOW())";
$retval = $conn->query( $sql);
if(! $retval )
{
die('Could not enter data: ' . mysql_error());
}
echo '<a href="members.php">Information Entered Successfully</a>!';
}

$conn = new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) {
die("Connection failed: " . $conn->connect_error);
}
$sql = "SELECT id,name,email,url,added FROM members";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
// output data of each row
echo '<ol>' ;
while($row = $result->fetch_assoc()) {
echo '<li><a href="'.$row["url"].'">'.$row["name"].'</a></li>';

}
echo '</ol>' ;
} else {
echo "0 results";
}
$conn->close();
?>

</div>

 <!--FOOTER-->
    <div>
      <footer>

        <h3>Contact Us:</h3>

        <b>Our Address</b> <br />
        11th Hour Fitness<br />
        279 Harvard Street<br />
        New York, NY 10003<br />

        <b>Call</b> 202-555-0101 (8:30am-6:30pm ET, Monday-Friday)<br>
        <b>Email</b> <a class= "info" href="mailto:mariaarroyogil@baruchmail.cuny.edu">trainers@11hourfitness.com </a>


        <div>
          <a href="sitemap.xml">Site Map</a> |
          <a href="https://validator.w3.org/nu/?doc=http%3A%2F%2Faprendespanish.club%2Fadd-member.php"> Validation</a> |
          <a href="http://cis3630.org/student-webpages.php"> Students'Page</a> |
          <a href="https://search.google.com/search-console/mobile-friendly?id=VS2N6AB7XbO93NbDEm3MLQ"> Mobile Friendly</a>
        </div>


      Copyright &copy; 2017 Maria Arroyo Gil<br>



    </footer>
    </div>
    <!--END OF FOOTER-->




</body>
</html>