<?php
    session_start();

    echo "Logout Successfully ";
    session_destroy();   // function that Destroys Session
?>
<html>
<head>
    <title>Logout</title>
</head>
<body>
    <a href="login.php">Login</a>
</body>
</html>
