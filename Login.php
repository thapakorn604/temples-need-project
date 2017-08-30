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

            <div class="row">
                <div class="col-sm-12 col-md-12 col-xs-12 nopadding login-sheet">
                    <div class="login-sheet">
                        <div class="col-sm-12 col-xs-12 col-md-12">
                            <br>


                            <form action="backend/login-process.php" method="POST">

                                <div class="form-group">
                                    <label class="login-label" for="username">Username:</label>
                                    <input class="form-control" type="text" id="username" name="username" placeholder="ชื่อผู้ใช้">
                                </div>
                                <div>
                                    <label class="login-label for=" password ">Password:</label>
              <input class="form-control " type="password" id="password" name="password" placeholder="๏๏๏๏๏๏ ">
            </div>
            <br>
              <p class="text-center "><a href="AdminInfo.php" " style="color: white ">ติดต่อผู้ดูแล</a> | <a href="Register.php " style="color: white ">สมัครสมาชิก</a></p>
              <br>
              <input type="submit" class="btn btn-primary " style="width: 100% " value="Login "/>

          </form>
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
