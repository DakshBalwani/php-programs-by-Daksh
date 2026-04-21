<!-- accept the cookie wehre variable is erp and erp id  and expiry is 1 min -->
<?php
setcookie("erp", "12345", time() + 60);
echo "Cookie 'erp' has been set with value '12345' and will expire in 1 minute.";
?>