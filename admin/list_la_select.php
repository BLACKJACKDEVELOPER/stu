 <?php 
 session_start();
 ?>
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
            $('#example2').DataTable( {

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
    $dat_st  = $_GET['dateStart2'];
    $dat_en  = $_GET['dateEnd2'];
    echo $dat_st." | ".$dat_en;
    /*
    ?SELECT db1.stu_id , db2.fullname , count(db1.typedeline) AS TOTAL  FROM workinfo  AS db1
    INNER JOIN stu_info AS db2 ON (db1.stu_id = db2.id)
    WHERE dateStart BETWEEN '$dat_st' AND '$dat_en'
    GROUP BY db2.fullname ORDER BY TOTAL DESC;"

     */
    $query4 = "SELECT db1.stu_id , db2.fullname , count(db1.typedeline) AS TOTAL  FROM workinfo  AS db1
    INNER JOIN stu_info AS db2 ON (db1.stu_id = db2.id)
    WHERE db1.dateStart BETWEEN '$dat_st' AND '$dat_en'
    GROUP BY db2.fullname ORDER BY TOTAL DESC;";
    //3.เก็บข้อมูลที่ query ออกมาไว้ในตัวแปร result . 
    $result4 = new db($query4);
    //var_dump(mysqli_fetch_array($result4));
    ?>
    <div align="center">
        <div  class="alert alert-info">
            <h1 style="font-size: 24px;"><font color="#000">ประวัติการลาทั้งหมด</font></h1> 
        </div>
    </div>

    <table id="Work" class="table" style="width:100%">
        <thead>
        <!--<colgroup>
             <col span="3" width="5%">
             <col width="25%">
             <col span="4" width="10%">
        </colgroup>
    -->
    <tr>
        <th>ลำดับ</th>
        <th>ชื่อ สกุล</th>
        <th>จำนวนครั้ง</th>
    </tr>
</thead>

<tbody>
    <?php

    $y11 = 1;
    while($row4 = $result4->fetch_assoc()) { 

    ?>

    <tr>
        <td>
          <?php echo $y11;?>
      </td>
      
<td>
   <center>
    <?php echo $row4['fullname'];?>
</center>
</td>
<td>
    <center>
        <a href="list_la.php?id_view=<?php echo $row4['stu_id'] ?>&name=<?php echo $row4['fullname'];?>"><?php echo $row4['TOTAL'];?></a>
    </center>

</td>
</tr>

<?php

$y11++;
} ?>
</tbody>
</table>
</head>
</html>