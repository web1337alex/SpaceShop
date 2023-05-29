<?php


/**
 * @var $errorNumber \CORE\ErrorHandler
 * @var $errorString \CORE\ErrorHandler
 * @var $errorFile \CORE\ErrorHandler
 * @var $errorLine \CORE\ErrorHandler
 */

?>
<!doctype html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <title>Ошибка</title>
</head>
<body>

<h1>Произошла ошибка</h1>
<p><b>Код ошибки:</b> <?= $errorNumber ?></p>
<p><b>Текст ошибки:</b> <?= $errorString ?></p>
<p><b>Файл, в котором произошла ошибка:</b> <?= $errorFile ?></p>
<p><b>Строка, в которой произошла ошибка:</b> <?= $errorLine ?></p>

</body>
</html>
