<?php
	include('config.php');
	include('fungsi.php');

	
	if(isset($_GET['jenis']) && isset($_GET['id'])) {
		$id 	= $_GET['id'];
		$jenis	= $_GET['jenis'];

		
		$query 	= "SELECT nama FROM $jenis WHERE id=$id";
		$result	= mysqli_query($koneksi, $query);
		
		while ($row = mysqli_fetch_array($result)) {
			$nama = $row['nama'];
		}
	}

	if (isset($_POST['update'])) {
		$id 	= $_POST['id'];
		$jenis	= $_POST['jenis'];
		$nama 	= $_POST['nama'];

		$query 	= "UPDATE $jenis SET nama='$nama' WHERE id=$id";
		$result	= mysqli_query($koneksi, $query);

		if (!$result) {
			echo "Update gagal";
			exit();
		} else {
			header('Location: '.$jenis.'.php');
			exit();
		}
	}

	include('navbar.php');
?>

<section class="content container mt-5 justify-content-center text-center">
	<h2>Edit <?php echo $jenis?></h2>

	<form class="ui form" method="post" action="edit.php">
		<div class="inline field">
			<label>Nama <?php echo $jenis ?> : </label>
			<input type="text" name="nama" value="<?php echo $nama?>">
			<input type="hidden" name="id" value="<?php echo $id?>">
			<input type="hidden" name="jenis" value="<?php echo $jenis?>">
		</div>
		<br>
		<input class="ui green button" type="submit" name="update" value="UPDATE">
	</form>
</section>