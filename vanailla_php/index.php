<?php
require __DIR__ . '/vendor/autoload.php';

//Add all the code here


use App\Services\TransactionsServiceProvider;

$a = readline('Enter a string: '); 
  
// For output 
echo $a;    

$service = new TransactionsServiceProvider();
print_r($service->addUser());