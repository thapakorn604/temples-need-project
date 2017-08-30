<?php

    session_start();

    if($_SESSION["login_user"] === null) {
        echo "<script>alert('You must login first!');</script>";
        echo "<script>location.href='./Login.php'</script>";
    } else if($_SESSION["login_user_role"] === "admin") {

?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>Admin operations</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/Forgetpassword-Style.css" type="text/css">
    <link rel="stylesheet" href="css/commonCSS.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script>
        $(document).ready(function() {
            $('[data-toggle="popover"]').popover();
        });
    </script>
    <style type="text/css">

        .table {
            border-radius: 5px;
            width: 50%;
            margin: 0px auto;
            float: none;
        }

        .setmargin {
            margin-left: 0px;
            background-color: black;
            color: white;
            opacity: 0.8;
            font-size: 1.5em;
            margin-bottom: 13px;
            margin-top: 5px;
        }

        .scale-up {
            width: 100%;
        }

        .temple-image-frame {
            position: relative;
            width: 100%;
        }

        .temple-label {
            position: absolute;
            left: 0;
            bottom: 0;
            width: 100%;
            color: white;
            font: bold 180% Sans-Serif;
            letter-spacing: -1px;
            background: rgb(0, 0, 0);
            /* fallback color */
            background: rgba(0, 0, 0, 0.1);
            padding: 10px;
            line-height: 80%;
        }

        span.province {
            font-size: 60%;
        }

        .nopadding {
            padding: 0 !important;
            margin: 0 !important;
        }

        input::-webkit-input-placeholder {
            font-size: 1.8em;
            line-height: 3;
        }

ul.v_menu{ /* กำหนดขอบเขตของเมนู */
            list-style:none;
            margin:0px;
            padding:0px;
            width:180px;
            font-family:tahoma, "Microsoft Sans Serif", Vanessa;
            font-size:16px;
            text-align: center;
            
        }
ul.v_menu > li{ /* กำหนดรูปแบบให้กับเมนูเ */
    display:block;
    height:30px;
    text-indent:5px;
    background-color: rgba(0, 0, 0, 0.9);
}
ul.v_menu > li:hover{ /* กำหนดรูปแบบให้กับเมนูเมื่อมีเมาส์อยู่เหนือ */
    display:block;
    height:30px;
    text-indent:5px;
    background-color: #D6C221;
}
ul.v_menu > li > a{ /* กำหนดรูปแบบให้กับลิ้งค์ */
    text-decoration:none;
    color:#FFFFFF;
    line-height:20px;
}

    </style>

    <script>

        var selectedId;


        function delete_temple() {
            var r = confirm("ยืนยัน?");
            if(r === true){
                if (this.selectedId == null) {
                    alert(this.selectedId);
                    alert("ไม่สามารถลบได้ค่ะ")
                } else {
                    location.href='backend/deleteTemple.php?id='+getSelectedId();
                }
            }
        }

        function delete_user() {
            var r = confirm("ยืนยัน?");
            if(r === true){
                if (this.selectedId == null) {
                    alert(this.selectedId);
                    alert("ไม่สามารถลบได้ค่ะ")
                } else {
                    location.href='backend/deleteUser.php?id='+getSelectedId();
                }
            }
        }

        function setSelectedId(id){

            return this.selectedId = id;

        }

        function getSelectedId(){

            return this.selectedId;
        }

    </script>




<script type="text/javascript" src="http://code.jquery.com/jquery-latest.min.js"></script>
<script type="text/javascript">
$(function(){
    $(".b_icon").each(function(j,k){
        var top_p=(50*j)+"px";  /*  50 คือความสูงเมนูด้านซ้าย */
        var top_p2="-"+(50*j)+"px";  /*  50 คือความสูงเมนูด้านซ้าย */
        $(this).css("top",top_p);
        $(this).find("li.vertical_detail_show").css("top",top_p2);
    });
    $("li.b_icon a").click(function(){
        if($(this).parent("li").hasClass("b_icon")==true){
            $("li.vertical_detail_show").hide();
            $(this).parent("li").find("li.vertical_detail_show").show();
        }
    });
});
</script>


</head>

<body>




    <div class="row" style="background-color: rgba(0, 0, 0, 0.9); padding: 0.5%;">
        <div class="col-md-2 col-xs-2 col-sm-2">
            <button class="btn setmargin" onClick="location.href = './index.php';">< หน้าแรก</button>
        </div>

        <div class="col-md-8 col-xs-8 col-sm-8" style="margin-top: 3px">

            <div id="custom-search-input">
                <div class="input-group">

                    <input type="text" class="form-control" placeholder="ค้นหาชื่อวัด" />
                    <span class="input-group-btn">
                    <button class="btn btn-info" type="button">
                        <i class="glyphicon glyphicon-search"></i>
                    </button>
                </span>
                </div>
            </div>


            </div>
            <div class="col-md-2 col-xs-2 col-sm-2">
                <button class="btn setmargin" onClick="location.href = 'backend/logout.php';"> Logout</button>
            </div>

    </div>

    <ul class="v_menu" style="background: rgba(0, 0, 0, 0.1);">
      <li><a href="TempleAdmin.php">รายชื่อวัด</a></li>
      <li><a href="UserAdmin.php">รายชื่อผู้ใช้</a></li>
    </ul>

        <div class="row" style="padding: 3%;">
            <div class="col-xs-12 col-md-12 col-sm-12 nopadding">
                <span style="font-size: 4vmax">รายชื่อผู้ใช้</span>
            </div>
        </div>

        <div class="container">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <div class="row table-responsive" style="left:30%; right:30%; background-color: rgba(0, 0, 0, 0.65); border-radius: 5px; padding: 2%;">
                        <table class="table table-condensed" style="color: #E1E1E1;">
                            <thead>
                                <tr>
                                    <th>ชื่อผู้ใช้</th>
                                    <th>อีเมล์</th>
                                    <th>สถานะ</th>
                                </tr>
                            </thead>


                            <tbody id="parent">

                            <?php

                                require_once("backend/mysql.php");
                                  $queryAccount = $mysqli->query("SELECT * FROM account");
                                while($resultAccount = $queryAccount->fetch_assoc()){
                            ?>

                                <tr id="t1">
                                    <td><a data-toggle="modal" data-target="#edittemple" onClick="setSelectedId(<?php echo $id; ?>)"><?php echo $resultAccount["username"];  ?></a></td>
                                    <td id="t2"><?php echo $resultAccount["email"];  ?></td>
                                    <td id="t2"><?php echo $resultAccount["role"];  ?></td>

                                </tr>

                                <?php
                                    }
                                ?>



                            </tbody>


                        </table>

                </div>
            </div>
        </div>



        <div class="row">
            <div class="col-xs-12 col-md-12 col-sm-12 nopadding">
                <button class="btn btn-default" onclick="location.href = './Register.php';">+เพิ่มผู้ใช้</button>
            </div>
        </div>

    <div id="myModal" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">สอบถาม</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">Email:</label>
                        <input type="email" class="form-control" id="email">
                    </div>
                    <div class="form-group">
                        <label for="phone">เบอร์โทร:</label>
                        <input type="text" class="form-control" id="phone">
                    </div>
                    <div class="form-group">
                        <label for="sel1">เลือกหัวข้อ:</label>
                        <select class="form-control" id="sel1">
                          <option>สอบถามข้อมูลทั่วไป</option>
                          <option>ติดต่อปัญหาการใช้งาน</option>
                          <option>รายงานข้อมูลผิดพลาด</option>
                          <option>ติดต่อสอบถามข้อมูลอื่นๆ</option>
                        </select>

                        <label for="comment">กรอกข้อมูล:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" value="ส่ง" onclick="popUp()" data-dismiss="modal">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>

        </div>
    </div>





    <!-- Edit temple-->
    <div id="edittemple" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">เลือก</h4>
                </div>
                <div class="modal-body">
                    <button type="button" class="btn btn-default" style="width: 100%; margin-bottom: 10px">แก้ไขผู้ใช้</button>
                    <button type="button" class="btn btn-default" style="width: 100%; margin-bottom: 10px" onclick="delete_temple()">ลบผู้ใช้</button>

                </div>
                <div class="modal-footer">

                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>

        </div>
    </div>


    <!-- Add temple-->
    <div id="add_temple" class="modal fade" role="dialog">
        <div class="modal-dialog">

            <!-- Modal content-->
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal">&times;</button>
                    <h4 class="modal-title">เพิ่มวัด</h4>
                </div>
                <div class="modal-body">
                    <div class="form-group">
                        <label for="email">ชื่อวัด:</label>
                        <input type="text" class="form-control" id="name" required>
                    </div>
                    <div class="form-group">
                        <label for="phone">รูป:</label>
                        <input type="file" name="pic" accept="image/*">
                    </div>
                    <div class="form-group">
                        <label for="sel1">เลือกจังหวัด:</label>
                        <select class="form-control" id="sel1" required>
                          <option>เชียงใหม่</option>
                          <option>เชียงราย</option>
                          <option>กรุงเทพฯ</option>
                          <option>ลำปาง</option>
                        </select>

                        <label for="comment">กรอกข้อมูล:</label>
                        <textarea class="form-control" rows="3" id="comment"></textarea>
                    </div>

                </div>
                <div class="modal-footer">
                    <input type="submit" class="btn btn-info" value="ส่ง" onclick="addtemple()" data-dismiss="modal">
                    <button type="button" class="btn btn-default" data-dismiss="modal">ยกเลิก</button>
                </div>
            </div>

        </div>
    </div>
    <script>
        function addtemple() {
            var name = document.getElementById("name").value;
            var list = document.getElementById("parent");
            var li1 = document.createElement("t1");
            li1.appendChild(document.createTextNode(name));
            li1.setAttribute("id", "t1-1");
            list.appendChild(li1);
        }
    </script>
</body>

</html

<?php
    } else {
        echo "<script>alert('You are not authorized!');</script>";
        echo "<script>location.href='./index.php'</script>";
    }
?>
