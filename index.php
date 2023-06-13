<!DOCTYPE html>
<html>
<head>
    <title>Google Website</title>

<style>
    input
    {
        width: 700px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid blue;
        font-size: 20px;
    }
    #searchbtn
    {
        width: 130px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid blue;
        color: blue;
        fint-size: 18px;
        background-color: white;
    }
    #searchbtn:hover
    {
        background-color: blue;
        color: white;
    }


</style>    
</head>
<body>

<br><br><br><br><br><br>
<center><img src="searchlogo.png" width="20%"></center>

<form action="result.php" method="GET">
<br>
<center><input type="text" name="search"></center>
<br><br>
<center><input type="submit" name="searchbtn" id="searchbtn" value="Search"></center>

</body>
</html>