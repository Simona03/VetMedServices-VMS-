<?php


include_once 'config.php';
session_start();

$sql = "SELECT * FROM profiles";
$result = mysqli_query($con, $sql);
$row = mysqli_fetch_array($result);

if (count($_POST) > 0) {
    $id = $_POST['id'];
    $full_name = $_POST['name'];
   
    $password = $_POST['password'];
    $pass =md5($password);
    $adress = $_POST['email'];
    $numberId = $_POST['numberId'];
    $sql = "UPDATE profiles set id='$id', name='$full_name',  password='$pass' ,email='$adress',staffId='$numberId' WHERE id='$id'";
    mysqli_query($con, $sql);
    header('Location: ../Pages/Profiles/staffProfiles.php');
}

?>
<html>

<head>
    <title>Update <?php echo $row['name']?> Data</title>
</head>

<body>
    <form name="frmUser" method="post" action="">
        <div><?php echo '<script type="text/javascript">
    console.log("Update data successfully");
</script> ';
                ?>
        </div>
        <div style="padding-bottom:5px;">
            <a href="../Pages/Profiles/staffProfiles.php">Back to Table</a>
        </div>
        Client ID: <br>
        <input type="hidden" name="id" class="txtField" value="<?php echo $row['id']; ?>">
        <input type="text" name="id" value="<?php echo $row["id"]; ?>">
        <br>
        Full Name<br>
        <input type="text" name="name" class="txtField" value="<?php echo $row["name"]; ?>">
        <br>
        Password:<br>
        <input type="text" name="password" class="txtField" value="<?php echo $row['password']; ?>">
        <br>
        Email:<br>
        <input type="text" name="email" class="txtField" value="<?php echo $row['email']; ?>">
        <br>
        Info:<br>
        <input type="text" name="numberId" class="txtField" value="<?php echo $row['staffId']; ?>">
        <input type="submit" name="submit" value="Update">

    </form>
</body>

</html>