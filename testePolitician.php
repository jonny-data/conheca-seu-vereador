<?php
require 'src/jonnydata/config.php';

use jonnydata\csv\data\dal\mongo\MongoDBDataAccessFactory;
use jonnydata\csv\data\Politician;
use jonnydata\csv\data\Councillor;

$factory = new MongoDBDataAccessFactory();
$politicianDataAccess = $factory->createPoliticianDataAccess();

$politician = new Councillor();

$politician->setBio("teste");
$politician->setName("Suissa");
$politician->setPoliticalParty("PT");

var_dump( $politicianDataAccess->save($politician) );