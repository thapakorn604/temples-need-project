<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="css/Forgetpassword-Style.css" type="text/css">
  <link rel="stylesheet" href="css/commonCSS.css" type="text/css">
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" integrity="sha384-BVYiiSIFeK1dGmJRAkycuHAHRg32OmUcww7on3RYdg4Va+PmSTsz/K68vbdEjh4u" crossorigin="anonymous">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.0/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

<style type="text/css">
  
.scale-up{
  width: 100%;
}
.nopadding {
   padding: 0 !important;
   margin: 0 !important;
}
img.phone{
  width: 10%;
  max-width: 50px;
}
.setmargin{
      margin-left: 10px;
      background-color: black;
      color: white;
      opacity: 0.8;
      font-size: 1.5em;
      margin-bottom: 13px;
      margin-top: 5px;
    }
.temple-needlist{
  font-size: 2em;
}

</style>

<script type="text/javascript">
  function popUp(){
    alert("ข้อมูลได้ถูกส่งไปยังผู้ดูแลระบบเรียบร้อยแล้ว");
  }
</script>



</head>

<body>
   <div class="container-fluid" style="background-color: rgba(255, 255, 255, 0.75)"> 
      



      <div class="row">

        <div class="col-xs-3 col-sm-1 col-md-3 nopadding">
          <button class="btn setmargin" onClick="history.go(-1);return true;">< กลับ</button>           
        </div>
      </div>

        <?php

          $search_id = $_GET["id"];
          require_once("backend/mysql.php");
          $resultTemple = $mysqli->
        					query("SELECT * FROM temple where temple_id = '$search_id'");
        ?>
        <br>
        <div class="col-xs-12 col-md-12 col-sm-12 nopadding">
          <p style="font-size: 4.5vmax; line-height: 2;"> 
            <?php 
           			 $temple = $resultTemple-> fetch_assoc();
            		echo $temple["name"];
        		?>
          </p>
          
        </div>
        
        
        

      <div class="row">

        <div class="col-xs-12 col-sm-12 col-md-6 nopadding" style="padding-top: 2%">
          <img class="img-responsive" src="image/temple1.jpg" alt="Temple" />
        </div>
      

    

        <div class="col-xs-12 col-sm-12 col-md-6" style="background-color: orange">
          <img class="phone" style="margin: 3px;" src="image/phone.png" alt="Temple" />
        <span style="font-size: 2em"><?php echo $temple["tel"]; ?></span> 
        
        </div>

        <div class="col-xs-12 col-sm-12 col-md-6 ">

          <span class="temple-needlist" style="color: green;">ของที่วัดต้องการ</span>
          <div class="col-md-12" style="border-bottom: solid 1px;">     </div>
          <br>
          <?php
    
            $resultNeed= $mysqli->query("SELECT * FROM temple_need where temple_id = '$search_id'");
        
            while($data = $resultNeed->fetch_assoc()){

         ?>
          <p class="temple-needlist text-left">
          • <?php echo $data["item_need"]; ?>
          <br>
          </p>
          <?php
            }
          ?>

          <br>

          <span class="temple-needlist" style="color: red">ของที่วัดไม่ต้องการ</span>
          <div class="col-md-12" style="border-bottom: solid 1px;">     </div>
          <?php
    
            $resultNoNeed= $mysqli->query("SELECT * FROM temple_no_need where temple_id = '$search_id'");
      
            while($data = $resultNoNeed->fetch_assoc()){ 

    		  ?>
          <br>
          <p class="temple-needlist text-left">
          • <?php echo $data["item_no_need"]; ?>
          <br>
          </p>
          <?php
    			  }
   			  ?>
          <div style="background-color: white; margin:10% 10% 0% 10%; border-radius: 10px; padding: 1%;">
              <h4 style="font-weight: bold">
                ที่อยู่:
              </h4>
              <p>
                <?php 
                  echo $temple["address"];
                ?>
              </p>
              <h4 style="font-weight: bold">
                รายละเอียด:
              </h4>
              <p>
                <?php 
                  echo $temple["description"];
                ?>
              </p>
          </div>
        </div>

      </div>

      <div class="row">
        <div class="col-sm-12 col-xs-12 col-md-12 nopadding" style="background-color: rgba(0, 0, 0, 0.5)">
        <div class="col-md-12 nopadding" style="border-bottom: solid 2px;">     </div>
        

             <!--<span style="font-size: 2em;color: white;">ติดต่อผู้ดูแลระบบ <a data-toggle="modal" data-target="#myModal">คลิ๊ก</a> </span>-->

            <!-- Modal -->
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






          
        </div>
      </div>
  </div>
  

        
  
	
  
</body>
</html>
