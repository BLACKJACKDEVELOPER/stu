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
  <title>Controlers</title>
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
    height: 40px !important;
    float: right !important;
  }

  #Table_filter {
    float: right;
  }

  .sideL {
    text-align: left !important;
  }

  .section {
    background-color: #0101 !important;
  }
</style>

<body>
  <div id="app" style="background-color:#cccccc;">

    <?php include("header.php");

    // DELETE ACTIVITY
    if (isset($_GET['del'])) {
      new db("DELETE FROM controler WHERE id=" . (intval($_GET['del'])) . ";");
      echo "<script>window.location.href = 'controlers.php';</script>";
    }

    ?>
    <section class="hero is-hero-bar" style="background-color:#cccccc;">
    <section class="section is-main-section">
      <div class="card has-table">
        <div class="card-content">
          <center><h1 class="title" style="margin-top:2%;">ตารางบัญชีผู้ควบคุม</h1></center>
          <div class="b-table has-pagination">
            <div class="table-wrapper has-mobile-cards p-5">
              <table id="Table" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>ชื่อ</th>
                    <th>ตำแหน่ง</th>
                    <th>จัดการ</th>
                  </tr>
                <tbody>

                  <?php $result = new db("SELECT * FROM controler;");

                  while ($row = $result->fetch_assoc()) { ?>

                    <tr>
                      <td style="text-align:right;">
                        <?php echo $row["id"]; ?>
                      </td>
                      <td class="sideL">
                        <?php echo $row["fullname"]; ?>
                      </td>
                      <td class="sideL">
                        <?php echo $row["position"]; ?>
                      </td>
                      <td style="display:flex;justify-content:center;align-items:center;">
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;" href="controler.php?name=<?php echo $row['fullname']; ?>"
                          class="button is-primary"><span class="mdi mdi-eye" style="color:#fff !important;"></span></a>
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;" href="?del=<?php echo $row['id']; ?>"
                          class="button is-danger"><span class="mdi mdi-delete" style="color:#fff !important;"></span></a>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
            </div>
          </div>
          
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
  new DataTable("#Table",{
    dom: 'Bfrtip',
    buttons:exporter
  });
  new DataTable("#Work");

  async function radio(id) {
    const sign = !(event.target.value == true)
    window.location.href = "?id=" + id + "&sign=" + sign
  }

  async function permission(id) {
    const role = (event.target.value)
    window.location.href = '?permission=' + role + '&id=' + id;
  }

</script>

</html>