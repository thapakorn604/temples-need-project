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
  <title>Temple edit</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/commonCSS.css" type="text/css">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

  <style type="text/css">
  input.black-box, textarea {

  background-color : #111111;

}
    body
    {
      background:url(images/bg.png) no-repeat center center fixed;
      -webkit-background-size: cover;
      -moz-background-size: cover;
      -o-background-size:cover;
      background-size: cover;
    }
    table{
	    color:#DEDEDE;
	  }
    th{
      text-align:center;
    }
    .whiteLabel{
    	color: white;
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

  function popUp(){
    alert("QR code ได้ถูกส่งไปยังemail ของคุณเรียบร้อยแล้ว");
  }

  </script>



</head>
<body>

<div class="container">

  <div class="row" style="background-color: rgba(0, 0, 0, 0.65); border-radius: 5px; padding: 2%; margin: 3%">
    <div class="col-sm-12 col-md-12 col-xs-12">

      <h4 class="whiteLabel" style="text-align: center; font-weight:bold">แก้ไขวัด</h4>

      <form action="backend/setTemple.php" method="POST" class="form-horizontal ">

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

          $itemNeed = $mysqli->
            query("SELECT * FROM temple_need where temple_id = '$templeId'");


          $itemNoNeed = $mysqli->
            query("SELECT * FROM temple_no_need where temple_id = '$templeId'");

        ?>

        <div class="form-group">
          <label for="nameTemple" class="whiteLabel col-sm-2 control-label">ชื่อวัด:</label>
          <div class="col-sm-8">
            <input class="form-control" type="text" id="nameTemple" name="nameTemple" value="<?php echo $templeName; ?>">
          </div>
        </div>

        <div class="form-group">
            <label for="city" class="whiteLabel col-sm-2 control-label">ข้อมูลวัด:</label>
            <div class="col-sm-8">
              <textarea class="form-control" type="text" id="description" name="description" rows="4"> <?php echo $description; ?> </textarea>
            </div>
        </div>
        
        <div class="form-group">
            <label for="phone" class="whiteLabel col-sm-2 control-label">เบอร์โทร:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="phone" name="phone" value="<?php echo $tel; ?>">
            </div>
        </div>
        <div class="form-group">
            <label for="city" class="whiteLabel col-sm-2 control-label">ที่อยู่:</label>
            <div class="col-sm-8">
              <input class="form-control" type="text" id="address" name="address" value="<?php echo $address; ?>">
            </div>
        </div>
  

          <div class="form-group">
            <label class="whiteLabel col-sm-2 control-label">อัพโหลดรูป:</label>
            <div class="col-sm-8">
                <input class="form-control" type="file" class="btn btn-default" id="InputFile">
            </div>
        </div>

    </div>

    <div class="col-sm-12 col-md-12 col-xs-12">
	    <div class="text-center">
	        <div class="text-center" style="width: 100%">
	          <table class="table table-inverse" >
	            <thead>
	              <tr>
	                <th>ของที่วัดต้องการ</th>
	              </tr>
	            </thead>
	            <tbody>
	              <?php

                  if($itemNeed->num_rows > 1){
                    $i = 1;
                    while($itemNeed_data = $itemNeed->fetch_assoc()){

                        $need = $itemNeed_data["item_need"];
                        $need_id = $itemNeed_data["id"];

                ?>

              <tr>
                <td>
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="item<?php echo $i; ?>" value="<?php echo $need; ?>">
                    <input type="hidden" name="item<?php echo $i; ?>_id" value="<?php echo $need_id; ?>">
                  </div>
                </td>
              </tr>

              <?php
                      $i++;
                    }

                  }else{
                    while($itemNeed_data = $itemNeed->fetch_assoc()){

                        $need = $itemNeed_data["item_need"];
                        $need_id = $itemNeed_data["id"];

              ?>
               <tr>
                <td>
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="item1" value="<?php echo $need; ?>">
                    <input type="hidden" name="item1_id" value="<?php echo $need_id; ?>">
                  </div>
                </td>
              </tr>
              <!--<tr>
                <td>
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="item2">
                  </div>
                </td>
              </tr>-->
              <?php
                    }

                }

              ?>
	            </tbody>
	          </table>

	          <table class="table" >
	            <thead>
	              <tr>
	                <th>ของที่วัดไม่ต้องการ</th>

	              </tr>
	            </thead>
	            <tbody>
	              <?php

                  if($itemNoNeed->num_rows > 1){
                    $i = 1;
                    while($itemNoNeed_data = $itemNoNeed->fetch_assoc()){

                      $noNeed = $itemNoNeed_data["item_no_need"];

                ?>

                <tr>
                  <td>
                    <label class="col-sm-2 control-label"></label>
                    <div class="col-sm-8">
                      <input class="form-control" type="text" id="noitem" name="noitem<?php echo $i; ?>" value="<?php echo $noNeed; ?>">
                    </div>
                  </td>
                </tr>

                <?php
                      $i++;
                    }

                  }else{
                    while($itemNoNeed_data = $itemNoNeed->fetch_assoc()){

                        $noNeed = $itemNoNeed_data["item_no_need"];

              ?>
               <tr>
                <td>
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="noitem1" value="<?php echo $noNeed; ?>">
                  </div>
                </td>
              </tr>
              <!--<tr>
                <td>
                  <label class="col-sm-2 control-label"></label>
                  <div class="col-sm-8">
                    <input class="form-control" type="text" name="noitem2">
                  </div>
                </td>
              </tr>-->
              <?php
                    }

                }

              ?>
	            </tbody>
	          </table>
	        </div>
	    </div>
    </div>

    <div class="col-xs-12 col-md-12 col-sm-12">
      <div class="col-xs-4 col-md-4 col-sm-4">
      </div>

      <div class="col-xs-4 col-md-4 col-sm-4">
        <button type="submit" class="btn btn-primary" style="width: 100%; margin:5px" >ส่ง</button>
      </div>
    </div>

    <div class="col-xs-12 col-md-12 col-sm-12">
      <div class="col-xs-4 col-md-4 col-sm-4">
      </div>

      <div class="col-xs-4 col-md-4 col-sm-4">
        <button onClick="history.go(-1);return true;" class="btn btn-warning" style="width: 100%; margin:5px" >ยกเลิก</button>
      </div>
    </div>



    </form>

  </div>

</div>
</body>
</html>

<?php

    }

?>
