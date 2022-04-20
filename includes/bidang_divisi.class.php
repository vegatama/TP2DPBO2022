<?php

class BidangDivisi extends DB
{
    function getBidangDivisi()
    {
        $query = "SELECT * FROM bidang_divisi";
        return $this->execute($query);
    }

    function getTableBidangDivisi()
    {
        $query = "SELECT bidang_divisi.id_bidang, divisi.nama_divisi, bidang_divisi.jabatan FROM bidang_divisi INNER JOIN divisi ON
                      divisi.id_divisi = bidang_divisi.id_divisi";
        return $this->execute($query);
    }

    function addBidangDivisi()
    {
        $nama = $_POST['nama'];
        $divisi = $_POST['divisi'];

        $query = "INSERT INTO bidang_divisi (jabatan, id_divisi) VALUES ('$nama', '$divisi')";
        return $this->execute($query);
    }

    function deleteBidangDivisi()
    {
        $id = $_GET['id_delete'];

        $query = "DELETE FROM bidang_divisi WHERE id_bidang = '$id'";
        return $this->execute($query);
    }
}
