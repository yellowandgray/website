<?php

// connect to mongodb

$m = new MongoClient();

echo "Connection to database successfully";

// select a database

$db = $m->em_porject;

echo "Database emporject selected";

?>