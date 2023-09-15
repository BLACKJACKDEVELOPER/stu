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
    	transform: scale(3);
    	border-radius: 100%;
		border-radius: 50% !important;

	}
</style>

<body>
  <div id="app" style="background-color:#cccccc;">

    <?php include("header.php");

    // DELETE ACTIVITY
    if (isset($_GET['del'])) {
      new db("DELETE FROM stu_info WHERE id=" . (intval($_GET['del'])) . ";");
      echo "<script>window.location.reload;</script>";
    }else if (isset($_GET['sign'])) {
	  new db("UPDATE stu_info SET verify=".$_GET['sign']." WHERE id=".$_GET['id'].";");
	  echo "<script>window.location.href = 'users.php';</script>";
	}else if (isset($_GET['permission'])) {
	  new db("UPDATE stu_info SET permission='".$_GET['permission']."' WHERE id=".$_GET['id'].";");
	}

    ?>
    <section class="hero is-hero-bar" style="background-color:#cccccc;">
    </section>
    <section class="section is-main-section">
      <div class="card has-table">
        <div class="card-content">
        <center><h1 class="title" style="font-size:25px;margin-top:2%;" align="center">ตารางบัญชีผู้ใช้งาน</h1></center>
          <div class="b-table has-pagination p-5">
              <table id="Table" class="table is-fullwidth is-striped is-hoverable is-fullwidth">
                <thead>
                  <tr>
                    <th>ลำดับ</th>
                    <th>โปรไฟล์</th>
                    <th>อีเมล์</th>
                    <th>ชื่อ</th>
                    <th>สถานะใช้งาน</th>
                    <th>สิทธิ์การใช้งาน</th>
                    <th>จัดการ</th>
                  </tr>
                <tbody>
                  <?php 
                  $sql = "SELECT * FROM stu_info;";
                  $result = new db($sql);
                  $index = 1;
                  while ($row = $result->fetch_assoc()) { ?>
                    <tr>
                      <td>
                        <?php echo $index;$index++; ?>
                      </td>
                      <td>
                        <img class="zoom" style="border-radius:50%;width:30px;height:30px;" src="../assets/profile/<?php echo $row["profile"]; ?>" alt="">
                      </td>
                      <td style="text-align:left !important;">
                        <?php echo $row["email"]; ?>
                      </td>
                      <td style="text-align:left !important;">
                        <?php echo $row["fullname"]; ?>
                      </td>
                      <td style="width:10px;">
						<?php if ($row['verify'] == true) { ?>
							<input onclick="radio(<?php echo $row['id']; ?>)" type="radio" checked value="<?php echo $row['verify'] ?>">
						<?php }else{ ?>
							<input onclick="radio(<?php echo $row['id']; ?>)" type="radio" value="<?php echo $row['verify'] ?>">
						<?php } ?>
                      </td>
					  <td>
							<select onchange="permission(<?php echo $row['id']; ?>)" class="input" name="" id="">
								<?php 
									$permissions = array("user","admin");
									foreach ($permissions as $data => $value) { 
										if ($value == $row['permission']) { ?>
											<option selected value="<?php echo $value; ?>"><?php echo $value; ?></option>
										<?php }else{ ?>
											<option value="<?php echo $value; ?>"><?php echo $value; ?></option>
										<?php }
									} 
								?>
							</select>
					  </td>
                      <td style="display:flex;justify-content:center;align-items:center;">
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="user.php?id=<?php echo $row['id']; ?>" class="button is-dark"><span
                            class="mdi mdi-pencil" style="color:#fff !important;"></span></a>
                        <a style="height:30px;width:50px;margin:0px 2px 0px 2px;"
                          href="?del=<?php echo $row['id']; ?>" class="button is-danger"><span
                            class="mdi mdi-delete" style="color:#fff !important;"></span></a>
                      </td>
                    </tr>

                  <?php } ?>
                </tbody>
              </table>
          </div>
  
          <?php include "footer.php"; ?>


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
	window.location.href = "?id="+id+"&sign="+sign
}

async function permission(id) {
	const role = (event.target.value)
	window.location.href = '?permission='+role+'&id='+id;
}

</script>

</html>