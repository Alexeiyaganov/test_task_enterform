<?
// Читаем куку языка
$lang = @$_COOKIE['lang'];
if (!$lang) {
    // Если куки нет, ставим по умолчанию русский язык
    $lang = 'ru';
}
$titleRU = 'Тестовое задание';
$titleEN = 'Test task';
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">

    <!-- Заголовок в зависимости от языка -->
    <title><?= $lang == 'ru' ? $titleRU : $titleEN; ?></title>

    <meta name="title-ru" content="<?= $titleRU; ?>" id="title-ru">
    <meta name="title-en" content="<?= $titleEN; ?>" id="title-en">

    <link href="CSS/style.css" media="screen" rel="stylesheet">
    <!--<link href='http://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800'rel='stylesheet' type='text/css'>-->


</head>
<body class="<?= $lang; ?>">
<div>
    <span class="lang-switcher lang-switcher--ru" id="switcher-ru">RU</span>
    <span class="lang-switcher lang-switcher--en" id="switcher-en">EN</span>
</div>
