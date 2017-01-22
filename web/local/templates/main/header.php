<?if (!defined('B_PROLOG_INCLUDED') || B_PROLOG_INCLUDED !== true) die();

use Bitrix\Main\Page\Asset;
//Asset::getInstance()->addCss(BASE_TEMPLATE_URL . '/css/style.css', true);
//Asset::getInstance()->addJs(BASE_TEMPLATE_URL . '/css/script.js', true);

$arResult = array(
	'isMain' => CSite::InDir('/index.php'),
);
?>
<!DOCTYPE html>
	<html>
	<head>
		<?$APPLICATION->ShowHead();?>
		<title><?$APPLICATION->ShowTitle();?></title>
	</head>
	<body>
		<?$APPLICATION->ShowPanel();?>