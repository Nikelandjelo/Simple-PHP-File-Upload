<?php
// Check if the form was submitted
if ($_SERVER["REQUEST_METHOD"] === "POST") {
    
    // Check if file was uploaded without errors
    if (isset($_FILES["file"]) && $_FILES["file"]["error"] == 0) {
        
        // Specify the directory where you want to store the uploaded files
        $uploadDir = "uploads/";

        // Create the directory if it doesn't exist
        if (!file_exists($uploadDir)) {
            mkdir($uploadDir, 0777, true);
        }

        // Get the file name and move the file to the specified directory
        $fileName = basename($_FILES["file"]["name"]);
        $targetFilePath = $uploadDir . $fileName;

        if (move_uploaded_file($_FILES["file"]["tmp_name"], $targetFilePath)) {
            echo "The file $fileName has been uploaded successfully.";
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    } else {
        echo "Error: " . $_FILES["file"]["error"];
    }
} else {
    // Redirect to the form page if accessed directly
    header("Location: index.html");
    exit();
}
?>

