<?php
require "config.php";

$id = $_GET["buku_id"];

if ( hapus($id) > 0 ) {
	echo"
		<script>
			alert('data berhasil dihapus!');
			document.location.href = 'buku.php';
		</script>
	";
} else {
	echo"
		<script>
			alert('data gagal dihapus!');
			document.location.href = 'buku.php';
		</script>
	";
}
?>