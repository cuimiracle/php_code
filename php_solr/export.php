<?php
require_once('constants.php');

mysql_connect(DBHOST, DBUSER, DBPASS);
mysql_select_db(DBSCHEMA);
$result = mysql_query("SELECT * FROM products");

$documents = array();
require_once('Apache/Solr/Service.php');
$solr = new Apache_Solr_Service(SOLRHOST, SOLRPORT, SOLRNAME);

$result = $solr->ping();

while ($row = mysql_fetch_object($result)) {
    // For each result, create a new Solr doc
    $document = new Apache_Solr_Document();
    $document->id = $row->product_id;
    $document->description = $row->description;
    $document->name = $row->name;
    $document->price = $row->price;
    //add document to array
    $documents[] = $document;

}
mysql_free_result($result);

if (!empty($documents)) {
    $solr->addDocuments($documents);
    $solr->commit();
    $solr->optimize();
}