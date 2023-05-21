<?php
        $host="localhost";
        $username="root";
        $password="";
        $db_name="spark";

        $conn=mysqli_connect(hostname:$host,
                              username:$username,
                              password:$password,
                              database:$db_name);

        if(mysqli_connect_errno())
        {
            die("connection error:");
        }
        ?>