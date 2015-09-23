

<!DOCTYPE html>

<html xmlns="http://www.w3.org/1999/xhtml">
<head runat="server">
    <title>XKCD Passwords for You</title>
    <link href="StyleSheet.css" rel="stylesheet" type="text/css" /> 
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.5/css/bootstrap.min.css">
    <?php require 'logic.php'; ?>
</head>
<body>
    <div class="goods">
            <h1>XKCD Password Generator</h1> 
        <div class="output">
            <h1>Generated Password:</h1>
            <h2><?php echo htmlspecialchars($password);?></h2>
        </div>
        <div class="forms">
            <form action="index.php" method="get">
                <h3>Get Another Password</h3>
                Number of Words (2-7):
                <br>
                <input type="number" name="WordNumber" min="2" max="7" value="4" autofocus required>
                <br>
                <input type="checkbox" name="WithNumber" value="Number">                Include a Number
                <br>    
                <input type="checkbox" name="WithChar" value="Charac"> Include a Character
                <br>
                <input type="submit" name="Submit" value="Password Please">
            </form>
           
        </div>
        <div class="explanation">
        <h3>A brief explanation:</h3>
        <img src="images/password_strength.png" alt="XKCD Comic on Password Strength"/>
        </div>
    </div>
</body>

</html>