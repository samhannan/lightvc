<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">

<html xmlns="http://www.w3.org/1999/xhtml" xml:lang="en" lang="en">
<head>
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8"/>
	<title><?php echo $pageTitle ?></title>
	<?php
	if (isset($requiredCss)) {
		foreach ($requiredCss as $css => $use) {
			echo '<link rel="stylesheet" href="' . CSS_PATH . $css . '" type="text/css" media="all" charset="utf-8" />' . "\n";
		}
	}
	if (isset($requiredJsHead)) {
		foreach ($requiredJsInHead as $js => $use) {
			echo '<script type="text/javascript" charset="utf-8" src="' . JS_PATH . $js . '"></script>' . "\n";
		}
	}
	?>
</head>
<body>
    <div id="content">
		<?php echo $bodyContent ?>
    </div>
	<?php
	if (isset($requiredJsBody)) {
		foreach ($requiredJs as $js => $use) {
			echo '<script type="text/javascript" charset="utf-8" src="' . JS_PATH . $js . '"></script>' . "\n";
		}
	}
	?>
</body>
</html>
