<?php 

if (isset($_GET['p'])) {
	$p = $_GET['p'];

	switch ($p) {
		case 'home':
			include 'home.php';
			break;
		case 'data-siswa':
			include 'data/siswa.php';
			break;
		case 'hapus-siswa':
			include 'data/aksi/hapus_siswa.php';
			break;	
		case 'hapus-guru':
			include 'data/aksi/hapus_guru.php';
			break;
		case 'hapus-kelas':
			include 'kelas/hapus.php';
			break;
		case 'data-guru':
			include 'data/guru.php';
			break;
		case 'data-admin':
			include 'data/admin.php';
			break;

		case 'data-kelas':
			include 'kelas/view.php';
			break;
		case 'data-absensi':
			include 'absensi/view.php';
			break;	
		case 'hapus-absensi':
			include 'absensi/hapus.php';
			break;
		case 'show':
			include 'absensi/show.php';
			break;

		case 'data-materi':
			include 'materi/view.php';
			break;

		case 'hapus-materi':
			include 'materi/hapus.php';
			break;

		case 'data-kelompok':
			include 'kelompok/view.php';
			break;

		case 'anggota':
			include 'kelompok/anggota.php';
			break;
		case 'hapus-anggota':
			include 'kelompok/hapus_anggota.php';
			break;

		case 'buka-forum-diskusi':
			include 'kelompok/diskusi/view.php';
			break;
		case 'forum-diskusi':
			include 'kelompok/diskusi/view_pertemuan.php';
			break;

		case 'data-tugas':
			include 'tugas/view.php';
			break;
		case 'hapus-tugas':
			include 'tugas/hapus.php';
			break;
		case 'jawaban':
			include 'tugas/jawaban.php';
			break;

		case 'data-nilai':
			include 'nilai/view.php';
			break;
		case 'hapus-nilai':
			include 'nilai/hapus.php';
			break;

		case 'profil':
			include 'profil/view.php';
			break;

		case 'index-prestasi-pilih-kelas':
			include 'kelompok/index_prestasi/view_kelas.php';
			break;
		case 'index-prestasi-view-siswa':
			include 'kelompok/index_prestasi/view_siswa.php';
			break;

		default:
			// code...
			break;
	}
}


 ?>