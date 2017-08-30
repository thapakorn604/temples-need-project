<!DOCTYPE html>
<html lang="en">

<head>
    <title>Register</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>

    <style type="text/css">
        body {
            background: url(image/RegisterBG.jpg) no-repeat center center fixed;
            -webkit-background-size: cover;
            -moz-background-size: cover;
            -o-background-size: cover;
            background-size: cover;
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




</head>

<body>

    <div class="container">
        <div class="row">
            <button class="btn setmargin" onClick="history.go(-1);return true;">&lt;	&nbsp; กลับ</button>
        </div>
        <form action="backend/register-process.php" method="POST">
            <div class="form-group">
                <label for="username">Username:</label>
                <input class="form-control" type="text" id="username" name="username" placeholder="ชื่อผู้ใช้" required>
            </div>
            <div>
                <label for="password">Password:</label>
                <input class="form-control" type="password" id="password" name="password" placeholder="๏๏๏๏๏๏" required>
            </div>
            <div>
                <label for="password">Re-Password:</label>
                <input class="form-control" type="password" id="repassword" name="repassword" placeholder="๏๏๏๏๏๏" required>
            </div>

            <div>
                <label for="email">Email:</label>
                <input class="form-control" type="email" id="email" name="email" placeholder="abc@mail.com" required>
            </div>

            <div class="form-group">
                <label for="exampleTextarea">ข้อตกลง</label>
                <textarea readonly class="form-control" id="exampleTextarea" rows="10">
            You agree that by clicking “Join Now” “Join LinkedIn”, “Sign Up” or similar, registering, accessing or using our services (including LinkedIn, SlideShare, Pulse, our related mobile apps, developer platforms, premium services, or any content or information provided as part of these services, collectively, “Services”), you are entering into a legally binding agreement (even if you are using our Services on behalf of a company). If you reside in the United States, your agreement is with LinkedIn Corporation and if you reside outside of the United States, your agreement is with LinkedIn Ireland Unlimited Company (each, “LinkedIn” or “we”).

          This “Agreement” includes this User Agreement and the Privacy Policy, and other terms that will be displayed to you at the time you first use certain features (such as starting a “Group,” downloading one of our software applications or purchasing advertisements or InMails™), as may be amended by LinkedIn from time to time. If you do not agree to this Agreement, do NOT click “Join Now” (or similar) and do not access or otherwise use any of our Services.

          Registered users of our Services are “Members” and unregistered users are “Visitors”. This Agreement applies to both.




          </textarea>
                <div style="color:black; margin-top:5px; font-weight: bold;">
                    <input type="checkbox" style="color:black; margin:2px;">Accept this licient agrrement
                </div>
                <br>
                <button type="submit" class="btn btn-primary" style="width: 100%" onclick="registerconfirmed()">Submit</button>
            </div>
        </form>
    </div>
    <script>
        function registerconfirmed() {
            var name = document.getElementById("username").value;
            alert("Welcome to our website " + name);
        }
    </script>
</body>

</html>
