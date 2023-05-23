<?php


if (isset($_POST['tambah'])) {

	// cek koneksi ke database
	require 'function.php';

   // jika tombol simpan di klik
	$id 		= $_POST['id'];
	$title_article         = $_POST['title_article'];
	$content            =$_POST['content'];
	$namaFile 				= $_FILES['foto']['name'];
	$namaSementara 		    = $_FILES['foto']['tmp_name'];
	$dirUpload 				= "terupload/";
	$terupload 				= move_uploaded_file($namaSementara, $dirUpload.$namaFile);
	if ($terupload) {
	    echo "Upload success!<br/>";
	    echo "Link: <a href='".$dirUpload.$namaFile."'>".$namaFile."</a>";
	} else {
	    echo "Upload fail!";
	}
	$sql = "UPDATE articles SET title_article='$title_article', content='$content', namaFile='$namaFile' WHERE id='$id'";

	if (mysqli_query($conn, $sql))  {
		header("location:manageArticle.php");
	}else{
        header("location:manageArticle.php");
	}
}else{

	echo '<script>window.history.back()</script>';
}
?>