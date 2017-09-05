<?php

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

    <style>
        ul.v_menu {
            list-style-type: none;
            margin: 0;
            padding: 0;
            width: 200px;
            background-color: #f1f1f1;
        }

        li.v_menu>a {
            display: block;
            color: #000;
            padding: 8px 16px;
            text-decoration: none;
        }

        /* Change the link color on hover */

        li.v_menu>a:hover {
            background-color: #fed136;
            color: white;
        }
    </style>
    <script type="text/javascript">
        $(document).ready( function() {
        $(document).on('change', '.btn-file :file', function() {
        var input = $(this),
        label = input.val().replace(/\\/g, '/').replace(/.*\//, '');
        input.trigger('fileselect', [label]);
        });

        $('.btn-file :file').on('fileselect', function(event, label) {

            var input = $(this).parents('.input-group').find(':text'),
                log = label;

            if( input.length ) {
                input.val(log);
            } else {
                if( log ) alert(log);
            }

        });
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();

                reader.onload = function (e) {
                    $('#img-upload').attr('src', e.target.result);
                }

                reader.readAsDataURL(input.files[0]);
            }
        }

            $("#imgInp").change(function(){
                readURL(this);
            });
        });

        function relocate_addTemple() {
            location.href = "./AddTemple.php";
        }

        function editTemple(id) {

            location.href='./editTemple.php?id='+id;

        }

        function deleteTemple(id) {

            location.href='./backend/deleteTemple.php?id='+id;

        }


    </script>

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
                    <h2 class="section-heading">โปรไฟล์ของคุณ</h2>
                    <h3 class="section-subheading text-muted">&nbsp;</h3>
                </div>
            </div>

            <div class="row">
                <div class="col-sm-3 col-md-3 col-xs-3">
                    <!--<ul class="v_menu">
                        <li class="v_menu"><a href="TempleAdmin.php">รายชื่อวัด</a></li>
                        <li class="v_menu"><a href="UserAdmin.php">รายชื่อผู้ใช้</a></li>
                    </ul>-->
                </div>
                <div class="col-sm-6 col-md-6 col-xs-6">

                    <?php

                            require_once("backend/mysql.php");
                            $userId = $_SESSION["login_user_id"];
                            $query = $mysqli->query("SELECT * FROM temple_monk WHERE user_id = $userId");

                            if ($query->num_rows < 1) {
                        ?>

                        <button class="btn btn-default" onClick="relocate_addTemple()">+เพิ่มวัด</button>

                        <?php

                        } else {

                            while($data = $query->fetch_assoc()){

                            $templeId = $data["temple_id"];
                            $monkId = $data["user_id"];
                            $id = $data["id"];

                            $queryTemple = $mysqli->query("SELECT * FROM temple WHERE temple_id = $templeId");
                            $queryMonk = $mysqli->query("SELECT * FROM account WHERE id = $monkId");

                            $resultTemple = $queryTemple->fetch_assoc();
                            $resultMonk = $queryMonk->fetch_assoc();

                    ?>

                    <table class="table table-condensed">
                        <thead>
                            <tr>
                                <th>ชื่อวัด</th>
                                <td><?php echo $resultTemple["name"];  ?></td>
                            </tr>
                        </thead>


                        <tbody>




                            <tr>
                                <th>ชื่อผู้ใช้</th>
                                <td><?php echo $resultMonk["username"];  ?></td>
                            </tr>
                            <tr>
                                <td></td>
                                <td>
                                    <button class="btn btn-default" onclick="editTemple(<?php echo $templeId; ?>)"> Edit </button>
                                    <button class="btn btn-danger" onclick="deleteTemple(<?php echo $templeId; ?>)"> Delete </button>
                                </td>
                            </tr>

                        <?php

                                }

                            }
                        ?>

                        </tbody>


                    </table>

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
                    <p class="text-white">m.pattrakorn@gmail.com</p>
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
