<!DOCTYPE html>
<html>
<head>
    <title>Google Website2</title>

<style>
   input
   {
    width: 600px;
    height: 35px;
    border: 1px solid blue;
    border-radius: 5px;
   }
   #addbtn
   {
    width: 100px;
    height: 35px;
    border: 1px solid blue;
    border-radius: 5px;
    background-color: white;
    color: blue;
    font-size: 20px;
   }
   #addbtn:hover
   {
    background-color: blue;
    color: white
   }
   #cancelbtn
   {
    width: 100px;
    height: 35px;
    border: 1px solid red;
    border-radius: 5px;
    background-color: white;
    color: red;
    font-size: 20px;
   }
   #cancelbtn:hover
   {
    background-color: red;
    color: white
   }
   #dasc 
   {
    width: 600px;
    height: 100px;
    border: 1px solid blue;
    border-radius: 5px;
   }
</style>    
</head>
<body>

<font size="7"><b><p align="center">Add a Website</p></b></font>


<form action="" method="POST" enctype="multipart/form-data">
    <table border="0" width="60%" align="center" cellspacing="10">
        <tr>
            <td>Website Title</td>
            <td><input type="text" name="websitetitle"></td>
        </tr>
        <tr>
            <td>Website Link</td>
            <td><input type="text" name="websitelink"></td>
        </tr>
        <tr>
            <td>Website Keywords</td>
            <td><input type="text" name="websitekeywords"></td>
        </tr>
        <tr>
            <td>Website Description</td>
            <td><textarea name="websitedescription" id="dasc"></textarea></td>
        </tr>
        <tr>
            <td>Website Images</td>
            <td><input type="file" name="uploadfile"></td>
        </tr>
        <tr>
            <td colspan="2" align="center"><input type="submit" name="addwebsite" id="addbtn">
                 &nbsp &nbsp
            <input type="reset" name="reset" id="cancelbtn">
            </td>
        </tr>
    </table>
</form>

</form>

</body>
</html>

<?php
include("connection.php");

if(isset($_POST['addwebsite'])) {
    $website_title = $_POST['websitetitle'];
    $website_link = $_POST['websitelink'];
    $website_keywords = $_POST['websitekeywords'];
    $website_description = $_POST['websitedescription'];

    $filename = $_FILES["uploadfile"]["name"];
    $tempname = $_FILES["uploadfile"]["tmp_name"];

    $folder = "website_images/".$filename;
    move_uploaded_file($tempname, $folder);

    if($website_title != "" && $website_link != "" && $website_keywords != "" && $website_description != "" && $filename != "") {
        $query = "INSERT INTO add_website (website_title, website_link, website_keywords, website_description, web_image) VALUES (?, ?, ?, ?, ?)";
        $statement = mysqli_prepare($conn, $query);
        mysqli_stmt_bind_param($statement, "sssss", $website_title, $website_link, $website_keywords, $website_description, $folder);
        mysqli_stmt_execute($statement);

        if(mysqli_stmt_affected_rows($statement) > 0) {
            echo "<script>alert('Website Inserted')</script>";
        } else {
            echo "<script>alert('Failed')</script>";
        }
    }
}
?>
