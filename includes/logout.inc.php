<?php

session_start();
session_unset();
session_destroy();


//sends user to the amin page

header("location: ../index.php?error=none");