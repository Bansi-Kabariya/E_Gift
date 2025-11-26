<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Feedback Form</title>
</head>
<body>
    <?php include 'header.php'; ?>

    <h2>Eco-Friendly Feedback</h2>

    <form action="index.php" onsubmit="alert('Thank You for Your Feedback!')">
        <label for="name">Your Name:</label><br>
        <input type="text" id="name" name="name" required><br><br>

        <label for="email">Your Email:</label><br>
        <input type="email" id="email" name="email" required><br><br>

        <label for="message">Your Feedback:</label><br>
        <textarea id="message" name="message" rows="5" cols="30" required></textarea><br><br>

        <button type="submit">Submit Feedback</button>
    </form>

    <?php include 'footer.php'; ?>
</body>
</html>
