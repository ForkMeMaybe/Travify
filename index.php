<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $age = $_POST['age'];
    $gender = $_POST['gender'];
    $email = $_POST['email'];
    $phone = $_POST['phone'];
    $desc = $_POST['desc'];

    $url = getenv("DATABASE_URL");
    if ($url) {
        $db = parse_url($url);
        $host = $db["host"];
        $port = 5432;
        $user = $db["user"];
        $password = $db["pass"];
        $dbname = ltrim($db["path"], "/");
    } else {
        $host = "localhost";
        $port = "5432";
        $user = "odd";
        $password = "aezakmi";
        $dbname = "travel_form";
    }


    $conn = pg_connect("host=$host port=$port dbname=$dbname user=$user password=$password");

    if (!$conn) {
        die("❌ Connection failed: " . pg_last_error());
    }

    $sql = "INSERT INTO trip (name, age, gender, email, phone, other, dt) 
            VALUES ($1, $2, $3, $4, $5, $6, current_timestamp)";
    $result = pg_query_params($conn, $sql, array($name, $age, $gender, $email, $phone, $desc));

    pg_close($conn);

    if ($result) {
        // ✅ Redirect to thank you page
        header("Location: index.html");
        exit();
    } else {
        echo "❌ Error inserting record: " . pg_last_error($conn);
    }
}
?>

<!-- If not a POST request, show the form -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome to Travel Form</title>
    <link href="https://fonts.googleapis.com/css?family=Roboto|Sriracha&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <img class="bg" src="lpu2.jpg" alt="LPU Punjab">
    <div class="container">
        <h1>Welcome to LPU Punjab US Trip form</h1>
        <p>Enter your details and submit this form to confirm your participation in the trip</p>

        <form action="index.php" method="post">
            <input type="text" name="name" id="name" placeholder="Enter your name" required>
            <input type="text" name="age" id="age" placeholder="Enter your Age" required>
            <input type="text" name="gender" id="gender" placeholder="Enter your gender" required>
            <input type="email" name="email" id="email" placeholder="Enter your email" required>
            <input type="text" name="phone" id="phone" placeholder="Enter your phone" required>
            <textarea name="desc" id="desc" cols="30" rows="10" placeholder="Enter any other information here"></textarea>
            <button class="btn">Submit</button> 
        </form>
    </div>
    <script src="index.js"></script>
</body>
</html>

