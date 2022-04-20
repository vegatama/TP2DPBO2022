<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/divisi.class.php");
include("includes/pengurus.class.php");
include("includes/bidang_divisi.class.php");

$bidangDivisi = new BidangDivisi($db_host, $db_user, $db_pass, $db_name);
$bidangDivisi->open();

if (isset($_POST['addbidangDivisi'])) {
    $bidangDivisi->addBidangDivisi();
    $bidangDivisi->close();
    header("location:bidangDivisi.php");
}
if (isset($_GET['id_delete'])) {
    $bidangDivisi->deleteBidangDivisi();
    $bidangDivisi->close();
    header("location:bidangDivisi.php");
}

$bidangDivisi->getTableBidangDivisi();
$databidangDivisi = null;
while (list($id, $divisi, $jabatan) = $bidangDivisi->getResult()) {
    $databidangDivisi .= "<tr>" .
        "<th scope = 'row'>" . "{$id}" . "</th>" .
        "<td>" . "{$divisi}" . "</td>" .
        "<td>" . "{$jabatan}" . "</td>" .
        "<td>" . "<a href = 'bidangDivisi.php?id_delete=" . "{$id}" . "'>" .
        "<button class = 'btn btn-outline-danger' onclick = 'deleteSuccess()'>Delete</button>" .
        "</a>" . "</td>" .
        "</tr>";
}

$bidangDivisi->close();

$divisi = new Divisi($db_host, $db_user, $db_pass, $db_name);
$divisi->open();
$divisi->getDivisi();

$datadivisi = null;
while (list($id, $name) = $divisi->getResult()) {
    $datadivisi .= "<option value = {$id}>" . "{$name}" . "</option>";
}

$divisi->close();

$view = new Template("templates/bidangDivisi.html");
$view->replace("DATA_DIVISI", $datadivisi);
$view->replace("DATA_TABEL", $databidangDivisi);
$view->write();
