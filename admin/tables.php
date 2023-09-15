<?php
session_start();
require_once "../db.php";
?>

<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tables</title>
    <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
    <script src="https://cdn.jsdelivr.net/npm/jquery@3.5.1/dist/jquery.slim.min.js"></script>
</head>
<style>
    .pagination-link {
        background: #fff;
        color: #000 !important;
    }

    .is-current {
        background: #0110 !important;
        border-color: #000 !important;
    }

    th,
    td {
        border: 1px solid #0101 !important;
        text-align: center !important;
        padding: 0px;
        margin: 0px;
        font-size: 1.0rem;
    }

    #Table {
        margin-top: 2%;
    }

    .is-half {
        margin-top: 2% !important;
    }

    .hover-btn:hover {
        transition: 0.2s;
    }

    .hover-btn:hover {
        background: #3e8ed0 !important;
        color: #fff !important;
    }

    input[type="search"] {
        width: 200px !important;
        height: 40px !important;
        float: right !important;
    }

    #Table_filter {
        float: right;
    }

    .zoom {
        width: 100px;
        height: 100px;

        cursor: pointer;
        -webkit-transition-property: all;
        -webkit-transition-duration: 0.3s;
        -webkit-transition-timing-function: ease;
    }

    .zoom:hover {
        transform: scale(2);
        border-radius: 50%;


    }
</style>

<body>
    <div id="app" style="background-color:#cccccc !important;">

        <?php include("header.php");

        // DELETE ACTIVITY
        // if (isset($_GET['del'])) {
        //     db("DELETE FROM activities WHERE id=" . (intval($_GET['del'])) . ";");
        //     echo "<script>window.location.reload;</script>";
        // } else if (isset($_GET['delwork'])) {
        //     db("DELETE FROM workinfo WHERE id=" . (intval($_GET['delwork'])) . ";");
        //     echo "<script>window.location.href = 'tables.php#ลา';</script>";
        // }
        
        ?>
        <section class="section is-main-section">
            <div class="card has-table">
                <header class="card-header">
                </header>
                <div class="card-content ">
                    <div class="has-pagination" style="margin:auto;">
                        <div class="table-wrapper has-mobile-cards p-5">
                            <h2 align="left" style="font-size:1.5rem;">ค้นหาช่วงข้อมูล</h2>
                            <form style="display:flex;" class="mb-5  mt-5" action="#">
                                <div style="width:50%;">
                                    <p>วันที่เริ่มต้น</p>
                                    <input required name="dateStart" class="input" type="date" placeholder="dateStart">
                                </div>
                                <div style="width:50%;">
                                    <p>วันที่สิ้นสุด</p>
                                    <input required name="dateEnd" class="input" type="date" placeholder="dateStart">
                                </div>
                                <input type="text" hidden value="true" name="datefilter">
                                <input type="text" hidden value="กิจกรรม" name="table">
                                <button class="button is-primary  mt-5">ค้นหา</button>
                            </form>

                            <?PHP

                            $dat_st = $_REQUEST['dateStart'];
                            $dat_en = $_REQUEST['dateEnd'];
                            if ($dat_st == '') {
                                include "list_all.php";
                            } else {

                                include "list_1.php";
                            }

                            ?>
                        </div>
                    </div>
                    <!-- WorkinfoTable -->
                    <div class="card-content">
                        <div class="b-table has-pagination" style="padding:2%;">
                        </div>
                    </div>
                </div>
            </div>
    </div>
    </section>

    <section class="section is-main-section" style="background-color:#cccccc !important;">
        <div class="card">
            <div class="card-content">
                <div class="chart-area">
                    <div style="height: 100%;">
                        <div class="chartjs-size-monitor">
                            <div class="chartjs-size-monitor-expand">
                                <div></div>
                            </div>
                            <div class="chartjs-size-monitor-shrink">
                                <div></div>
                            </div>
                        </div>
                        <section class="hero is-hero-bar" style="border:none !important;">
                            <div class="hero-body">
                                <center>
                                    <h1 class="title" style="font-size:25px !important;">ตารางการลา</h1>
                                </center>
                            </div>
                        </section>
                        <div class="card-content" style="border:none !important;">
                            <div class="b-table has-pagination" style="padding:2%;">
                                <h2 align="left" style="font-size:1.5rem;">ค้นหาช่วงข้อมูล</h2>
                                <form style="display:flex;" class="mb-5  mt-5" action="#">
                                    <div style="width:50%;">
                                        <p>วันที่เริ่มต้น</p>
                                        <input name="dateStart2" class="input" type="date" placeholder="dateStart">
                                    </div>
                                    <div style="width:50%;">
                                        <p>วันที่สิ้นสุด</p>
                                        <input name="dateEnd2" class="input" type="date" placeholder="dateStart">
                                    </div>
                                    <input type="text" hidden value="true" name="datefilter">
                                    <input type="text" hidden value="ลา" name="table">
                                    <button class="button is-primary  mt-5">ค้นหา</button>
                                </form>



                                <?PHP

                                $dat_st2 = $_REQUEST['dateStart2'];
                                $dat_en2 = $_REQUEST['dateEnd2'];
                                if ($dat_st2 == '') {
                                    include "list_all2.php";
                                } else {

                                    include "list_la_select.php";
                                }

                                ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>






    <?php include "footer.php"; ?>

    <div id="sample-modal" class="modal">
        <div class="modal-background jb-modal-close"></div>
        <div class="modal-card">
            <header class="modal-card-head">
                <p class="modal-card-title">Confirm action</p>
                <button class="delete jb-modal-close" aria-label="close"></button>
            </header>
            <section class="modal-card-body">
                <p>This will permanently delete <b>Some Object</b></p>
                <p>This is sample modal</p>
            </section>
            <footer class="modal-card-foot">
                <button class="button jb-modal-close">Cancel</button>
                <button class="button is-danger jb-modal-close">Delete</button>
            </footer>
        </div>
        <button class="modal-close is-large jb-modal-close" aria-label="close"></button>
    </div>
    </div>

    <!-- Scripts below are for demo only -->
    <script type="text/javascript" src="js/main.min.js"></script>

    <!-- Icons below are for demo only. Feel free to use any icon pack. Docs: https://bulma.io/documentation/elements/icon/ -->
    <link rel="stylesheet" href="https://cdn.materialdesignicons.com/4.9.95/css/materialdesignicons.min.css">
