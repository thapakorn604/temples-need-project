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
  <title>Temple edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/commonCSS.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">

  .table {
            border-radius: 5px;
            width: 50%;
            margin: 0px auto;
            float: none;
        }

    body
    {
      background:url(images/bg.png) no-repeat center center fixed;
        -webkit-background-size: cover;
        -moz-background-size: cover;
        -o-background-size:cover;
        background-size: cover;
    }
    .nopadding {
          padding: 0 !important;
          margin: 0 !important;
        }
    .setmargin{
      margin-left: 13px;
      background-color: black;
      color: white;
      opacity: 0.8;
      font-size: 1.5em;
      margin-bottom: 13px;
      margin-top: 5px;
    }
    .btn-file {
    position: relative;
    overflow: hidden;
    }
    .btn-file input[type=file] {
        position: absolute;
        top: 0;
        right: 0;
        min-width: 100%;
        min-height: 100%;
        font-size: 100px;
        text-align: right;
        filter: alpha(opacity=0);
        opacity: 0;
        outline: none;
        background: white;
        cursor: inherit;
        display: block;
    }

    #img-upload{
        width: 100%;
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

      location.href='./EditTemple.php?id='+id;

  }

  function deleteTemple(id) {

      location.href='./backend/deleteTemple.php?id='+id;

  }  


  </script>



</head>
<body>

<div class="container">
<div class="row">

  <button class="btn setmargin" onClick="location.href = './index.php';">< หน้าแรก</button>
  <button class="btn setmargin pull-right" onClick="location.href = 'backend/logout.php';"> Logout</button>
  
</div>

  <div class="row">
    <div class="col-sm-12 col-md-12 col-xs-12">

         <div class="row table-responsive" style="left:30%; right:30%; background-color: rgba(0, 0, 0, 0.65); border-radius: 5px; padding: 2%;">

                <table class="table table-condensed" id="templelist" style="color: #E1E1E1;">
                    <thead>
                        <tr>
                            <th>ชื่อวัด</th>
                            <th>ชื่อผู้ใช้</th>

                        </tr>
                    </thead>

                    <tbody id="parent">

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

                        <tr>
                            <td><?php echo $resultTemple["name"];  ?></td>
                            <td id="t2"><?php echo $resultMonk["username"];  ?></td>
                        </tr>
                        <tr>

                            <td></td>
                            <td> 
                                <button class="btn btn-warning" onClick="editTemple(<?php echo $templeId; ?>)"> Edit </button>
                                <button class="btn btn-danger" onClick="deleteTemple(<?php echo $templeId; ?>)"> Delete </button>
                            </td>
                        
                        </tr>

                        <?php
                                }
                        
                            }
                        ?>

                    </tbody>


                </table>

  </div>

</body>
</html>

<?php 

    }

?>
