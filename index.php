<?php

include("conf.php");
include("includes/Template.class.php");
include("includes/DB.class.php");
include("includes/divisi.class.php");
include("includes/pengurus.class.php");
include("includes/bidang_divisi.class.php");

$pengurus = new Pengurus($db_host, $db_user, $db_pass, $db_name);
$pengurus->open();
$pengurus->getPengurus();

$datapengurus = null;
$datapengurus .= "<div class='row row-cols-1 row-cols-md-3 g-4'>";

while(list($nim, $nama, $semester, $id_divisi, $divisi, $jabatan) = $pengurus->getResult())
{
    $datapengurus .=  "<a href = 'detail.php?id=" . "{$nim}" . 
                    "' class = 'text-decoration-none'>" . 
                    "<div class='card h-100'>" .
                    "<div style='text-align:center'>" .
                    "<img src = 'assets/img/default1.png' style='width:200px; height:200px;'/>" .
                    "<div class='card text-center'>" .
                    "<div class = 'card-body'>" .
                    "<h5 class='nama-pengurus'>" . "{$nama}" . "</h5>" .
                    "<p class='jabatan'>" . "{$jabatan}" . "</p>" .
                    "</div>" . "</div>" . "</div>" . "</div>" . "</a>";
}

$pengurus->close();


$view = new Template("templates/index.html");
$view->replace("DATA_PENGURUS", $datapengurus);
$view->write();
