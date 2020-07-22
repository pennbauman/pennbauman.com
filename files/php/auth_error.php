<?php
/* Page Displaying an Appropraite Authorization Error
*/
	include_once "auth.php";

	echo '<!DOCTYPE html><html><head> ';
	if ($sys['user']['auth_level'] > 0) {
		echo '<title>ERROR: 403 Forbidden</title> ';
	} else {
		echo '<title>ERROR: 401 Authorization Required</title> ';
	}
	echo "<meta charset='UTF-8'>";
	echo "<meta name='robots' content='noindex, nofollow'/>";
	echo '<link rel="icon" href="/files/img/error_favicon.png">';
	echo '<link rel="stylesheet" href="/files/css/errors.css">';
	echo '</head> <body>';
	if ($sys['user']['auth_level'] > 0) {
		echo '<h1>ERROR: 403 Forbidden</h1> ';
	} else {
		echo '<h1>ERROR: 401 Authorization Required</h1> ';
	}
	echo '<p><i>'.$_SERVER['HTTP_HOST'].$_SERVER['REQUEST_URI'].'</i></p>';
	if ($sys['user']['auth_level'] > 0) {
		echo '<p><b>The client is not authorized to access this content. </b></p>';
		echo "<p><a href='".$sys['link']['logout_url']."'>Logout</a></p>";
	} else {
		echo '<p><b>The client must be authenticated to access this content.</b></p>';
		echo "<p><a href='".$sys['link']['login_url']."'>Login</a></p>";
	}
	insertHTML('backend_footer');
	echo '</body></html>';
?>
