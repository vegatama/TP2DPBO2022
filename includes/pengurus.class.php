<?php

    class Pengurus extends DB
    {
        function getPengurus()
        {
            $query = "SELECT pengurus.nim, pengurus.nama, pengurus.semester, 
                      divisi.id_divisi, divisi.nama_divisi, bidang_divisi.jabatan
                      FROM pengurus INNER JOIN bidang_divisi ON
                      pengurus.id_bidang = bidang_divisi.id_bidang INNER JOIN
                      divisi ON divisi.id_divisi = bidang_divisi.id_divisi 
                      ORDER BY pengurus.id_bidang";

            return $this->execute($query); 
        }

        function getData($id)
        {
            $query = "SELECT pengurus.nim, pengurus.nama, pengurus.semester, 
                      divisi.nama_divisi, bidang_divisi.jabatan FROM pengurus
                      INNER JOIN bidang_divisi ON
                      pengurus.id_bidang = bidang_divisi.id_bidang INNER JOIN
                      divisi ON divisi.id_divisi = bidang_divisi.id_divisi 
                      WHERE pengurus.nim = '$id'";

            return $this->execute($query); 
        }

        function addData()
        {
            $nim = $_POST['nim'];
            $nama = $_POST['nama'];
            $semester = $_POST['semester'];
            $divisi = $_POST['divisi'];

            $query = "INSERT INTO pengurus VALUES ('$nim', '$nama', '$semester', '$divisi')";
            return $this->execute($query);
        }

        function deleteData()
        {
            $nim = $_GET['id_delete'];

            $query = "DELETE FROM pengurus WHERE nim = '$nim'";
            return $this->execute($query);
        }
    }
