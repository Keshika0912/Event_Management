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
    $register_query = "INSERT INTO `daform`(`fname`, `lname`, `email`, `phone`, `dept`, `year`, `regnum`) 
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
?>



<html>
    <head>
        <title>Timer</title>
    </head>
    <body>
    <form method="POST" action="#">
        Date*<input type="date" name="date" value="<?php echo $date;?>">
        H* <input type="number" name="h" value="<?php echo $h;?>">
        M* <input type="number" name="m" value="<?php echo $m;?>">
        S*<input type="number" name="s" value="<?php echo $s;?>">
        <button type="submit" name="update">Update</button>
    </form>
    <!-- <script>
        var countDownDate = <?php 
        echo strtotime("$date $h:$m:$s" ) ?> * 1000;
        var now = <?php echo time() ?> * 1000;

        // Update the count down every 1 second
        var x = setInterval(function() {
        now = now + 1000;
        // Find the distance between now an the count down date
        var distance = countDownDate - now;
        // Time calculations for days, hours, minutes and seconds
        var days = Math.floor(distance / (1000 * 60 * 60 * 24));
        var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
        var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
        var seconds = Math.floor((distance % (1000 * 60)) / 1000);
        // Output the result in an element with id="demo"
        document.getElementById("demo").innerHTML = days + "d " + hours + "h " +
        minutes + "m " + seconds + "s ";
        // If the count down is over, write some text 
        if (distance < 0) {
        clearInterval(x);
        document.getElementById("demo").innerHTML = "EXPIRED";
        }
            
        }, 1000);

    </script> -->
    </body>
</html>

