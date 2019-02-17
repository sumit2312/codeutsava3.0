<form method="POST">
<input type="text" placeholder="Enter body" name="body">
<input type="submit" placeholder="Submit">
</form>


<?php

$id = $_GET['id'];
$from= $_GET["email"];
//Connect DB
//Create query based on the ID passed from you table
//query : delete where Staff_id = $id
// on success delete : redirect the page to original page using header() method
$dbname = "incubation";
$conn = mysqli_connect("localhost", "root", "", $dbname);
// Check connection
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
$sql = "SELECT * FROM mentors WHERE id = $id";

// sql to delete a record

$result = mysqli_query($conn, $sql);
 

if ($result) {
    $row = mysqli_fetch_array($result);
    if (array_key_exists("body",$_POST)){

    $to      = $row['email'];
    $subject = 'the subject';
    $message = $_POST["body"];
    $headers = 'From:'.$from.  "\r\n" .
    'Reply-To: sudocoders@codeutsava.com' . "\r\n" .
    'X-Mailer: PHP/' . phpversion();

    if(mail($to, $subject, $message, $headers)){

        header('Location: admin.php'); //If book.php is your main page where you list your all records




        
    }else{
        echo 'Error in mailing.';
    };


    mysqli_close($conn);
    
    exit;
} else {
    
}}
?>