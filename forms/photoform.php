<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname="form";
try{
    $conn = mysqli_connect($servername, $username, $password, $dbname);
        // echo("Successful in connection");
    } catch(MySQLi_Sql_Exception $ex) {
        // echo("error in connection");
}

if(isset($_POST['submit'])){
    $fname=$_POST['fname'];
    $lname=$_POST['lname'];
    $email=$_POST['email'];
    $phone=$_POST['phone'];
    $dept=$_POST['dept'];
    $year=$_POST['year'];
    $regnum=$_POST['regnum'];
    $register_query = "INSERT INTO `photoform`(`fname`, `lname`, `email`, `phone`, `dept`, `year`, `regnum`) 
    VALUES ('$fname','$lname','$email','$phone','$dept','$year','$regnum')";

    try{
        $register_result = mysqli_query($conn, $register_query);
        if($register_result){
        if(mysqli_affected_rows($conn)>0){
            // echo("registration successful");
        }else{
            // echo("error in registration");
        }
        }
        }catch(Exception $ex){
            echo("error".$ex->getMessage());
        }
}
if($_SERVER['REQUEST_METHOD'] == "POST"){
    if(empty($_POST['fname'])){
        $fname_error = "*Please enter the firstname";
    } 
    if(empty($_POST['lname'])){
        $lname_error = "*Please enter the lastname";
    }
    if(empty($_POST['email'])){
        $email_error = "*Please enter the email";
    }
    if(empty($_POST['phone'])){
        $phone_error = "*Please enter the phone number";
    }
    if(empty($_POST['dept'])){
        $dept_error = "*Please enter the department";
    }
    if(empty($_POST['year'])){
        $year_error = "*Please enter the year ";
    }
    if(empty($_POST['regnum'])){
        $regnum_error = "*Please enter the register number";
    }
}
    if($fname && $lname && $email && $phone && $dept && $year && $regnum) {

        header('location: ../Successmsg.html');
        //or below types
    }
?>

<html>
    <head>
        <title>Photography</title>
        <script src="https://kit.fontawesome.com/a076d05399.js" crossorigin="anonymous"></script>
        <link href="https://fonts.googleapis.com/css2?family=Scheherazade+New&display=swap" rel="stylesheet">
        <style>
            tr {
                margin-top:20px;
            }
            h1{
                font-family: 'Scheherazade New', serif;
                font-size: 20px;
            }
            .mandatory{
                color: red;
                
            }
            p{
                font-family: 'Scheherazade New', serif;
                font-size: 15px;
            }
            input[type=submit] {
                /* width: 100%; */
                background-color: #1F00FF;
                color: white;
                padding: 14px 20px;
                margin: 8px 0;
                border: none;
                border-radius: 4px;
                cursor: pointer;
                display: grid;
                align-self: center;
            }
            input[type=submit]:hover {
                background-color: #1D02E3;
            }
            .btn{
                width: 150px;
                height: 40px;
                margin: 0;
                position: absolute;
                top: 110%;
                left: 50%;
                -ms-transform: translate(-50%, -50%);
                transform: translate(-50%, -50%);
            }
        </style>
        
    </head>
    <body style="background-color: black">
    
    <div>
        <div>
            <a href ="../Home.html">
            <i class="fas fa-long-arrow-alt-left" style ="width: 50px; top: 0; left: 0"></i></a>
        </div>
        <div>
            <img src="../Banners/photography.png" style="display: block; margin-left: auto; margin-right: auto; width:60%; border-radius: 5px;"></img>
        </div>
    </div>
  
    <div style="background-color: #ffd8d5ff;  width:60%; height: 100%; margin-left: auto; margin-right: auto; margin-top: 25px; border-radius: 5px; border-top: solid #ff6051ff 10px">
        <form method="post" auto_complete="off" action="" style="margin-top:10px">
        <table align="center">
            <tr>
                <td><h1 class="text">First Name :</h1></td>
                <td><input type="text" name="fname" placeholder="John" style="margin:10px; width:300px; height: 35px">
                <span class="mandatory"><?php if(isset($fname_error)) echo $fname_error;?></span>
                </td>
            </tr>
            <tr>
                <td><h1 class="text">Last Name :</h2></td>
                <td><input type="text" name="lname" placeholder="Applessed" style="margin:10px; width:300px; height: 35px">
                <span class="mandatory"><?php if(isset($lname_error)) echo $lname_error;?></span>
                </td>
            </tr>
            <tr>
                <td><h1 class="text">Email :</h1></td>
                <td><input type="email" name="email" placeholder="john@example.com" style="margin:10px; width:300px; height: 35px">
                <span class="mandatory"><?php if(isset($email_error)) echo $email_error;?></span>
                </td>
            </tr>
            <tr>
                <td><h1 class="text">Phone :</h1></td>
                <td><input type="tel" name="phone" placeholder="9876543210" style="margin:10px; width:300px; height: 35px">
                <span class="mandatory"><?php if(isset($phone_error)) echo $phone_error;?></span>
                </td>
            </tr>
            <tr>
                <td><h1 class="text">Department :</h1></td>
                <td><input type="text" name="dept" placeholder="Software" style="margin:10px; width:300px; height: 35px">
                <span class="mandatory"><?php if(isset($dept_error)) echo $dept_error;?></span>
                </td>
            </tr>
            <tr>
            <td><h1>Year :</h1></td>
                <td><input type ="radio" name="year" value="1" style="margin:10px; width:20px; height: 20px">1
                <input type ="radio" name="year" value="2" style="margin:10px; width:20px; height: 20px">2
                <input type ="radio" name="year" value="3" style="margin:10px; width:20px; height: 20px">3
                <input type ="radio" name="year" value="4" style="margin:10px; width:20px; height: 20px">4
                <span class="mandatory" style="margin-left: 117px"><?php if(isset($year_error)) echo $year_error;?></span>
                </td>
            </tr>
            <tr>
                <td><h1 class="text">Register Number :</h1></td>
                <td><input type="text" name="regnum" placeholder="12345678" style="margin:10px; width:300px; height: 35px">
                <span class="mandatory"><?php if(isset($regnum_error)) echo $regnum_error;?></span>
                </td>
            </tr>
            <tr>
                <td style="margin-left: 40%; align:center"><input type="submit" class="btn" name="submit" value="REGISTER" id='alert' onclick="myFunction()" style="margin:20px ; justify-content: center; " ></td>
            </tr>
        </table>
        </form>
    </div>
    
    </body>
</html>

