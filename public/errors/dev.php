<?php

/**
 * @var $errno \ishop\ErrorHandler
 * @var $errstr \ishop\ErrorHandler
 * @var $errfile \ishop\ErrorHandler
 * @var $errline \ishop\ErrorHandler
 * @var $response \ishop\ErrorHandler
 */
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Error</title>
</head>
<body>
  <h1>Произошла ошибка:(</h1>
  <p><b>Error code: </b><?=$response?></p>
  <p><b>Error text: </b><?=$errstr?></p>
  <p><b>File: </b><?=$errfile?></p>
  <p><b>Line: </b><?=$errline?></p>
</body>
</html>