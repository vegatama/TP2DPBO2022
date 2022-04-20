<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/divisi.class.php");

$divisi = new Divisi($db_host, $db_user, $db_pass, $db_name);
$divisi->open();

if (isset($_POST['addDivisi'])) {
    $divisi->addDivisi();
    $divisi->close();
    header("location:divisi.php");
}
if (isset($_GET['id_delete'])) {
    $divisi->deleteDivisi();
    $divisi->close();
    header("location:divisi.php");
}

$divisi->getTableDivisi();
$datadivisi = null;
while (list($id, $nama) = $divisi->getResult()) {
    $datadivisi .= "<tr>" .
        "<th scope = 'row'>" . "{$id}" . "</th>" .
        "<td>" . "{$nama}" . "</td>" .
        "<td>" . "<a href = 'divisi.php?id_delete=" . "{$id}" . "'>" .
        "<button class = 'btn btn-outline-danger' onclick = 'deleteSuccess()'>Delete</button>" .
        "</a>" . "</td>" .
        "</tr>";
}

$divisi->close();

$view = new Template("templates/divisi.html");
$view->replace("DATA_TABEL", $datadivisi);
$view->write();
