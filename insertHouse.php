<?php
include 'login/server.php';
include 'login/dbconn.php';

/* Attempt MySQL server connection. Assuming you are running MySQL
server with default setting (user 'root' with no password) */
$link = mysqli_connect("localhost", "root", "", "dummy");

// Check connection
if($link === false){
    die("ERROR: Could not connect. " . mysqli_connect_error());
}
$statusMsg = '';
$backlink = ' <a href="addHouse.php">Go back</a>';
// File upload path
$targetDir = "uploads/";
$fileName = basename($_FILES["file"]["name"]);
$address = mysqli_real_escape_string($link, $_REQUEST['address']);
$price = mysqli_real_escape_string($link, $_REQUEST['price']);
$contact = mysqli_real_escape_string($link,$_REQUEST['contact']);
$details = mysqli_real_escape_string($link,$_REQUEST['details']);
$username = mysqli_real_escape_string($link,$_SESSION['username']);

$targetFilePath = $targetDir . $fileName;
$fileType = pathinfo($targetFilePath,PATHINFO_EXTENSION);
if(isset($_POST["submit"]) && !empty($_FILES["file"]["name"])){
    // Allow certain file formats
    $allowTypes = array('jpg','png','jpeg','gif','pdf');
    if (!file_exists($targetFilePath)) {
        if(in_array($fileType, $allowTypes)){
            // Upload file to server
            if(move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)){
                // Insert image file name into database
                $insert = $conn->query("INSERT into house (address, price, contact, details, username,file_name, uploaded_on) VALUES ('$address', '$price','$contact','$details', '$username','".$fileName."', NOW())");
                if(mysqli_query($link, $insert)){
                    echo "Records added successfully.";
                } else{
                    echo "ERROR: Could not able to execute $insert. " . mysqli_error($link);
                }
                if($insert){
                    $statusMsg = "The file <b>".$fileName. "</b> has been uploaded successfully." . $backlink;
                }else{
                    $statusMsg = "File upload failed, please try again." . $backlink;
                }
            }else{
                $statusMsg = "Sorry, there was an error uploading your file." . $backlink;
            }
        }else{
            $statusMsg = "Sorry, only JPG, JPEG, PNG, GIF, & PDF files are allowed to upload." . $backlink;
        }
    }else{
        $statusMsg = "The file <b>".$fileName. "</b> is already exist." . $backlink;
    }
}else{
    $statusMsg = 'Please select a file to upload.' . $backlink;
}
// Display status message
echo $statusMsg;

// Escape user inputs for security

// Close connection
mysqli_close($link);
header("refresh:0.01; url = house1.php");
?>



