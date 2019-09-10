<?php
    include "plugins/config.php";
    
    $id = $_POST['id'];
    // Mencegah MySQL injection
    $id_ = stripslashes($id);
    $id__ = mysqli_real_escape_string($con, $id_); 

    $selectinovasi = mysqli_query($con,"SELECT nip, namadiklat, tahun, kelompok, jenis_inovasi, judul, latarbelakang, manfaat, milestone, (SELECT nama FROM peserta WHERE nip = (SELECT nip FROM inovasi WHERE id = '".$id__."')) AS nama, (SELECT jabatan FROM peserta WHERE nip = (SELECT nip FROM inovasi WHERE id = '".$id__."')) AS jabatan, (SELECT skpd FROM peserta WHERE nip =( SELECT nip FROM inovasi WHERE id = '".$id__."')) AS skpd, (SELECT pemda FROM peserta WHERE nip=(SELECT nip FROM inovasi WHERE id = '".$id__."')) AS pemda FROM inovasi WHERE id = '".$id__."'");
    $no=0;
    $datainovasi=array();
    while($baris=mysqli_fetch_array($selectinovasi)){
        $no++;
        //echo $baris['judul'];
        array_push($datainovasi,
            [
                "namadiklat" => $baris["namadiklat"],
                "tahun" => $baris["tahun"],
                "kelompok" => $baris["kelompok"],
                "jenisinovasi" => $baris["jenis_inovasi"],
                "judul" => strtoupper(htmlspecialchars($baris["judul"])),
                "latarbelakang" => $baris["latarbelakang"],
                "manfaat" => $baris["manfaat"],
                "milestone" => $baris["milestone"],
                "nip" => htmlspecialchars($baris["nip"]),
                "nama" => htmlspecialchars($baris["nama"]),
                "jabatan" => htmlspecialchars($baris["jabatan"]),
                "skpd" => htmlspecialchars($baris["skpd"]),
                "pemda" => htmlspecialchars($baris["pemda"])
            ]
            );
    }
    echo json_encode($datainovasi);
