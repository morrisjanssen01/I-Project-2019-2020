<?php
require("redirct.php");
session_start();
session_unset();
session_destroy();
redirect('index');