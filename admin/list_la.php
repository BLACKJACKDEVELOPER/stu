<?php
session_start();
include "../db.php";
?>

<!DOCTYPE html>
<html lang="en" class="has-aside-left has-aside-mobile-transition has-navbar-fixed-top has-aside-expanded">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Tables</title>
    <link rel="shortcut icon" href="img/md.ico" type="image/x-icon">
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
        height: 30px !important;
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
    <div id="app">

        <?php include("header.php");

        // DELETE ACTIVITY
        if (isset($_GET['del'])) {
            new db("DELETE FROM activities WHERE id=" . (intval($_GET['del'])) . ";");
            echo "<script>window.location.reload;</script>";
        } else if (isset($_GET['delwork'])) {
            new db("DELETE FROM workinfo WHERE id=" . (intval($_GET['delwork'])) . ";");
            echo "<script>window.location.href = 'tables.php#ลา';</script>";
        }

        ?>
                <header class="card-header">
                        <!-- <p class="card-header-title">
                <a href="forms.php#ลา" class="button hover-btn">เพิ่มการลา</a>
            </p> -->
        </header>
        <div class="card-content">
            <div class="b-table has-pagination" style="padding:2%;">



                <?PHP 

                include "list_view_la.php";

            ?>





           <!--  <table id="Work" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                    <tr>
                        <th>ลำดับที่</th>
                        <th>วันที่ลา</th>
                        <th>ชื่อ</th>
                        <th>รายละเอียด</th>
                        <th>ประเภท</th>
                    </tr>
                    <tbody>

                        <?php
                        if (isset($_GET['datefilter']) && $_GET['table'] == 'ลา') {
                            $deline = db("SELECT * FROM workinfo WHERE STR_TO_DATE(dateStart,'%Y-%m-%d') >= '" . $_GET['dateStart'] . "' AND STR_TO_DATE(dateStart,'%Y-%m-%d') <= '" . $_GET['dateEnd'] . "';");
                        } else {
                            $deline = db("SELECT * FROM workinfo;");
                        }
                        foreach ($deline as $key => $value) { ?>

                            <tr>
                                <td>
                                    <?php echo $key + 1; ?>
                                </td>

                                <td>
                                    <?php


                                    $date = $value["dateStart"];
                                    $date_day = substr($date, 8, 2);
                                    $date_d = $date_day[0] == '0' ? $date_day[1] : $date_day;


                                                    // Sub Month
                                    $date_mon = substr($date, 5, 2);
                                    if ($date_mon == "01") {
                                        $date_m = "มกราคม";
                                    } else if ($date_mon == "02") {
                                        $date_m = "กุมภาพันธ์";
                                    } else if ($date_mon == "03") {
                                        $date_m = "มีนาคม";
                                    } else if ($date_mon == "04") {
                                        $date_m = "เมษายน";
                                    } else if ($date_mon == "05") {
                                        $date_m = "พฤษภาคม";
                                    } else if ($date_mon == "06") {
                                        $date_m = "มิถุนายน";
                                    } else if ($date_mon == "07") {
                                        $date_m = "กรกฎาคม";
                                    } else if ($date_mon == "08") {
                                        $date_m = "สิงหาคม";
                                    } else if ($date_mon == "09") {
                                        $date_m = "กันยายน";
                                    } else if ($date_mon == "10") {
                                        $date_m = "ตุลาคม";
                                    } else if ($date_mon == "11") {
                                        $date_m = "พฤศจิกายน";
                                    } else if ($date_mon == "12") {
                                        $date_m = "ธันวาคม";
                                    } else {
                                        $date_m = "Nothing";
                                    }

                                    $date_y = intval(substr($date, 0, 4));

                                    $showDate = $date_d . " " . $date_m . " " . $date_y;
                                    echo $showDate;

                                    ?>
                                </td>
                                <td>
                                    <?php 
                                    /*            echo db("SELECT fullname FROM stu_info WHERE id=" . $value['stu_id'] . ";")['fullname']; */

/*$query = "SELECT fullname FROM stu_info WHERE id=$value['stu_id']";
*/

?>
</td>
<td style="text-align:left !important;">
    <?php echo $value["descript"]; ?>
</td>
<td>
    <?php echo $value["typedeline"]; ?>
</td>
</tr>

<?php } ?>
</tbody>
</table> -->
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