<?php
$conn = new mysqli("localhost", "root", "", "counseling_system");

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $name = $_POST['name'] ?? '';
    $email = $_POST['email'] ?? '';
    $counselor = $_POST['counselor'] ?? '';
    $date = $_POST['date'] ?? '';

    if ($name && $email && $counselor && $date) {

        $conn->query("INSERT INTO students(name,email) VALUES('$name','$email')");
        $student_id = $conn->insert_id;

        $conn->query("INSERT INTO sessions(student_id,counselor_id,session_date)
        VALUES('$student_id','$counselor','$date')");

        echo "
<!DOCTYPE html>
<html>
<head>
<title>Success</title>
<style>
body {
    font-family: Arial;
    background: linear-gradient(to right, #667eea, #764ba2);
    text-align: center;
    padding-top: 100px;
}

.card {
    background: white;
    padding: 40px;
    margin: auto;
    width: 40%;
    border-radius: 15px;
    box-shadow: 0px 0px 20px rgba(0,0,0,0.2);
}

h2 {
    color: green;
}

a {
    display: inline-block;
    margin-top: 20px;
    padding: 10px 20px;
    background: #667eea;
    color: white;
    text-decoration: none;
    border-radius: 8px;
}
a:hover {
    background: #5a67d8;
}
</style>
</head>
<body>

<div class='card'>
    <h2>✅ Session Booked Successfully!</h2>
    <p>Your counseling session has been scheduled.</p>
    <a href='index.html'>⬅ Back to Home</a>
</div>

</body>
</html>
";

    } else {
        echo "<h2 style='color:red;'>❌ Fill all fields properly!</h2>";
    }
}
?>
