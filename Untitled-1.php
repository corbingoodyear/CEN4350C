<?php
// Define variables and initialize with empty values
$name = $email = "";
$name_err = $email_err = "";

// Processing form data when form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate name
    if (empty(trim($_POST["name"]))) {
        $name_err = "Please enter your name.";
    } else {
        $name = trim($_POST["name"]);
    }
    
    // Validate email
    if (empty(trim($_POST["email"]))) {
        $email_err = "Please enter your email address.";
    } else {
        $email = trim($_POST["email"]);
        // Check if email address is well-formed
        if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
            $email_err = "Invalid email format.";
        }
    }

    // If there are no errors, proceed with processing the form data
    if (empty($name_err) && empty($email_err)) {
        // Here you can process the form data, such as saving to a database or sending an email
        // For this example, we'll just print the submitted data
        echo "Submitted name: " . $name . "<br>";
        echo "Submitted email: " . $email;
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Form Validation</title>
</head>
<body>
    <h2>Sample Form</h2>
    <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
        <div>
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo htmlspecialchars($name); ?>">
            <span><?php echo $name_err; ?></span>
        </div>
        <div>
            <label for="email">Email:</label>
            <input type="text" id="email" name="email" value="<?php echo htmlspecialchars($email); ?>">
            <span><?php echo $email_err; ?></span>
        </div>
        <div>
            <input type="submit" value="Submit">
        </div>
    </form>
</body>
</html>
