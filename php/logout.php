<?php
session_start();
?>
<!DOCTYPE html>
<html>
<body>

<?php

session_unset();
session_destroy();
echo "<script>alert('You are now logged out have a great day');document.location='../html/Main Page.html'</script>";
?>

</body>
</html>