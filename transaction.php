<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="styles.css">
   <style>
    h1{
        position: relative;
        left:50px;
    }
    button{
        background: none;
	color: inherit;
	border: none;
	padding: 0;
	font: inherit;
	cursor: pointer;
	outline: inherit;
    }
    .last{
    background-color: black;
    height:300px;
    width:100%;
    margin-top:  150px;
    
    
  }
  .lastLink{
    display: inline-block;
    margin-right: 200px;
  }
   </style>
</head>
<body style="background-color: aqua;">
        <ul id="linkElements">
        <li><h1>      </h1></li>
        <li><h1>  TSF BANK   </h1></li>
        <li><a href="contact.html" id="contact">Contact</a></li>
        <li><a href="about.html" id="about">About</a></li>
        <li><a href="index.html" id="home">Home</a></li>
       </ul>
    <h1 >TRANSACTIONS</h1>
    
        <?php
        // $host="localhost";
        // $username="root";
        // $password="";
        // $db_name="spark";

        // $conn=mysqli_connect(hostname:$host,
        //                       username:$username,
        //                       password:$password,
        //                       database:$db_name);
        
        

        $tz = 'Asia/Kolkata';   
        date_default_timezone_set($tz);
        $timeZone = date_default_timezone_get();


        $sender=$_POST['senderName'];
        $receiver=$_POST['receivernames'];
        $amount=$_POST['amount'];
        $date=date("Y/m/d");
        $time=date("h:i:sa");
        
       
        include('connect.php');

        if(mysqli_connect_errno())
        {
            die("connection error:");
        }

         $sql="INSERT INTO transactions (sender,receiver,amount,paymentDate,paymentTime) values (?,?,?,?,?)";

        $stmt=mysqli_stmt_init($conn);

        if(!mysqli_stmt_prepare($stmt,$sql)){
            die(mysqli_error($conn));
        }

         mysqli_stmt_bind_param($stmt,"ssiss",$sender,$receiver,$amount,$date,$time);

         mysqli_stmt_execute($stmt);
        // if(isset($_POST['submit']))
        // {
        
        // $name=$_POST["senderName"];

        // echo($name);
        // }
        

    //     include('connect.php');

        

        

       $display = "SELECT * from transactions";

        $result=$conn->query($display);
        ?>

        <table id="transactionstable" style="margin-bottom:30px">
         <tr>
            <th>S No</th>
             <th>SENDER</th>
             <th>RECEIVER</th>
             <th>AMOUNT</th>
             <th>DATE</th>
             <th>TIME</th>
         </tr>
         <?php 
         $sn=1;
            if($result->num_rows > 0)
            {
             while($data = mysqli_fetch_assoc($result)){
           
        ?>

        <tr>
            <td><?php echo $sn ?> </td>
            <td><?php echo $data["sender"] ?></td>
            <td><?php echo $data["receiver"] ?></td>
            <td><?php echo $data["amount"] ?></td>
            <td><?php echo $data["paymentDate"] ?></td>
            <td><?php echo $data["paymentTime"] ?></td>
            
        </tr>

        
            
            
  
         <?php
           
        $sn++;
    }}
           else{
            ?>
            <tr><td colspan="6">No data found</td></tr>;
        <?php

        }
         ?>
       </table>

       <div class="last">
        <h1 style="color:whitesmoke;padding-left: 150px;padding-top: 50px;">Contact</h1>

    <div class="lastLink" style="padding-left: 300px;margin-top: 10px;">

        <a href="https://www.linkedin.com/in/naveen-chandra-9197b2249/"><img src="pictures/linkedIn2.png" height="100px" width="100px"></a>
    </div>
    <div class="lastLink">
        <a href="#insta"><img src="pictures/instagram.jpg" height="100px" width="100px"></a>
    </div>
    <div class="lastLink">
        <a href="#face"><img src="pictures/facebook.webp" height="100px" width="100px"></a>
    </div>
    <div class="lastLink">
        <a href="https://github.com/NaveenChandra379/"><img src="pictures/github.png" height="100px" width="100px"></a>
    </div>
    <p style="color:white;float:right;margin-right: 130px;margin-top: 10px;">NAVEEN CHANDRA<br>+91 8712327436<br>THE SPARKS FOUNDATION</p>

    </div>
       <script>
        window.alert('Transaction succesful')
        </script>

        
        
        </body>