</body>
<script>
    const exporter = [{
        extend: 'pdf',
        "pageSize": 'A4',
        text: '<span class="mdi mdi-file-pdf-box" style="color:#fff !important;font-size:20px;"></span>',
        customize: function (doc) {
            pdfMake.fonts = {
                THSarabun: {
                    normal: 'THSarabun.ttf',
                    bold: 'THSarabun-Bold.ttf',
                    italics: 'THSarabun-Italic.ttf',
                    bolditalics: 'THSarabun-BoldItalic.ttf'
                }
            };
            // modify the PDF to use a different default font:
            doc.defaultStyle.font = "THSarabun";
            doc.defaultStyle.fontSize = 16
        }
    },
    {
        extend: "copy",
        text: '<span class="mdi mdi-content-copy" style="color:#fff !important;font-size:20px;"></span>'
    },
    {
        extend: "csv",
        text: '<span class="mdi mdi-file-delimited" style="color:#fff !important;font-size:20px;"></span>'
    },
    {
        extend: "excel",
        text: '<span class="mdi mdi-file-excel" style="color:#fff !important;font-size:20px;"></span>'
    },
    {
        extend: "print",
        text: '<span class="mdi mdi-printer" style="color:#fff !important;font-size:20px;"></span>'
    }
    ]
    const table = new DataTable("#Table", {
        responsive: true,
        dom: 'Bfrtip',
        buttons: exporter
    });
    new DataTable("#Work", {
        responsive: true,
        dom: 'Bfrtip',
        buttons: exporter
    });
    // Add event listener for opening and closing details
    table.on('click', 'td.dt-control', function (e) {
        let tr = e.target.closest('tr');
        let row = table.row(tr);

        if (row.child.isShown()) {
            // This row is already open - close it
            row.child.hide();
        }
        else {
            // Open this row
            row.child(format(row.data())).show();
        }
    });
</script>

</html>