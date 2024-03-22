<?php 
/*
	Created by Angga Haady Wijaya
      3 Maret 2024
  Mau Custom Web Ucapan Online? DM aja di!!
* Instagram = angga_hdyy
*/

// koneksi ke database
$conn = mysqli_connect("localhost","root","","db_perpustakaan");

function registrasi($data) {
	global $conn;

	$username = $data["username"];
	$password = mysqli_real_escape_string($conn, $data["password"]);
	$password2 = mysqli_real_escape_string($conn, $data["password2"]);

	// username sudah ada apa belum
	$result = mysqli_query($conn, "SELECT username FROM user WHERE username = '$username'");
	if( mysqli_fetch_assoc($result) ) {
		echo "<script>
		alert('username sudah terdaftar');
		</script>";
		return false;
	}

	// cek confirm password sama atau tidak
	if( $password !== $password2 ) {
		echo "<script>
			alert('konfirmasi password tidak sesuai');
			</script>";
		return false;
	}
	// enkripsi password
	$password = md5($password);

	// tambahkan userbaru ke databases
	mysqli_query($conn, "INSERT INTO user VALUES('','$username','$password','','','')");

	return mysqli_affected_rows($conn);
}

function tambah($data) {
	global $conn;

	// ambil data dari tiap elemen dalam form
	$judul = $data["judul"];
	$penulis = $data["penulis"];
	$penerbit = $data["penerbit"];
	$thn_terbit = $data["thn_terbit"];
	$gambar = $data["gambar"];

	// query insert data
	$query = "INSERT INTO buku VALUES
	('', '$judul', '$penulis', '$penerbit', '$thn_terbit', '$gambar')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function buku($buku) {
	global $conn;

	$result = mysqli_query($conn, $buku);
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function hapus($id) {
	global $conn;
	mysqli_query($conn, "DELETE FROM buku WHERE buku_id = $id");
	return mysqli_affected_rows($conn);
}

function peminjam($data) {
	global $conn;

	// ambil data dari tiap elemen dalam form
	$judul = $data["judul"];
	$nama = $data["nama"];
	$pinjam = $data["pinjam"];
	$kembali = $data["kembali"];
	$status = $data["status"];

	// query insert data
	$query = "INSERT INTO peminjaman VALUES
	('', '$nama', '$judul', '$pinjam', '$kembali', '$status')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}

function pinjaman($data) {
	global $conn;

	$result = mysqli_query($conn, $data);
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function ubahstatus($data) {
	global $conn;

	$id = $data["id"];
	$username = $data["username"];
	$judul = $data["judul"];
	$pinjam = $data["pinjam"];
	$kembali = $data["kembali"];
	$status = $data["status"];

	$query = "UPDATE peminjaman SET
		peminjaman = '$id',
		username = '$username',
		judul = '$judul',
		tgl_peminjaman = '$pinjam',
		tgl_pengembalian = '$kembali',
		status_peminjaman = '$status' WHERE peminjaman=$id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function ubah($data) {
	global $conn;

	$id = $data["buku_id"];
	$judul = $data["judul"];
	$penulis = $data["penulis"];
	$penerbit = $data["penerbit"];
	$tahun = $data["thn_terbit"];
	$gambar = $data["gambar"];

	$query = "UPDATE buku SET
		judul = '$judul',
		penulis = '$penulis',
		penerbit = '$penerbit',
		thn_terbit = '$tahun',
		gambar = '$gambar' WHERE buku_id=$id";

	mysqli_query($conn, $query);
	return mysqli_affected_rows($conn);
}

function user($data) {
	global $conn;

	$result = mysqli_query($conn, $data);
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function koleksi($data) {
	global $conn;

	$result = mysqli_query($conn, $data);
	while ( $row = mysqli_fetch_assoc($result) ) {
		$rows[] = $row;
	}
	return $rows;
}

function simpankoleksi($data) {
	global $conn;

	$judul = $data["judulsimpan"];
	$user = $data["username"];

	// query insert data
	$query = "INSERT INTO koleksi VALUES
	('', '$user', '$judul')";
	mysqli_query($conn, $query);

	return mysqli_affected_rows($conn);
}




	

?>