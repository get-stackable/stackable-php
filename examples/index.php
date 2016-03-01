<?php

require_once ('../src/Stackable.php');

$stackable = new Stackable('YOUR-STACK-PUBLIC-KEY-HERE');

$result = $stackable->getContainers();
//$result = $stackable->getContainer('CONTAINER-ID-HERE');
//$result = $stackable->getContainerItems('CONTAINER-ID-HERE');
//$result = $stackable->getAllItems();
//$result = $stackable->getItem('ITEM-ID-HERE');

print_r($result);
