<!DOCTYPE html>
<head>
    
<link rel="stylesheet" href="styles.css">
<style>
    #profileimage{
    position: relative;
    left: 70px;
  }
  #profiledummy{
    padding-left: 190px;
    font-size:30px;
    
  }
  #viewtransaction-btn{
    margin-top: 40px;
    margin-right: 20px;
  }

  .actions
  {
    display: flex;
    margin-left: 100px;
    /* margin-top: 30px; */
    background-color: white;
    width:1300px;
    padding-left: 150px;
    padding-bottom:30px;
    margin-top:5px;
    border-radius:10px;
  }
  input[type="text"]
  {
    border:none;
    outline:none;
    border-bottom: 1px solid black;
    
    margin-top: 0%;

  }
  #amount{
    border:none;
    outline:none;
    border-bottom: 1px solid black;
    margin-top: 0%;


  }

  .transactionsClass{

    display: flex;
    margin-left: 100px;
    /* margin-top: 30px; */
    width: 1300px;
    background-color:white;
    min-height :350px;
    border-radius:10px;
    margin-top:5px;

    
    
    

  }

  #usertransactionstable{
    width:1200px;
    background-color:white;
    margin-top:30px;
    margin-bottom:30px;
  }

  .sender{
    margin-left: 50px;
    padding-top: 50px;
    
    margin-right: 100px;
    
  }
  .receiver{
    padding-top: 50px;
    margin-left: 100px;

  }
  .input{
    outline:none;

  }

  .last{
    background-color: black;
    height:300px;
    width:100%;
    margin-top:  100px;
    
    
  }
  .lastLink{
    display: inline-block;
    margin-right: 200px;
  }
  tr:hover{
    background-color:pink;
  }


</style>

<script>

var serialNo=localStorage.getItem('serialNo');


document.cookie="serNo"+"="+serialNo;

(function()
{
if( window.localStorage )
{
if( !localStorage.getItem('firstLoad') )
{
  localStorage['firstLoad'] = true;
  window.location.reload();
}  
else
  localStorage.removeItem('firstLoad');
}
})();

  </script>

</head>

<body style="background-color: aqua;" >


    
    
        <ul id="linkElements">
        <li><h1>      </h1></li>
        <li><h1>  TSF BANK   </h1></li>
        <li><a href="contact.html" id="contact">Contact</a></li>
        <li><a href="about.html" id="about">About</a></li>
        <li><a href="index.html" id="home">Home</a></li>
       </ul>

    <?php
         include('connect.php');

         $serial_No = $_COOKIE['serNo'];

         $display = "SELECT * from users where sno=$serial_No";

         $display2= "SELECT * from users where not sno=$serial_No";

         

         

         $result=$conn->query($display);

         

         if($result->num_rows>0)
         {
          $data= mysqli_fetch_assoc($result);
         }
        
      
       
?>



    <div class="profile" >
    <div class="profileImage" >
        
        <img src="pictures/profile.webp" alt="profile" id="profileimage"  height="250px" width="350px">
        <p id="profiledummy" style="font-size:30px;"><?php echo $data["name"] ?></p>
    </div> 
    
    <div class="profileInformation" >
        
        <p>NAME:<span id="name"><?php echo $data["name"] ?></span></p>
        <p>PHONE NO: <span id="phno">+91 <?php echo $data["phoneNo"] ?></span></p>
        <p>EMAIL:<span id="email"><?php echo $data["email"] ?></span></p>
        <p>BALANCE: <span id="balance"><?php echo $data["balance"] ?></span></p>
        <button id="viewtransaction-btn">VIEW TRANSACTIONS</button>
        <button id="transferBtn">TRASNSFER</button>
    </div>

    

    </div>

    <!--border radius-->

    

    <form action='transaction.php' method="POST">

    <div class="actions" style="display:none">

    
     <div class="sender">
        <img src="pictures/senderIcon.png" alt="sender" height="200px" width="200px">
        <br>
        <input type="text" id="senderName" name="senderName" value="<?php echo $data["name"] ?>" style="padding-left:30px;font-size:20px;padding-right:0px;max-width:200px">
        
    </div>

    <div class="banktransfer">
        <img src="pictures/minibank.jpg" alt="transfer" height="200px" width="200px" style="margin-top:30px">
        <br>
        <img src="pictures/arrow.gif"  alt="arrow"  height="50px" width="250px" style="padding-left: 20px;">
        <br>
        <p  style="margin-bottom:10px"><span >Enter Amount: <input type="text" id="amount" name="amount"></span></p>
        <br>
        <input type="submit" id="submit" name="submit" style="margin-left: 70px; padding :3px 30px 3px 30px;" value="SEND">
        
    </div>

    <div class="receiver">
        <img src="pictures/senderIcon.png" alt="receiver" height="200px" width="200px">
        <br>


        <select name="receivernames" id="receivernames" style="margin:10px 0px 0px 50px;">
        <option selected="selected">select</option>
        <?php

          

          $result2=$conn->query($display2);

          if($result2->num_rows>0)
          {
           while($data2=mysqli_fetch_assoc($result2))
           {
            ?>
          
            <option value="<?php echo $data2["name"] ?>"><?php echo $data2["name"] ?></option>
            
        <?php

           }}

           ?>
      
        </select>

        </div>
</div>
          </form>

          <div class="transactionsClass" style="display:none">

          

          <?php 

          $sender=$data['name'];

          $transactions="SELECT * from transactions where sender='$sender'";

          $result3=$conn->query($transactions);

          ?>

        <table id="usertransactionstable">
         <tr style="background-color:pink">
            <th>S No</th>
             
             <th>RECEIVER</th>
             <th>AMOUNT</th>
             <th>DATE</th>
             <th>TIME</th>
         </tr>
         <?php 
         $sn=1;
            if($result3->num_rows > 0)
            {
             while($data3 = mysqli_fetch_assoc($result3)){
           
        ?>
          
          
          
          
         

        <tr>
            <td><?php echo $sn ?> </td>
            
            <td><?php echo $data3["receiver"] ?></td>
            <td><?php echo $data3["amount"] ?></td>
            <td><?php echo $data3["paymentDate"] ?></td>
            <td><?php echo $data3["paymentTime"] ?></td>
            
        </tr>

        
            
            
  
         <?php
           
        $sn++;
    }}
           else{
            ?>
            <tr><td colspan="6">No data found</td></tr>
        <?php

        }
         ?>
       </table>


          </div>

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




          <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.4/jquery.min.js"></script>


        <script>

           

            $(document).ready(function(){
            
            $("#transferBtn").click(function(){
              $("div.transactionsClass").hide();

              $("div.actions").toggle();
            });

            $("#viewtransaction-btn").click(function(){
              $("div.actions").hide();
              $("div.transactionsClass").toggle();
            });
          });
            

       
          </script>
    

 





</body>




