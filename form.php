<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/divisi.class.php");
include("includes/pengurus.class.php");
include("includes/bidang_divisi.class.php");

if(isset($_POST['add']))
{
    $pengurus = new Pengurus($db_host, $db_user, $db_pass, $db_name);
    $pengurus->open();
    $pengurus->addData();
    $pengurus->close();

    header("location:index.php");
}

$bidangDivisi = new BidangDivisi($db_host, $db_user, $db_pass, $db_name);
$bidangDivisi->open();
$bidangDivisi->getBidangDivisi();

$databidangDivisi = null;
while(list($id, $nama, $id_divisi) = $bidangDivisi->getResult())
{
    $databidangDivisi .= "<option value = {$id}>" . "{$nama}" . "</option>";
}

$bidangDivisi->close();

$view = new Template("templates/form.html");
$view->replace("DATA_BIDANG", $databidangDivisi);
$view->write();

?>