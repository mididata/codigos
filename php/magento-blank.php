<?php
define('MAGENTO_ROOT', $_SERVER['DOCUMENT_ROOT']);
define('STORE_ID', 1);
$mageFilename = MAGENTO_ROOT . '/app/Mage.php';
if (!file_exists($mageFilename)) {
    echo $mageFilename." was not found";
    exit;
}
require_once $mageFilename;

Mage::app()->setCurrentStore(STORE_ID);
Mage::app()->loadArea('frontend');
$layout = Mage::getSingleton('core/layout');

//load default xml layout handle and generate blocks
$layout->getUpdate()->load('default'); 
$layout->generateXml()->generateBlocks();
?>
<!DOCTYPE html>
<html lang="en">
<head>
<title>Magento Blank</title>
<?php echo $layout->getBlock('head')->toHtml() ?>

<style>
.cmxform fieldset p label span.error { color: red; }
form.cmxform { width: 30em; }
form.cmxform label {
	width: auto;
	display: block;
	float: none;
}
</style>

</head>
<body>
<?php echo $layout->getBlock('after_body_start')->toHtml() ?>
<?php echo $layout->getBlock('global_notices')->toHtml() ?>
<?php echo $layout->getBlock('header')->toHtml() ?>
<div class="content-wrapper">
    teste
</div>
<?php echo $layout->getBlock('footer')->toHtml() ?>
</body>
</html>