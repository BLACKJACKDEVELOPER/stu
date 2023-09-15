 <!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="css/jquery.dataTables.min.css">
    <link rel="stylesheet" type="text/css" href="css/responsive.dataTables.min.css">
   
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/js/bootstrap.bundle.min.js"></script>
    <script type="text/javascript" language="javascript" src="js/jquery.dataTables.min.js"></script> 
    <script type="text/javascript" language="javascript" src="js/dataTables.responsive.min.js"></script>

    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>

    <script>    
        $(document).ready(function() {
            $('#example11').DataTable( {

                "oLanguage": {

                    "sLengthMenu": "แสดง _MENU_ เร็คคอร์ด ต่อหน้า",

                    "sZeroRecords": "ไม่เจอข้อมูลที่ค้นหา",

                    "sInfo": "แสดง _START_ ถึง _END_ ของ _TOTAL_ เร็คคอร์ด",

                    "sInfoEmpty": "แสดง 0 ถึง 0 ของ 0 เร็คคอร์ด",

                    "sInfoFiltered": "(จากเร็คคอร์ดทั้งหมด _MAX_ เร็คคอร์ด)",

                    "sSearch": "ค้นหา :"},
                    responsive: true
                } );
        } );
    </script>
<?php
$dat_st  = $_REQUEST['dateStart'];
$dat_en  = $_REQUEST['dateEnd'];
$query = "SELECT * FROM `report_activities` WHERE dater BETWEEN '$dat_st' AND '$dat_en'  ORDER BY `id` DESC" or die("Error:" . mysqli_error()); 
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 

$result1 = new db($query); 

?>
<div align="center">
    <div  class="alert alert-info">
        <h1><font color="#000">ตารางแสดงกิจกรรม ระหว่างวันที่ <?php echo $dat_st; ?> ถึง <?php echo $dat_en; ?> </font></h1> 
    </div>
</div>

<table id="example11" class="table" style="width:100%">
<thead>
        <!--<colgroup>
             <col span="3" width="5%">
             <col width="25%">
             <col span="4" width="10%">
        </colgroup>
    -->
    <tr>
        <th>#</th>
        <th>วัน/เดือน/ปี</th>
        <th>ชื่อ</th>
        <th>รายละเอียด</th>
        <th>ผู้ควบคุม</th>
        <th>จัดการ</th>
    </tr>
</thead>

<tbody>
    <?php

    $n = 1;
    while($row = $result1->fetch_assoc()) { 

        ?>

        <tr>
            <td>
              <?php echo $n;?>
          </td>
          <td>
           <center>
               <?php


               $date = $row["dater"];
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
        </center>
    </td>
    <td>
     <center>
        <?php echo $row['fullname'];?>
    </center>
</td>
<td>
    <center>
        <?php echo $row['descript'];?>
    </center>

</td>
<td>
 <center>
    <?php echo $row['name_control'];?>
</center>
</td>
<td>
 <center>
    <?php echo $n;?>
</center>
</td>
</tr>

<?php

$n++;
} ?>
</tbody>
</table>
</head>
</html>