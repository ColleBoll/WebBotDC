<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>test bericht</title>
</head>
<body>

    <ul>
        <li><a href="/">home page</a></li>
    </ul>

    <form action="../actions/changeCommandName.inc.php" method="POST">
        <label for="Name">Name:</label>
        <input type="text" name="name" id="name" required>
        <button type="submit">Update name</button>
    </form>
    <form action="../actions/changeCommandDescription.inc.php" method="POST">
        <label for="description">Description:</label>
        <input type="text" name="description" id="description" required>
        <button type="submit">Update description</button>
    </form>
    <form action="../actions/changeCommandMessage.inc.php" method="POST">
        <label for="message">Message:</label>
        <input type="text" name="message" id="message" required>
        <button type="submit">Update message</button>
    </form>
</body>
</html>