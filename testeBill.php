<?php
require 'src/jonnydata/config.php';
use jonnydata\csv\data\dal\mongo\MongoDBDataAccessFactory;
$factory = new MongoDBDataAccessFactory();
$billDataAccess = $factory->createBillDataAccess();
var_dump($billDataAccess);