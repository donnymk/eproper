<?php

include "plugins/config.php";

$no = 0;
if (isset($_POST['namadiklat'])) {
    // load semua data RTL
    if ($_POST['namadiklat'] == 'semua') {
        //jika dipilih SEMUA diklat
        $selectinovasi = mysqli_query($con, "SELECT rtl.id_rtl, rtl.ruanglingkup, rtl.judul, rtl.status, peserta.nama FROM rtl INNER JOIN peserta ON rtl.nip = peserta.nip WHERE status=1 AND rtl.asalpeserta='internal' ORDER BY rtl.tglsubmit DESC ");
    }
    // load data RTL berdasarkan nama diklat dan tahun
    else {
        // pecah nilai untuk mendapatkan data nama diklat dan tahun diklat
        $data_diklat = explode("|", $_POST['namadiklat']);
        $nama_diklat = $data_diklat[0]; // nama diklat
        $tahun_diklat = $data_diklat[1]; // tahun diklat
        //
        // Mencegah MySQL injection
        $nama_diklat_ = stripslashes($nama_diklat);
        $nama_diklat__ = mysqli_real_escape_string($con, $nama_diklat_);

        $tahun_diklat_ = stripslashes($tahun_diklat);
        $tahun_diklat__ = mysqli_real_escape_string($con, $tahun_diklat_);

        //jika nama diklatnya dipilih dari dropdown
        $selectinovasi = mysqli_query($con, "SELECT rtl.id_rtl, rtl.ruanglingkup, rtl.judul, rtl.status, peserta.nama FROM rtl INNER JOIN peserta ON rtl.nip = peserta.nip WHERE namadiklat='" . $nama_diklat__ . "' AND tahun='" . $tahun_diklat__ . "' AND status=1 AND rtl.asalpeserta='internal' ORDER BY rtl.tglsubmit DESC");
    }
}


if (mysqli_num_rows($selectinovasi) == 0) {
    //echo '<tr><td colspan="4"><center>Tidak ada data</center></td></tr>';
    echo '<tr><td></td><td>Tidak ada data</td><td></td></tr>';
} else {
    while ($baris = mysqli_fetch_array($selectinovasi)) {
        $no++;
        echo '<tr><td><center>' . $no . '</center></td><td><a class="tautan" href="rtl_fungsional.php?id=' . htmlspecialchars($baris['id_rtl']) . '">' . strtoupper(htmlspecialchars($baris['judul'])) . '</a></td><td>' . htmlspecialchars(
                $baris['nama']) . '</td></tr>';
    }
}
