<?php
$name = $_POST['name'];
$email = $_POST['email'];
$qualification = $_POST['qualification'];
$age = $_POST['age'];
$dob = $_POST['dob'];
$gender = $_POST['gender'];

//database connection 
$conn = new mysqli('localhost','root','','anbu');
if($conn->connect_error){
  echo "$conn->connect_error";
  die('connection Failed :'.$conn->connect_error);
} else {
  $stmt = $conn->prepare("insert into admi(name,email,qualification,age,dob,gender) values(?,?,?,?,?,?)");
  $stmt->bind_param("sssiss",$name, $email, $qualification, $age, $dob, $gender);
  $stmt->execute();
  ?>
  <link rel="stylesheet" href="style.css" />
  <body class="success-body">
    <div class="card">
      <div style="border-radius:200px; height:200px; width:200px; background: #F8FAF5; margin:0 auto;">
        <i class="checkmark">✓</i>
      </div>
      <h1 class="success-h1">Success</h1> 
      <p class="success-p">We received your detials;<br/> we'll be in touch shortly!</p>
    </div>
  </body>
<?php
  $stmt->close();
  $conn->close();
 }
?>
