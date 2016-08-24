<?php

if(@file_exists("../config/config.php")) { @include("../config/config.php"); } 

if(@file_exists(mw_te_path."main.php")) { @include(mw_te_path."main.php"); } 

?>