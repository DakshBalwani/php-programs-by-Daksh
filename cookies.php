<!-- php code to set and access cookies -->
 <?php
 setcookie("username", "Akshay Jain", time()+30*24*60*60);
    if(isset($_COOKIE["username"])) {
        echo "Welcome back, " . $_COOKIE["username"] . "!<br>";
    } else {
        echo "Welcome, new user! <br>";
    }
    print_r($_COOKIE);
    ?>