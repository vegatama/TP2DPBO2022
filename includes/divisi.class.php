<?php

class Divisi extends DB
{
    function getDivisi()
    {
        $query = "SELECT * FROM divisi";
        return $this->execute($query);
    }

    function getTableDivisi()
    {
        $query = "SELECT divisi.id_divisi, divisi.nama_divisi FROM divisi";
        return $this->execute($query);
    }

    function addDivisi()
    {
        $nama = $_POST['nama'];

        $query = "INSERT INTO divisi (nama_divisi) VALUES ('$nama')";
        return $this->execute($query);
    }

    function deleteDivisi()
    {
        $id = $_GET['id_delete'];

        $query = "DELETE FROM divisi WHERE id_divisi = '$id'";
        return $this->execute($query);
    }
}
