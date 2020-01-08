<?php

require_once "Sum.php";
require_once "Sub.php";
require_once "Context.php";

$sum = new Sum();
$sub = new Sub();
$ctx = new Context($sum);

echo "executing sum: " . $ctx->executeStrategy(1,1) . "\n";

$ctx = new Context($sub);

echo "executing sub: " . $ctx->executeStrategy(2, 1) . "\n";