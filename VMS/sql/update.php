<?php


include_once 'config.php';
session_start();

$sql = "SELECT * FROM bookhours ";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $full_name = $_POST['full_name'];
   
    $phone = $_POST['phone'];
    $adress = $_POST['email'];
    $message = $_POST['message'];
    $sql = "UPDATE bookhours set id='$id', full_name='$full_name',  phone='$phone' ,email='$adress',info='$message' WHERE id='$id'";
    mysqli_query($con, $sql);
    header('Location: ../Client/Table.php');
}

?>
<html>

<head>
    <title>Update <?php echo $row['email']?>Data</title>
</head>

<body>
    <form name="frmUser" method="post" action="">
        <div><?php echo '<script type="text/javascript">
    console.log("Update data successfully");
</script> ';
                ?>
        </div>
        <div style="padding-bottom:5px;">
            <a href="../client/Table.php">Back to Table</a>
        </div>
        Client ID: <br>
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="id" value="<?php echo $row["id"]; ?>">
        <br>
        Full Name<br>
        <input type="text" name="full_name" class="txtField" value="<?php echo $row["full_name"]; ?>">
        <br>
        Phone:<br>
        <input type="text" name="phone" class="txtField" value="<?php echo $row['phone']; ?>">
        <br>
        Email:<br>
        <input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
        <br>
        Info:<br>
        <input type="text" name="message" class="txtField" value="<?php echo $row['info']; ?>">
        <input type="submit" name="submit" value="Update">

    </form>
</body>

</html>