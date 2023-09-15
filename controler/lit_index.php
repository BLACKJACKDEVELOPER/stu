<style>
    html {
        scroll-behavior: smooth;
    }

    th {
        border: 2px solid #0101 !important;
        width: auto;
        text-align: center !important;
    }

    #work_filter {
        max-width: 50% !important;
        float: right;
        margin-bottom: 2%;
    }

    #work_paginate {
        float: right;
        margin-top: 4%;
    }

    td {
        border: 2px solid #0101 !important;
    }

    .coller {
        background: url('https://datatables.net/examples/resources/details_open.png') no-repeat center center;
        cursor: pointer;
        background-size: 50%;
        transition: 0.5s;
    }

    tr.shown td:first-child {
        background: url('https://datatables.net/examples/resources/details_close.png') no-repeat center center;

    }

    .is-current {
        background-color: gray !important;
        border-color: gray !important;
    }
</style>
<?php $act = db('SELECT * FROM report_activities WHERE name_control="' . $_SESSION['fullname'] . '" ORDER BY activity_id DESC;'); ?>
<section class="section is-main-section">
    <div class="card">
        <header class="card-header">
        </header>
        <div class="card-content" style="overflow:hidden;">

            <table cellspacing="0" id="work" class="table is-fullwidth is-striped is-hoverable is-fullwidth"
                style="border:2px solid #0101;">
                <thead>
                    <tr>
                        <th>#</th>
                        <th>ลำดับ</th>
                        <th>วัน/เดือน/ปี</th>
                        <th>ชื่อนักศึกษา </th>
                        <th>รายละเอียด</th>
                        <th>สถานะรับรอง</th>
                        <th>จัดการ</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($act as $key => $value) { ?>
                        <tr id="row<?php echo $key; ?>">
                            <td id="data<?php echo $key; ?>" class="coller"></td>
                            <td style="text-align:center;">
                                <?php echo $key + 1; ?>
                            </td>
                            <td id="date<?php echo $key; ?>">
                                <?php


                                $date = $value["dater"];
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

                                $showDate = $date_d . " " . $date_m . " " . ($date_y + 543);
                                echo $showDate;

                                ?>
                            </td>
                            <td id="fullname<?php echo $key; ?>">
                                <?php echo $value['fullname']; ?>
                            </td>
                            <td id="descript<?php echo $key; ?>">
                                <?php echo $value['descript']; ?>
                            </td>
                            <td id="signature<?php echo $key; ?>">
                                <?php echo $value['signature'] ? "<font color='green' onmouseenter='showSignature(\"" . $value['signature'] . "\",true)' onmouseleave='showSignature(\"" . $value['signature'] . "\",false)'>รับรองแล้ว</font>" : "<font color='red'>ยังไม่รับรอง</font>"; ?>
                            </td>
                            <td>
                                <?php if (!$value['signature']) { ?>
                                    <button onclick="signature(<?php echo $value['activity_id']; ?>)" data-target="#modal"
                                        class="button is-warning is-fullwidth js-modal-trigger"
                                        style="color:#fff !important;box-shadow:0px 0px 5px #000;">เซ็นรับรอง</button>
                                <?php } ?>
                            </td>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>

        </div>
    </div>
</section>
<div id="stateSig"
    style="position:absolute;transition:0.2s;background-color:#fff;padding:1%;border:2px solid #000;display:none;">
    <h4>หลักฐานรับรอง (รูปภาพ)</h4>
    <br>
    <img width="500" style="border-radius:10px;" src="" id="src" alt="">
</div>
<div id="modal" class="modal">
    <div class="modal-background" onclick="document.getElementById('modal').setAttribute('class','modal')">
    </div>

    <div class="modal-content">
        <div class="box" id="boxpencil">
            <p>เซ็นรับรอง</p>
            <!-- Your content -->
            <div id="wrapper" style="width:100%;"></div>
            <!-- Send Signature -->
            <form method="POST"
                style="width:100%;display:flex;justify-content:flex-end;align-items:center;border-top:2px solid #0111;">
                <input id="canvas" type="text" name="canvas" hidden>
                <input id="id" type="text" name="id" hidden>
                <button class="button is-dark mt-2 is-fullwidth" type="submit">SAVE</button>
            </form>
        </div>
    </div>
    <button onclick="document.getElementById('modal').setAttribute('class','modal');" class="modal-close is-large"
        aria-label="close"></button>
</div>

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

    async function showSignature(img, state) {
        if (state) {
            document.getElementById('src').src = "../assets/images/" + img
            const parent = document.getElementById('stateSig')
            parent.style.display = "block";
            document.getElementById('app').style.opacity = "0.5";
            parent.style.top = (event.clientY - 100) + 'px'
            parent.style.left = (event.clientX - 600) + 'px'
        } else {
            const parent = document.getElementById('stateSig')
            parent.style.display = "none";
            document.getElementById('app').style.opacity = "1";

        }
    }

    const table = $('#work').DataTable({
        responsive: true,
        dom: 'Bfrtip',
        buttons:exporter
    });
    $('#work tbody').on('click', 'td:first-child', function (e) {
        const tr = $(this).closest('tr');
        const row = table.row(tr);
        const id = (event.target.id).split('data').pop()
        // date
        const date = document.getElementById('date' + id).innerHTML
        const fullname = document.getElementById('fullname' + id).innerHTML
        const descript = document.getElementById('descript' + id).innerHTML
        const signature = document.getElementById('signature' + id).innerHTML



        if (row.child.isShown()) {
            // This row is already open - close it.
            row.child.hide();
            tr.removeClass('shown');
        } else {
            // Open row.
            row.child(`
            
            📆 วัน/เดือน/ปี : ${date} <br/>
            ⛑ ชื่อนักศึกษา : ${fullname} <br/>
            👁 รายละเอียด : ${descript} <br/>
            ✏ สถานะรับร้อง : ${signature}

            `).show();
            tr.addClass('shown');
        }
    });

    // function signature open show
    let drawing = false
    const canvas_ = document.getElementById('defaultCanvas0')
    async function signature(id) {
        const modal = document.getElementById('modal')
        modal.setAttribute("class", "modal is-active")
        clear();
        document.getElementById("id").setAttribute("value", id)

    }

    function setup() {
        let canvas = createCanvas(600, 300);
        canvas.parent('wrapper'); // Attach the canvas to the custom div
    }

    function draw() {
        if (drawing) {
            stroke(0);
            strokeWeight(3);
            line(mouseX, mouseY, pmouseX, pmouseY);
            document.getElementById('canvas').setAttribute("value", (canvas.toDataURL()).split(";base64,").pop())
        }
    }

    function mousePressed() {
        drawing = true;
    }

    function mouseReleased() {
        drawing = false;
    }

</script>