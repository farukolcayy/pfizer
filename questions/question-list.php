﻿<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sorular</title>
    <link rel="shortcut icon" type="image/png" href="/assets/img/favicon_new.png">

    <link href="https://fonts.googleapis.com/css?family=Lato:300,400,400i,700|Poppins:300,400,500,600,700|PT+Serif:400,400i&display=swap" rel="stylesheet" type="text/css" />
    <link rel="stylesheet" href="/assets/vendor/bootstrap/css/bootstrap.min.css" type="text/css" />
    <link rel="stylesheet" href="/assets/css/bs-datatable.css" type="text/css" />

</head>
<style>
    #workshopArea {
        display: inline-block;
        overflow: scroll;
        height: 100px;
    }

    #exportButton {
        color: white;
    }

    .button {
        display: inline-block;
        position: relative;
        cursor: pointer;
        outline: none;
        white-space: nowrap;
        margin: 5px;
        padding: 8px 22px;
        font-size: 0.875rem;
        line-height: 24px;
        background-color: #1ABC9C;
        color: #FFF;
        font-weight: 700;
        text-transform: uppercase;
        letter-spacing: 1px;
        border: none;
        text-shadow: 1px 1px 1px rgba(0, 0, 0, 0.2);
    }

    .button-blue {
        background-color: #1265A8;
    }

    .button.button-rounded {
        border-radius: 3px;
    }

    .button.button-3d {
        border-radius: 3px;
        box-shadow: inset 0 -3px 0 rgba(0, 0, 0, 0.15);
        -webkit-transition: none;
        -o-transition: none;
        transition: none;
    }

    body:not(.device-touch) .button {
        -webkit-transition: all .2s ease-in-out;
        -o-transition: all .2s ease-in-out;
        transition: all .2s ease-in-out;
    }

    #ftco-loader {
        position: fixed;
        width: 96px;
        height: 96px;
        left: 50%;
        top: 50%;
        -webkit-transform: translate(-50%, -50%);
        -ms-transform: translate(-50%, -50%);
        transform: translate(-50%, -50%);
        background-color: rgba(255, 255, 255, 0.9);
        -webkit-box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
        box-shadow: 0px 24px 64px rgba(0, 0, 0, 0.24);
        border-radius: 16px;
        opacity: 0;
        visibility: hidden;
        -webkit-transition: opacity .2s ease-out, visibility 0s linear .2s;
        -o-transition: opacity .2s ease-out, visibility 0s linear .2s;
        transition: opacity .2s ease-out, visibility 0s linear .2s;
        z-index: 1000;
    }

    #ftco-loader.fullscreen {
        padding: 0;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        -webkit-transform: none;
        -ms-transform: none;
        transform: none;
        background-color: #fff;
        border-radius: 0;
        -webkit-box-shadow: none;
        box-shadow: none;
    }

    #ftco-loader.show {
        -webkit-transition: opacity .4s ease-out, visibility 0s linear 0s;
        -o-transition: opacity .4s ease-out, visibility 0s linear 0s;
        transition: opacity .4s ease-out, visibility 0s linear 0s;
        visibility: visible;
        opacity: 1;
    }

    #ftco-loader .circular {
        -webkit-animation: loader-rotate 2s linear infinite;
        animation: loader-rotate 2s linear infinite;
        position: absolute;
        left: calc(50% - 24px);
        top: calc(50% - 24px);
        display: block;
        -webkit-transform: rotate(0deg);
        -ms-transform: rotate(0deg);
        transform: rotate(0deg);
    }

    #ftco-loader .path {
        stroke-dasharray: 1, 200;
        stroke-dashoffset: 0;
        -webkit-animation: loader-dash 1.5s ease-in-out infinite;
        animation: loader-dash 1.5s ease-in-out infinite;
        stroke-linecap: round;
    }

    @-webkit-keyframes loader-rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @keyframes loader-rotate {
        100% {
            -webkit-transform: rotate(360deg);
            transform: rotate(360deg);
        }
    }

    @-webkit-keyframes loader-dash {
        0% {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
        }

        50% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -35px;
        }

        100% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -136px;
        }
    }

    @keyframes loader-dash {
        0% {
            stroke-dasharray: 1, 200;
            stroke-dashoffset: 0;
        }

        50% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -35px;
        }

        100% {
            stroke-dasharray: 89, 200;
            stroke-dashoffset: -136px;
        }
    }
</style>

