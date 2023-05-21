<!DOCTYPE html>
<head>
    <link rel="stylesheet" href="styles.css">
   <style>
    h1{
        margin-left:0px;
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
  tr:hover{
    background-color: #00b3ff;;
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
    <h1 style='margin-left:50px;'>CUSTOMERS</h1>
    
        <?php
        // $host="localhost";
        // $username="root";
        // $password="";
        // $db_name="spark";

        // $conn=mysqli_connect(hostname:$host,
        //                       username:$username,
        //                       password:$password,
        //                       database:$db_name);

        // if(mysqli_connect_errno())
        // {
        //     die("connection error:");
        // }

        // $sql="INSERT INTO customers (name,phoneNo,email,balance) values (?,?,?,?)";

        // $stmt=mysqli_stmt_init($conn);

        // if(!mysqli_stmt_prepare($stmt,$sql)){
        //     die(mysqli_error($conn));
        // }

        // mysqli_stmt_bind_param($stmt,"sisi",NaveenChandra,871232743,nanichandra379gmail.com,89);

        // mysqli_stmt_execute($stmt);
        include('connect.php');

        $display = "SELECT * from users";

        $result=$conn->query($display);
       ?>

       <table id="userTable">
        <tr style="background-color:#00d5ff">
            <th>S No</th>
            <th>NAME</th>
            <th>PHONE NO</th>
            <th>EMAIL-ID</th>
            <th>BALANCE</th>
        </tr>
        <?php
        $sn=1;
           if($result->num_rows > 0)
           {
            while($data = mysqli_fetch_assoc($result)){
           
        ?>

        <tr id="<?php echo $sn ?>">
            <td><?php echo $data["sno"] ?> </td>
            <td><button id='customer-btn' onclick="fun(<?php echo $sn ?>)"><abbr title="view profile"><?php echo $data["name"] ?></abbr></button></td>
            <td><?php echo $data["phoneNo"] ?></td>
            <td><?php echo $data["email"] ?></td>
            <td><?php echo $data["balance"] ?></td>
        </tr>

        <!-- 
            <tr>
            <td colspan='4' >"No data found"</td>
            </tr>
            
         -->
         <?php
           
        $sn++;
    }}
           else{
            ?>
            <tr><td colspan="4">No data found</td></tr>;
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


       <script >


        
                function fun(x)
                {
                 

                // location.href = "profile.php";
                 localStorage.setItem('serialNo',x);

                 var serialNo=localStorage.getItem('serialNo');

                 location.href="profile.php";
          

                 }
            
        </script> 


        
        
        </body>


