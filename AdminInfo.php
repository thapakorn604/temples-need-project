<?php

    session_start();

?>

    <!DOCTYPE html>
    <html lang="en">

    <head>
        <title>Login</title>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" href="css/commonCSS.css" type="text/css">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

        <style type="text/css">
        .datagrid table { border-collapse: collapse; text-align: left; width: 100%; } .datagrid {font: normal 12px/150% Arial, Helvetica, sans-serif; background: #fff; overflow: hidden; }.datagrid table td, .datagrid table th { padding: 3px 20px; }.datagrid table thead th {background:-webkit-gradient( linear, left top, left bottom, color-stop(0.05, #A1A1A1), color-stop(1, #000000) );background:-moz-linear-gradient( center top, #A1A1A1 5%, #000000 100% );filter:progid:DXImageTransform.Microsoft.gradient(startColorstr='#A1A1A1', endColorstr='#000000');background-color:#A1A1A1; color:#FFFFFF; font-size: 13px; font-weight: bold; } .datagrid table thead th:first-child { border: none; }.datagrid table tbody td { color: #030303; font-size: 12px;font-weight: normal; }.datagrid table tbody .alt td { background: #595F61; color: #FFFFFF; }.datagrid table tbody td:first-child { border-left: none; }.datagrid table tbody tr:last-child td { border-bottom: none; }.datagrid table tfoot td div { border-top: 1px solid #FFFFFF;background: #E1EEF4;} .datagrid table tfoot td { padding: 0; font-size: 12px } .datagrid table tfoot td div{ padding: 2px; }
            body {
                background: url(images/bg.png) no-repeat center center fixed;
            }

            input[type="text"] {
                background-image: url(images/user.png);
                background-size: 25px;
                background-position: 1% 50%;
                background-repeat: no-repeat;
                text-indent: 20px;
            }

            input[type="password"] {
                background-image: url(images/lock.png);
                background-size: 25px;
                background-position: 1% 50%;
                background-repeat: no-repeat;
                text-indent: 20px;
            }

            .containertop {
                margin-top: 30%;
            }

            a {
                font-size: 1.5em;
            }

            .login-sheet {
                background-color: rgba(0, 0, 0, 0.5);
                border-radius: 5px;
            }

            .login-label {
                color: white;
            }

            .nopadding {
                padding: 0 !important;
                margin: 0 !important;
            }

            .setmargin {
                margin-left: 13px;
                background-color: black;
                color: white;
                opacity: 0.8;
                font-size: 1.5em;
                margin-bottom: 13px;
                margin-top: 5px;
            }
        </style>
        <script type="text/javascript">
            function popUpForget() {
                alert("ลิงค์สำหรับรีเซ็ทรหัสผ่านถูกส่งไปยังอีเมล์เรียบร้อยแล้ว");
            }
        </script>



    </head>

    <body>

        <div class="container">
            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 nopadding">
                    <button class="btn setmargin" onClick="history.go(-1);return true;">< กลับ</button>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12">
                    <img class="img-responsive center-block" src="image/logo.png" alt="logo">
                </div>
            </div>

            <br>
            <div class="datagrid"><table>
<thead><tr><th>ติดต่อผู้ดูแล</th></tr></thead>

<tbody><tr><td>นายอิทธิพล ทรัพย์กรรโชก</td></tr>
<tr class="alt"><td>E-mail : <a href="mailto:someone@example.com" target="_top">ittipol_s@camt.info</a> </td></tr>
<tr><td>เบอร์โทรติดต่อ : 08x-xxx-xxxxx<</td></tr>
<tr class="alt"><td>ที่อยู่ :280/280 ถนนสุเทพ ตำบลสุเทพ อำเภอเมือง จังหวัดเชียงใหม่ 5</td></tr>
</tbody>
</table></div>
              <br>

        <br>
        </div>


      </div>
    </div>



            <!-- Modal -->
            <div id="myModal " class="modal fade " role="dialog ">
              <div class="modal-dialog ">

                <!-- Modal content-->
                <div class="modal-content ">
                  <div class="modal-header ">
                    <button type="button " class="close " data-dismiss="modal ">&times;</button>
                    <h4 class="modal-title ">ลืมรหัสผ่าน?</h4>
                  </div>
                  <div class="modal-body ">
                  <div class="form-group ">
                    <label for="email ">Email:</label>
                    <input type="email " class="form-control " id="email ">
                  </div>

                    <div class="form-group ">


                      <label for="comment ">ขั้นตอนการรีเซ็ทรหัสผ่าน:</label>
                      <textarea class="form-control " rows="4 " id="comment " readonly=" ">1.กรอกemailของท่าน&#13;&#10;2.ทางเว็บไซท์จะส่งลิ้งค์เพื่อรีเซ็ทรหัสผ่านไปยังเมล์ที่ท่านกรอก&#13;&#10;3.ท่านจะสามารถตั้งรหัสผ่านใหม่ได้</textarea>
                    </div>

                  </div>
                  <div class="modal-footer ">
                  <input type="submit " class="btn btn-info " value="ส่ง " onclick="popUpForget() " data-dismiss="modal ">
                    <button type="button " class="btn btn-default " data-dismiss="modal ">ยกเลิก</button>
                  </div>
                </div>

              </div>
            </div>




  </div>



</div>



</body>
</html>
