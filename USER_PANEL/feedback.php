<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <script type="text/javascript">
        function func()
        {
           $('#button').click function()
           {
            alert("Thank You for FeedBack")
           }
        }
        </script>
</head>
<body>
        <?php include'header.php'; ?>

    <h2>Eco-Friendly Website - Feedback Form</h2>

<form method="post" action="submit-feedback.php">
    <label for="name">Your Name:</label><br>
    <input type="text" id="name" name="name"><br><br>

    <label for="email">Your Email:</label><br>
    <input type="email" id="email" name="email"><br><br>

    <label for="message">Your Feedback:</label><br>
    <textarea id="message" name="message" rows="5" cols="30"></textarea><br><br>
    <button> FeedBack </button>
</form>
        <?php include'footer.php'; ?>

</body>
</html>