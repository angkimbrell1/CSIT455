<?php

require "session.php";
session_destroy();
header("Location: homepage.php");

?>