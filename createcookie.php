<!-- write a php code to get visitors personalise details in a cookie with browsers theme color, language etc. when they visit the site leave them personalised messages with number of visits on that page -->
<!-- // cookie value is not updated until the next page load, so we need to update the visit count for the current visit -->
<!-- ask color from user and lanuage also
 and backgrounf of the site should also use that color as background color 
 and also make user to accept cookie or not -->
 <!-- visitors count should work on reload also  -->
<?php
// Start session (for immediate visit count update)
session_start();

// Default values
$bgColor = "#ffffff";
$language = "English";
$visitCount = 0;
$cookieAccepted = false;

// Check cookie consent
if (isset($_POST['accept_cookie'])) {
    setcookie("cookie_consent", "accepted", time() + (86400 * 30*24*365)); // 1 year
    $_COOKIE['cookie_consent'] = "accepted";
}

if (isset($_POST['decline_cookie'])) {
    setcookie("cookie_consent", "declined", time() + (86400 * 30));
    $_COOKIE['cookie_consent'] = "declined";
}

// If cookies accepted
if (isset($_COOKIE['cookie_consent']) && $_COOKIE['cookie_consent'] == "accepted") {
    $cookieAccepted = true;

    // Save preferences
    if (isset($_POST['color']) && isset($_POST['language'])) {
        setcookie("bgcolor", $_POST['color'], time() + (86400 * 30));
        setcookie("language", $_POST['language'], time() + (86400 * 30));

        $_COOKIE['bgcolor'] = $_POST['color'];
        $_COOKIE['language'] = $_POST['language'];
    }

    // Load preferences
    if (isset($_COOKIE['bgcolor'])) {
        $bgColor = $_COOKIE['bgcolor'];
    }

    if (isset($_COOKIE['language'])) {
        $language = $_COOKIE['language'];
    }

    // Visit counter (FIX: immediate update)
    if (!isset($_SESSION['visitCount'])) {
        $_SESSION['visitCount'] = isset($_COOKIE['visitCount']) ? $_COOKIE['visitCount'] : 0;
    }

    $_SESSION['visitCount']++;
    $visitCount = $_SESSION['visitCount'];

    setcookie("visitCount", $visitCount, time() + (86400 * 30));
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Personalized Visitor Page</title>
</head>

<body style="background-color: <?php echo $bgColor; ?>; text-align:center; font-family: Arial;">

<h1>Welcome to My Website</h1>

<?php if (!isset($_COOKIE['cookie_consent'])) { ?>

    <!-- Cookie Consent -->
    <form method="post">
        <p>Do you accept cookies?</p>
        <button name="accept_cookie">Accept</button>
        <button name="decline_cookie">Decline</button>
    </form>

<?php } elseif ($_COOKIE['cookie_consent'] == "declined") { ?>

    <p>You declined cookies. Personalization is disabled.</p>

<?php } else { ?>

    <!-- Preference Form -->
    <form method="post">
        <h3>Select Your Preferences</h3>

        <label>Choose Background Color:</label><br>
        <input type="color" name="color" required><br><br>

        <label>Select Language:</label><br>
        <select name="language">
            <option value="English">English</option>
            <option value="Hindi">Hindi</option>
            <option value="French">French</option>
        </select><br><br>

        <button type="submit">Save Preferences</button>
    </form>

    <hr>

    <!-- Personalized Message -->
    <h2>
        <?php
        if ($language == "Hindi") {
            echo "नमस्ते! आपने इस पेज को $visitCount बार देखा है।";
        } elseif ($language == "French") {
            echo "Bonjour! Vous avez visité cette page $visitCount fois.";
        } else {
            echo "Hello! You have visited this page $visitCount times.";
        }
        ?>
    </h2>

<?php } ?>

</body>
</html>