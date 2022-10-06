<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Home</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
    <style>
        .card-text {
            font-size: 19px;
            text-overflow: ellipsis;
            /* white-space: nowrap; */
            overflow: hidden;
        }

  .error {
            color: #FF0000;
        }

    </style>
</head>

<body>
    <!-- nav -->
    <nav class="text-white nav-text navbar navbar-expand-lg fixed-top" style="background-color: #607EAA;">
        <div class="container-fluid">
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarTogglerDemo01" aria-controls="navbarTogglerDemo01" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo01">
                <a class="navbar-brand text-white" href="index.html">
                    <img src="logo.png" width="60" height="60" class="d-inline-block" alt=""> <b>RAIL ASSIST</b>
                </a>
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">
                    <li class="nav-item">
                        <a class="nav-link active text-white" aria-current="page" href="index.html">Home</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" aria-current="page" href="#faq">FAQs</a>
                    </li>
                    <li class="nav-item ">
                        <a class="nav-link text-white" aria-current="page" href="blogpage.html">Blog</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link text-white" aria-current="page" href="contact.php">Contact</a>
                    </li>

                </ul>
                <div class="mx-2">
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#LoginModal">Login</button>
                    <button class="btn btn-outline-light" data-bs-toggle="modal" data-bs-target="#SignUpModal">Signup</button>
                </div>
            </div>
        </div>
    </nav>
    <!-- nav end -->
<div class="col-md" style="background-color:#bbb;">
            <h2><centre>Contact</centre></h2>
            <?php
            $nameErr =$addressErr= $phoneErr = $emailErr = $messageErr = "";
            $name =$address= $phone = $email =  $message = "";
            
            if ($_SERVER["REQUEST_METHOD"] == "POST") {
              if (empty($_POST["name"])) {
                $nameErr = "Name is required";
              } else {
                $name = test_input($_POST["name"]);
                if(!preg_match("/^[a-zA-Z-']*$/",$name)){$nameErr = "Only letters and white space allowed";}
              }
            
              if (empty($_POST["address"])) {
                $addressErr = "address is required";
              } else {
                $address = test_input($_POST["address"]);
                
              }

              if (empty($_POST["phone"])) {
                $phoneErr = "Phone is required";
              } else {
                $phone = test_input($_POST["phone"]);
              }
            
              if (empty($_POST["email"])) {
                $emailErr = "Email is required";
              } else {
                $email = test_input($_POST["email"]);
                if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                  $emailErr = "Invalid email format";
                }
              }
            
              
            
             
              if (empty($_POST["message"])) {
                $messageErr = "";
              } else {
                $message = test_input($_POST["message"]);
              }
            }
            function test_input($data) {
              $data = trim($data);
              $data = stripslashes($data);
              $data = htmlspecialchars($data);
              return $data;
            }
            ?>


            <p><span class="error">* Required Field</span></p>
            <form method="post" action="">
                <div class="mb-3">
                    <label for="Fname" class="form-label"> Name</label>
                    <span class="error">* <?php echo $nameErr;?></span>
                    <input type="text" class="form-control" name="name" placeholder="Name"><br><br>
                </div>
                <div class="mb-3">
                    <label for="Address" class="form-label">address</label>
                    <span class="error">* <?php echo $addressErr;?></span>
                    <input type="text" class="form-control" name="address" placeholder="Address"><br><br>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Phone</label>
                    <span class="error">* <?php echo $phoneErr;?></span>
                    <input type="text" class="form-control" name="phone"><br><br>
                </div>
                <div class="mb-3">
                    <label for="Email" class="form-label">Email</label>
                    <span class="error">* <?php echo $emailErr;?></span>
                    <input type="email" class="form-control" name="email" placeholder="name@example.com">
                    <br<br>
                </div>
                

                <div class="mb-3">
                    <label for="Message" class="form-label">Message</label>
                    <textarea name="message" class="form-control" rows="5" cols="40"></textarea><br><br>
                </div>


                <input class="btn btn-primary" type="submit" value="Submit">

            </form>
        </div>
        <?php

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "hp";

// Create connection
$conn =  new mysqli($servername, $username, $password, $dbname);
// Check connection
if ($conn->connect_error) { 
  die("Connection failed: " . $conn->connect_error);
}



$sql = "INSERT INTO contact_h(name,address,phone,email,message) VALUES ('$name','$address','$phone','$email','$message')";

if ($conn->query($sql) === TRUE) {
  echo "New record created successfully";

} else {
  echo "Error: " . $sql . "<br>" . $conn->error;
}
$conn->close();
?>
   

       

      <div class="container">
    <footer class="py-3 my-4">
      <ul class="nav justify-content-center border-bottom pb-3 mb-3">
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Home</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Features</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">Pricing</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">FAQs</a></li>
        <li class="nav-item"><a href="#" class="nav-link px-2 text-muted">About</a></li>
      </ul>
      <p class="text-center text-muted">© 2022 Company, Inc</p>
    </footer>
  </div>
  
    
</body>
</html>