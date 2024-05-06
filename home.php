<?php
@include 'config.php';

if(isset($_POST['search'])) {
    $search = $_POST['search'];
    $sql = "SELECT * FROM file WHERE files LIKE '%$search%'";
    $result = mysqli_query($conn, $sql);

    if(mysqli_num_rows($result) > 0) {
        // Display the file details
        $row = mysqli_fetch_assoc($result);
        // Download the file
        
        $file_name = $row["files"];

        // Set headers for file download
        header('Content-Type: application/octet-stream');
        header("Content-Transfer-Encoding: Binary");
        header("Content-disposition: attachment; filename=\"" . $file_name . "\"");

        // Read and output the file contents
        readfile($file_path);
        exit;
        
    } else {
        echo "File not found.";
    }
}
?>


<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="home.css">
</head>
<body>
    <img src="photo 2.jpg" alt="none" height="100%" width="100%">
    
    <div class=form >
      <form action=""   method="post">
        <h2>Search Details Here</h2>
            <label for="search">Search for a file:</label>
            <input type = "search"  name=search code placeholder="unit code" required>
            <input type ='submit'  name="submit" value="download" >
            <P><span></span>
            
            

    </form>
    </div>
        
    
</body>
</html>
