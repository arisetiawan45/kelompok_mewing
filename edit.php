<?php
// include database connection file
include_once("config.php");
 
// Check if form is submitted for user update, then redirect to homepage after update
if(isset($_POST['update']))
{	
	$id = $_POST['id'];
	
	$nama=$_POST['nama'];
	$telp=$_POST['telp'];
	$email=$_POST['email'];
	$alamat=$_POST['alamat'];
		
	// update user data
	$result = mysqli_query($mysqli, "UPDATE   mewing SET nama='$nama',email='$email',telp='$telp',alamat='$alamat' WHERE id=$id");
	
	// Redirect to homepage to display updated user in list
	header("Location: index.php");
}
?>
<?php
// Display selected user data based on id
// Getting id from url
$id = $_GET['id'];
 
// Fetech user data based on id
$result = mysqli_query($mysqli, "SELECT * FROM mewing WHERE id=$id");
 
while($user_data = mysqli_fetch_array($result))
{
	$nama = $user_data['nama'];
	$email = $user_data['email'];
	$telp = $user_data['telp'];
	$alamat = $user_data['alamat'];
}
?>
<html>
<head>	
	<title>Edit User Data</title>
</head>
 
<body>
	<a href="index.php">Home</a>
	<br/><br/>
	
	<form name="update_user" method="post" action="edit.php">
		<table border="0">
			<tr> 
				<td>Nama</td>
				<td><input type="text" name="nama" value=<?php echo $nama;?>></td>
			</tr>
			<tr> 
				<td>Email</td>
				<td><input type="email" name="email" value=<?php echo $email;?>></td>
			</tr>
			<tr> 
				<td>telp</td>
				<td><input type="tel" name="telp" value=<?php echo $telp;?>></td>
			</tr>
			<tr> 
				<td>alamat</td>
				<td><input type="text" name="alamat" value=<?php echo $alamat;?>></td>
			</tr>
			<tr>
				<td><input type="hidden" name="id" value=<?php echo $_GET['id'];?>></td>
				<td><input type="submit" name="update" value="Update"></td>
			</tr>
		</table>
	</form>
</body>
</html>