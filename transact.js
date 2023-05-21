// var mysql=require('mysql');

// var conn = mysql.createConnection({
//     host: "localhost",
//     user: "root",
//     password: "",
//     database: "spark"
//   });

// var customer_btn=document.getElementById("customer-btn");


// function fun(x)
// {
//     location.href = "profile.html";

//     conn.connect(function(err) {
//     if (err) throw err;
//     //Select all customers and return the result object:
//     conn.query("SELECT * FROM users where sno=1", function (err, result, fields) {
//       if (err) throw err;
//       console.log(result);
//     });
//   });
// };