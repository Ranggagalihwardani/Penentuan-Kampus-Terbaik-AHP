<head>
	<link rel="stylesheet" type="text/css" href="semantic/dist/semantic.min.css">
</head>
<?php 
	include('config.php');
	include('fungsi.php');

	
	if(isset($_POST['edit'])) {
		$id = $_POST['id'];

		header('Location: edit.php?jenis=alternatif&id='.$id);
		exit();
	}

	
	if(isset($_POST['delete'])) {
		$id = $_POST['id'];
		deleteAlternatif($id);
	}

	
	if(isset($_POST['tambah'])) {
		$nama = $_POST['nama'];
		tambahData('alternatif',$nama);
	}

	include('navbar.php');

?>


<section class="content container mt-5">

	<h2 class="ui header">Alternatif</h2>

	<table class="ui celled table">
		<thead>
			<tr>
				<th class="collapsing">No</th>
				<th colspan="2">Nama Alternatif</th>
			</tr>
		</thead>
		<tbody>

		<?php
			
			$query = "SELECT id,nama FROM alternatif ORDER BY id";
			$result	= mysqli_query($koneksi, $query);

			$i = 0;
			while ($row = mysqli_fetch_array($result)) {
				$i++;
		?>
			<tr>
				<td><?php echo $i ?></td>
				<td><?php echo $row['nama'] ?></td>
				<td class="right aligned collapsing">
					<form method="post" action="alternatif.php">
						<input type="hidden" name="id" value="<?php echo $row['id'] ?>">
						<button type="submit" name="edit" class="ui mini teal left labeled icon button"><i class="right edit icon"></i>EDIT</button>
						<button type="submit" name="delete" class="ui mini red left labeled icon button"><i class="right remove icon"></i>DELETE</button>
					</form>
				</td>
			</tr>

<?php } ?>
	
		</tbody>
		<tfoot class="full-width">
			<tr>
				<th colspan="3">
					<a href="tambah.php?jenis=alternatif">
						<div class="ui right floated small primary labeled icon button">
						<i class="plus icon"></i>Tambah
						</div>
					</a>
				</th>
			</tr>
		</tfoot>
	</table>

	<br>


	<form action="bobot_kriteria.php">
	<button class="ui right labeled icon button" style="float: right;">
		<i class="right arrow icon"></i>
		Lanjut
	</button>
	</form>
</section>