<body>
    <!-- loader -->
    <div id="ftco-loader" class="show fullscreen"><svg class="circular" width="48px" height="48px">
            <circle class="path-bg" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke="#eeeeee" />
            <circle class="path" cx="24" cy="24" r="22" fill="none" stroke-width="4" stroke-miterlimit="10" stroke="#F96D00" />
        </svg></div>
    <!-- Content
		============================================= -->
    <section id="content">
        <div class="content-wrap">
            <div class="container clearfix">
                <div class="row" style="margin-top: 30px;">
                    <div class="col-md-3">
                        <a id="exportButton" class="button button-3d button-rounded button-blue"><i class="icon-book3"></i>Dışa Aktar</a>
                    </div>
                    <div class="col-md-3" style="margin-top: 12px;">
                        <a id="totalApply" style="border: 2px solid red;padding:10px;"></a>
                    </div>
                </div>
                <div class="table-responsive">
                    <table style="display:none;" id="datatable2">
                        <thead>
                            <tr>
                                <th>Id</th>
                                <th>Ad</th>
                                <th>Soyad</th>
                                <th>Soru</th>
                                <th>Tarih</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            if (!$link = mysql_connect('localhost', 'pfizerkariyer_pfizerkariyer', '2021pfizer?')) {
                                echo 'mysql\'e bağlanamadı';
                                exit;
                            }

                            if (!mysql_select_db('pfizerkariyer_pfizerkariyer', $link)) {
                                echo 'Veritabanı seçilemedi';
                                exit;
                            }

                            $sql    = 'SELECT * FROM live_questions GROUP by question ORDER BY addTime DESC';
                            mysql_set_charset('utf8', $link);
                            $result = mysql_query($sql, $link);

                            if (!$result) {
                                echo "Veritabanı hatası, veritabanı sorgulanamıyor\n";
                                echo 'MySQL Hatası: ' . mysql_error();
                                exit;
                            }

                            while ($row = mysql_fetch_assoc($result)) {
                                echo '<tr>';
                                echo '<td>' . $row['Id'] . '</td>';
                                echo '<td>' . $row['name'] . '</td>';
                                echo '<td>' . $row['surname'] . '</td>';
                                echo '<td>' . $row['question'] . '</td>';
                                echo '<td>' . $row['applyDate'] . '</td>';
                                echo '</tr>';
                            }

                            mysql_free_result($result);

                            ?>
                        </tbody>
                    </table>
                    <div class="container-fluid">
                        <div class="table-responsive" style="overflow-x: inherit;">
                            <table id="datatable1" class="table data-table table-striped table-bordered" cellspacing="0" width="100%">
                                <thead>
                                    <tr>
                                        <th>Id</th>
                                        <th>Ad</th>
                                        <th>Soyad</th>
                                        <th>Soru</th>
                                        <th>Tarih</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php
                                    if (!$link = mysql_connect('localhost', 'pfizerkariyer_pfizerkariyer', '2021pfizer?')) {
                                        echo 'mysql\'e bağlanamadı';
                                        exit;
                                    }

                                    if (!mysql_select_db('pfizerkariyer_pfizerkariyer', $link)) {
                                        echo 'Veritabanı seçilemedi';
                                        exit;
                                    }

                                    $sql    = 'SELECT * FROM live_questions GROUP by question ORDER BY addTime DESC';
                                    mysql_set_charset('utf8', $link);
                                    $result = mysql_query($sql, $link);

                                    if (!$result) {
                                        echo "Veritabanı hatası, veritabanı sorgulanamıyor\n";
                                        echo 'MySQL Hatası: ' . mysql_error();
                                        exit;
                                    }

                                    while ($row = mysql_fetch_assoc($result)) {
                                        echo '<tr>';
                                        echo '<td>' . $row['Id'] . '</td>';
                                        echo '<td>' . $row['name'] . '</td>';
                                        echo '<td>' . $row['surname'] . '</td>';
                                        echo '<td>' . $row['question'] . '</td>';
                                        echo '<td>' . $row['applyDate'] . '</td>';
                                        echo '</tr>';
                                    }

                                    mysql_free_result($result);

                                    ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section><!-- #content end -->

    <script src='https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js'></script>

    <!-- Bootstrap Data Table Plugin -->
    <script src="/assets/js/bs-datatable.js"></script>

    <!-- Footer Scripts
	============================================= -->
    <script src="/assets/js/jquery.table2excel.js"></script>

    <script>
        $(document).ready(function() {
            // $('#datatable1').dataTable();
            $('#datatable1').dataTable({
                "ordering": true
            });

            $("#exportButton").click(function() {
                $("#datatable2").table2excel({
                    name: "basvurular",
                    filename: "basvurular", //do not include extension
                    fileext: ".xls" // file extension
                });
            });

            var textUnder = $("#datatable1_info").text();
            $("#totalApply").text("Toplam Soru : " + textUnder.substr(0, textUnder.indexOf(' ')));

            $('#ftco-loader').removeClass('show');
        });
    </script>
</body>

</html>