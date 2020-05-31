<?php

$myname = $_REQUEST['myname'];
$mypassword = $_REQUEST['mypassword'];
$mypasswordconf = $_REQUEST['mypasswordconf'];


if ($myname === '') :
	echo "<div>Sorry, your name is a required field</div>";
endif; // input field empty

if (strlen($mypassword) <= 6):
	echo "<div>Sorry, the password must be at least six characters</div>";
endif; //password not long enough


if ($mypassword !== $mypasswordconf) :
	echo "<div>Sorry, passwords must match</div>";
endif; //passwords don't match


?>