<?php
error_reporting(0);
    session_start();

    if($_SESSION["login_user"] === null) {
        echo "<script>alert('You must login first!');</script>";
        echo "<script>location.href='./Login.php'</script>";
    } else {

?>

<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Help Temple</title>

    <!-- Bootstrap core CSS -->
    <link href="vendor/bootstrap/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom fonts for this template -->
    <link href="vendor/font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet" type="text/css">
    <link href='https://fonts.googleapis.com/css?family=Kaushan+Script' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Droid+Serif:400,700,400italic,700italic' rel='stylesheet' type='text/css'>
    <link href='https://fonts.googleapis.com/css?family=Roboto+Slab:400,100,300,700' rel='stylesheet' type='text/css'>

    <!-- Custom styles for this template -->
    <link href="css/agency.min.css" rel="stylesheet">
    <link href="css/mystyles.css" rel="stylesheet">

</head>

<body id="page-top">

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark fixed-top" id="mainNav">
        <div class="container">
            <a class="navbar-brand js-scroll-trigger" href="./index.php">
                Help Temples
            </a>
            <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation">
          Menu
          <i class="fa fa-bars"></i>
        </button>
            <div class="collapse navbar-collapse" id="navbarResponsive">
                <ul class="navbar-nav ml-auto">
                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="#contact">ติดต่อเรา</a>
                    </li>
                    <?php
                        if($_SESSION["login_user"] == null){
                    ?>

                    <li class="nav-item">
                        <a class="nav-link js-scroll-trigger" href="./login.php">เข้าสู่ระบบ</a>
                    </li>
                    <?php

                        } else {

                            if($_SESSION["login_user_role"] == 'admin'){

                     ?>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href = "TempleAdmin.php"><?php echo "สวัสดี ".$_SESSION["login_user"]; ?></a>
                                </li>

                    <?php

                            } else {

                    ?>
                                <li class="nav-item">
                                    <a class="nav-link js-scroll-trigger" href = "User.php"><?php echo "สวัสดี ".$_SESSION["login_user"]; ?></a>
                                </li>


                    <?php

                            }

                    ?>

                        <li class="nav-item">
                            <a class="nav-link js-scroll-trigger" href = "backend/logout.php"><?php echo "ออกจากระบบ" ?></a>
                        </li>

                    <?php

                        }

                    ?>
                </ul>
            </div>
        </div>
    </nav>

    <!-- Header -->
    <header class="masthead">

        <div class="intro-text">
        </div>


    </header>

    <!-- Services -->
    <section id="register">
        <div class="container">

            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">แก้ไขวัด</h2>
                    <h3 class="section-subheading text-muted">&nbsp;</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-3 col-xs-3"></div>
                <div class="col-sm-6 col-md-6 col-xs-6">

                        <?php

                            require_once("backend/mysql.php");

                            $templeId = $_GET["id"];

                            $query = $mysqli->
                                query("SELECT * FROM temple where temple_id = '$templeId'");

                            $data = $query->fetch_assoc();

                            $templeName = $data["name"];
                            $tel = $data["tel"];
                            $address = $data["address"];
                            $description = $data["description"];
                            $image = $data["image"];

                            // get need item
                            $itemNeed = $mysqli->
                                query("SELECT * FROM temple_need where temple_id = '$templeId'");
                            $itemNeed_data = $itemNeed->fetch_assoc();
                            $need = $itemNeed_data["item_need"];
                            $need_id = $itemNeed_data["id"];

                            // get no need item
                            $itemNoNeed = $mysqli->
                                query("SELECT * FROM temple_no_need where temple_id = '$templeId'");
                            $itemNoNeed_data = $itemNoNeed->fetch_assoc();
                            $noNeed = $itemNoNeed_data["item_no_need"];


                        ?>

                      <form action="backend/editTemple-process.php" method="POST" enctype="multipart/form-data">

                        <div class="form-group">
                            <label>ชื่อวัด:</label>
                            <input class="form-control" type="text" id="nameTemple" name="nameTemple" value="<?php echo $templeName; ?>">
                        </div>
                        <div class="form-group">
                            <label>ข้อมูลวัด:</label>
                            <textarea class="form-control" type="text" id="description" name="description" rows="4"> <?php echo $description; ?> </textarea>
                        </div>
                        <div class="form-group">
                            <label>เบอร์โทร:</label>
                            <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $tel; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">ที่อยู่:</label>
                            <input class="form-control" type="text" id="address" name="address" value="<?php echo $address; ?>">
                        </div>

                        <div class="form-group">
                            <label for="email">รูปภาพ: <?php echo $image ?></label>
                            <input class="form-control" type="file"  accept="image/tiff,image/jpeg,image/gif,image/x-png,image/x-MS-bmp "class="btn btn-default" id="image" name="image">
                            <p>หากต้องการเปลี่ยนรูปสามารถอัพโหลดได้เลย</p>
                        </div>
                        <div class="form-group">
                            <label>สิ่งที่วัดต้องการ:</label>
                            <input class="form-control" type="text" name="item1" value="<?php echo $need; ?>">
                        </div>


                        <div class="form-group">
                            <label>สิ่งที่วัดไม่ต้องการ:</label>
                            <input class="form-control" type="text" name="noitem1" value="<?php echo $noNeed; ?>">
                        </div>

                        <div class="form-group">
                            <br>
                            <button onClick="history.go(-1);return true;" class="btn btn-default" style="width: 100%;" >ยกเลิก</button>
                            <button type="submit" class="btn btn-primary" style="width: 100%">แก้ไข</button>
                        </div>
                    </form>
                </div>
                <div class="col-sm-3 col-md-3 col-xs-3"></div>
            </div>


        </div>
    </section>





    <!-- Contact -->
    <section id="contact">
        <div class="container">
            <div class="row">
                <div class="col-lg-12 text-center">
                    <h2 class="section-heading">ติดต่อเรา</h2>
                    <h3 class="section-subheading text-white">นาย มยุรี พรหมจารีย์วินาศ</h3>
                </div>
            </div>
            <div class="row text-center" style="color: #D4B126">
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary2"></i>
                       	<i class="fa fa-phone fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading text-primary2">Tel.</h4>
                    <p class="text-white">08x-xxx-xxxx</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary2"></i>
                       	<i class="fa fa-map-marker fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading text-primary2">Location</h4>
                    <p class="text-white">CAMT</p>
                </div>
                <div class="col-md-4">
                    <span class="fa-stack fa-4x">
                        <i class="fa fa-circle fa-stack-2x text-primary2"></i>
                       	<i class="fa fa-envelope fa-stack-1x fa-inverse"></i>
                    </span>
                    <h4 class="service-heading text-primary2">Email</h4>
                    <p class="text-white"><a href="mailto:someone@example.com" target="_top">someone@example.com</a></p>
                </div>
            </div>
        </div>
    </section>

    <!-- Footer -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <span class="copyright">Copyright &copy; Your Website 2017</span>
                </div>
                <div class="col-md-4">
                    <!--<ul class="list-inline social-buttons">
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-facebook"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">
                                <i class="fa fa-linkedin"></i>
                            </a>
                        </li>
                    </ul>-->
                    <!--
                </div>
                <div class="col-md-4">
                    <ul class="list-inline quicklinks">
                        <li class="list-inline-item">
                            <a href="#">Privacy Policy</a>
                        </li>
                        <li class="list-inline-item">
                            <a href="#">Terms of Use</a>
                        </li>
                    </ul>
                </div>
            </div>
        </div>
    </footer>



    <!-- Bootstrap core JavaScript -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="vendor/popper/popper.min.js"></script>
    <script src="vendor/bootstrap/js/bootstrap.min.js"></script>

    <!-- Plugin JavaScript -->
    <script src="vendor/jquery-easing/jquery.easing.min.js"></script>

    <!-- Contact form JavaScript -->
    <script src="js/jqBootstrapValidation.js"></script>
    <script src="js/contact_me.js"></script>

    <!-- Custom scripts for this template -->
    <script src="js/agency.min.js"></script>


</body>

</html>

<?php

    }

?>
