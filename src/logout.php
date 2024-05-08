<?php
// logout.php
session_start();
// demarez la session

// Unset tous les variables 
session_unset();

// Detruire la session
session_destroy();

// Redirigez vers index comme Guest
header("Location: index.php");
exit;
