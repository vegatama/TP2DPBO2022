<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/pengurus.class.php");

if (isset($_GET['id'])) {
    $pengurus = new Pengurus($db_host, $db_user, $db_pass, $db_name);
    $pengurus->open();
    $pengurus->getData($_GET['id']);

    $result = $pengurus->getResult();
    $nim = $result['nim'];
    $nama = $result['nama'];
    $semester = $result['semester'];
    $divisi = $result['nama_divisi'];
    $jabatan = $result['jabatan'];
    $pengurus->close();

    $datapengurus = null;
    $datapengurus .=    "<div class='card h-100'>" .
        "<div style='text-align:center'>" .
        "<img src = 'assets/img/default1.png' style='width:200px; height:200px;'/>" .
        "<div class='card text-center'>" .
        "<div class = 'card-body'>" .
        "<h5 class='nama-pengurus'>" . "{$nama}" . "</h5>" .
        "<p class='jabatan'>" . "{$jabatan}" . "</p>" .
        "<p class = 'divisi'>" . "{$divisi}" . "</p>" .
        "<button class = 'btn btn-outline-primary me-3'>Edit</button>" .
        "<a href = 'detail.php?id_delete=" . "{$_GET['id']}" . "'>" .
        "<button class = 'btn btn-outline-danger' onclick = 'deleteSuccess()'>Delete</button>" . "</a>" .
        "</div>" . "</div>" . "</div>" . "</div>";


    $view = new Template("templates/detail.html");
    $view->replace("DATA_DETAIL", $datapengurus);
    $view->write();
}
if (isset($_GET['id_delete'])) {
    $pengurus = new Pengurus($db_host, $db_user, $db_pass, $db_name);
    $pengurus->open();
    $pengurus->deleteData();
    $pengurus->close();

    header("location:index.php");
}
