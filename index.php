<?php

    session_start();

?>

<!DOCTYPE html>
<html>

<head>
    <title>HelpTemple.org - Home</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="css/HomepageStyle.css" type="text/css">
    <link rel="stylesheet" href="css/commonCSS.css" type="text/css">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">

    <style type="text/css">
        .flexsearch--wrapper {
            height: auto;
            width: auto;
            max-width: 100%;
            overflow: hidden;
            background: transparent;
            margin: 0;
            position: static;
        }

        .flexsearch--form {
            overflow: hidden;
            position: relative;
        }

        .flexsearch--input-wrapper {
            overflow: hidden;
        }

        .flexsearch--input {
        width: 100%;
        }

        /***********************
        * Configurable Styles *
        ***********************/
        .flexsearch {
        padding: 0 25px 0 0; /* Padding for other horizontal elements */
        }

        .flexsearch--input {
        -webkit-box-sizing: content-box;
            -moz-box-sizing: content-box;
            box-sizing: content-box;
            height: 60px;
        padding: 0 46px 0 10px;
            border-color: #888;
        border-radius: 35px; /* (height/2) + border-width */
        border-style: solid;
            border-width: 5px;
        margin-top: 15px;
        color: #333;
        font-family: 'Helvetica', sans-serif;
            font-size: 26px;
            -webkit-appearance: none;
            -moz-appearance: none;
        }

        .flexsearch--submit {
        position: absolute;
            right: 0;
            top: 0;
            display: block;
            width: 60px;
            height: 60px;
        padding: 0;
        border: none;
            margin-top: 20px; /* margin-top + border-width */
        margin-right: 5px; /* border-width */
            background: transparent;
        color: #888;
        font-family: 'Helvetica', sans-serif;
        font-size: 40px;
        line-height: 60px;
        }

        .flexsearch--input:focus {
        outline: none;
        border-color: #333;
        }

        .flexsearch--input:focus.flexsearch--submit {
            color: #333;
        }

        .flexsearch--submit:hover {
        color: #333;
        cursor: pointer;
        }

        ::-webkit-input-placeholder {
            color: #888;
        }

        input:-moz-placeholder {
        color: #888
        }


        /****************
        * Pretify demo *
        ****************/
        .h1 {
        float: left;
        margin: 25px;
        color: #333;
        font-family: 'Helvetica', sans-serif;
        font-size: 45px;
        font-weight: bold;
        line-height: 45px;
        text-align: center;
        }
    </style>




</head>

<body>
    <div class="container-fluid">

        <div class="row">
            <div class="col-sm-12 col-xs-12 col-md-12">
                <div class=" pull-right">

                    <?php
                        if($_SESSION["login_user"] == null){
                    ?>


                        <a><button class="btn setmargin" onClick="location.href = 'Login.php'"> ลงชื่อเข้าใช้</button></a> หรือ <a><button class="btn setmargin" onClick="location.href = 'Register.php'"> สมัครสมาชิก</button></a>


                    <?php

                        } else {

                            if($_SESSION["login_user_role"] == 'admin'){

                     ?>
                                <a href = "TempleAdmin.php"><?php echo "Welcome ".$_SESSION["login_user"]; ?></a>

                    <?php

                            } else {

                    ?>
                                <a href = "Monk.php"><?php echo "Welcome ".$_SESSION["login_user"]; ?></a>

                    <?php

                            }

                    ?>

                        <input type="button" class="btn setmargin" value="Logout" onclick="location.href = 'backend/logout.php';">

                    <?php

                        }

                    ?>

                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-sm-12 col-md-12 col-xs-12">
                <img class="img-responsive center-block" src="image/logo.png" alt="logo">
            </div>
        </div>



            <div class="col-xs-12 col-md-12 col-sm-12">

                    <div class="flexsearch--wrapper" style="padding: 0 12% 0 12%;">

                        <form class="form-inline" action="after_search.php" type="GET">

                            <div class="flexsearch--input-wrapper">
                                <input class="flexsearch--input" name="search" type="search" placeholder=" ค้นหา">
                            </div>

                            </form>
                            <br>

                            <form action="after_search.php" type="GET">
                            <div>
                              <button class="btn btn-default" type="search" name="search">ค้นหาวัดทั้งหมด</button>
                            </div>
                          </form>


                    </div>

            </div>




    </div>


</body>

</html>
