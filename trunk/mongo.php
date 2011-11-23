<?php
$iTotal = 0;
$iCont  = 0;
$iTimeIni = microtime(true);

$m = new Mongo("localhost:27017");
$dbs = $m->listDBs();
print_r($dbs);
$db = $m->selectDB('reference');
$aColl = $db->listCollections();
foreach($aColl as $wow) {
    echo $wow;
}
print_r($aColl);
die();
$db = $m->selectDB('reference');


$collectionCat = $db->selectCollection('categorias');
$o = $collectionCat->find();
foreach($o as $new) {
    print_r($new);
}
print_r($o);
//$ref = $collectionCat->createDBRef($o);

$collectionProd = $db->selectCollection('produtos');
$o = $collectionProd->find();
//$collectionProd->insert(Array('nome'=>'teste','categoria'=>$ref));

foreach($o as $cat) {

    /*
    $song = $collectionProd->getDBRef($oNovo);

    $song['nome'] = 'Inf.';
    $collectionProd->save($song);
    print_r($song);
    */
}

/*
$collectionCat->insert(Array('nome'=>'Informatica'));
$collectionCat->insert(Array('nome'=>'Eletronicos'));
$collectionCat->insert(Array('nome'=>'Perifericos'));
*/
//$db = $m->selectDB('comedy');
  //$db = $m->comedy;

// select a collection (analogous to a relational database's table)

//$collection = $db->selectCollection('cartoons');

// add a record
                      /*
for($i = 1000;$i<1000000;$i++) {
    $obj = array('id'=>$i, "title" => "Calvin and Hobbes", "author" => "Bill Watterson" );
    $collection->insert($obj);
}                   */

/*
\// add another record, with a different "shape"
$obj = array( "title" => "XKCD", "online" => true );
$collection->insert($obj);
      */
// find everything in the collection


//$o = $collection->findOne(Array('_id'=>new MongoId('4d9b1514295a0b4c040c3118')));

//$cursor = $collection->find()->limit(100)->sort(Array('id'=>-1));

//$id = $collection->ensureIndex( array( "id" => 1 ) );
//$cursor = $collection->find(Array('id'=>Array('$lt'=>10000)));

// iterate through the results

  /*
foreach ($cursor as $obj) {
    print_r($obj);
    $iTotal += $obj['id'];
    $iCont++;
}

echo $iTotal;
echo '<br />';
echo microtime(true) - $iTimeIni;
*/
//echo $iCont;
?>
