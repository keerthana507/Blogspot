
<!DOCTYPE html>
<html>
<head>
    <title>Contact Form</title>
</head>
<body>

<?php
// Define variables to store form data
$first_name = $password = $state = $description = "";
$success_message = "";

// Check if the form is submitted
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Validate and sanitize form inputs
    $first_name = sanitizeInput($_POST["first_name"]);
    $password = sanitizeInput($_POST["password"]);
    $state = sanitizeInput($_POST["state"]);
    $description = sanitizeInput($_POST["description"]);

    // If everything is valid, display success message
    if (!empty($first_name) && !empty($password) && !empty($state) && !empty($description)) {
        $success_message = "Form submitted successfully!";
    }
}

// Function to sanitize user input
function sanitizeInput($data) {
    $data = trim($data);
    $data = stripslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
?>

<h2>Contact Form</h2>
<form method="post" action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>">
    First Name: <input type="text" name="first_name" required><br>
    Password: <input type="password" name="password" required><br>
    State: <input type="text" name="state" required><br>
    Description: <textarea name="description" required></textarea><br>
    <input type="submit" value="Submit">
</form>

<?php
// Display success message if the form was successfully submitted
if (!empty($success_message)) {
    echo "<p style='color: green;'>$success_message</p>";
}
?>

</body>
</html>

    