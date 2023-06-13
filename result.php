<!DOCTYPE html>
<html>
<head>
    <title>Result Page</title>

<style>
    #searchfield
    {
        width: 500px;
        height: 35px;
        border-radius: 5px;
        border: 1px solid blue;
    }
    #gobtn
    {
        width: 100px;
        height: 39px;
        border-radius: 5px;
        border: 1px solid blue;
        background-color: white;
        font-size: 17px;
    }
    #gobtn:hover
    {
        background-color: blue;
        color: white;
    }
    a
    {
        color: #0000cc;
        text-dacoration: none;
    }
</style>

</head>
<body>
<!-- <form action="" method="GET"> -->
<!-- <form action="result.php" method="GET"> -->
<form action="finalsearch.php" method="GET">
    <table border="0" width="100%" bgcolor="f2f2f2">
    <tr>
        <td width="10%">
            <a href="index.php"><img src="searchlogo2.png" width="100%"></a>
        </td>

        <td>
            <input type="text" name="" id="searchfield">
            <input type="submit" name="" value="GO!" id="gobtn">
        </td>
    </tr>
    </table>

<table border="0" style="margin-left: 100px">
    <tr>
<?php
include("connection.php");
// if(isset($_GET['searchbtn']))
if(isset($_GET['search']))
{
    $search=$_GET['search'];
    if($search=="") 
    {
        echo "<b><p align='center'>Please write something in the search box</p></b>";
        exit();
    }

    $query = "select * from add_website where website_keywords like '%$search%' limit 0,4";
    $data = mysqli_query($conn,$query);

    if(mysqli_num_rows($data)<1)
    {
        echo "No result found";
        exit();
    }
// echo "<a href='#' style='margin-left:105px;'><font size='4'>More Images for $search</font></a>";


$query0 = "select * from add_website where website_keywords like '%$search%'";
$data0 = mysqli_query($conn,$query0);
while($row0 = mysqli_fetch_array($data0)) 
{
    echo "<a href='$row0[4]' style='105px;'><font size='4' id='a' >More Images for $search</font></a>";
}



while($row = mysqli_fetch_array($data))
{
    echo "
            <td>
            <img src='$row[4]' width='200px;'>
            </td>
    ";
}
}
?>
</tr>

</form>

<table border="0" width="60%" style="margin-left: 100px;">

    <?php
        $query1 = "select * from add_website where website_keywords like '%$search%'";
        $data1 = mysqli_query($conn,$query1);

        while($row1 = mysqli_fetch_array($data1))
        {
            echo
            "
                <tr>
                <td>
                <font size='4' color='#0000cc'><b><a href='$row1[1]'>$row1[0]</a></b></font><br>";

                echo "<font color='#006400'>$row1[1]</font><br>";
                echo "<font color='#666666'>$row1[3]</font><br><br>
                </td>
                </tr>
            ";
        }
    ?>

</table>

</body>
</html>

