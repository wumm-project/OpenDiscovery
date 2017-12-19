<?php 

/* changed to lib/EasyRdf.php and CONSTRUCT query */

require_once("lib/EasyRdf.php");

// --------------- MINT-Orte --------------------------------------

function mintorte() {
  EasyRdf_Namespace::set('ld', 'http://leipzig-data.de/Data/Model/');
  EasyRdf_Namespace::set('mint2014', 'http://leipzig-data.de/Data/MINT-2014/');
  $query = '
PREFIX ld: <http://leipzig-data.de/Data/Model/> 
PREFIX mint2014: <http://leipzig-data.de/Data/MINT-2014/>
construct {
?a a mint2014:Ortsbeschreibung ; ?b ?c .
}
from <http://leipzig-data.de/Data/MINTBroschuere2014/>
Where {
?a a mint2014:Ortsbeschreibung ; ?b ?c . 
} 
';
  $sparql = new EasyRdf_Sparql_Client('http://leipzig-data.de:8890/sparql');
  $result=$sparql->query($query); // a CONSTRUCT query returns an EasyRdf_Graph
  $s=array();
  foreach ($result->allOfType("mint2014:Ortsbeschreibung") as $v) {
    $a=$v->getUri();
    $s["$a"]=displayMINTOrt($v);
  }
  ksort($s);
  return join($s,"\n") ; 
}

function displayMINTOrt($v) {
  $a=$v->getUri();
  $label=$v->join('rdfs:label'); 
  $kurzinformation=$v->join('mint2014:Kurzinformation',"<br/>");
  $leistungsangebot=$v->join('mint2014:Leistungsangebot');
  $out='
<div class="row">
<h3> <a href="'.$a.'">'.$label.'</a></h3>
<dl>';
  if (!empty($kurzinformation)) { 
    $out.='<dt> Kurzinformation: </dt><dd>'.$kurzinformation.' </dd>';}
  if (!empty($leistungsangebot)) { 
    $out.='<dt> Leistungsangebot: </dt><dd>'.$leistungsangebot.' </dd>';}
  foreach($v->all('mint2014:Internet') as $url) {
    $out.='<dt> URL:  </dt><dd><a href="http://'.$url.'">'.$url.'</a></dd>' ;
  }
  return $out."</dl></div>";
}

// --------------- MINT-Personen --------------------------------------

function mintpersonen() {
  EasyRdf_Namespace::set('ld', 'http://leipzig-data.de/Data/Model/');
  EasyRdf_Namespace::set('org', 'http://www.w3.org/ns/org#');
  EasyRdf_Namespace::set('foaf', 'http://xmlns.com/foaf/0.1/');
  $mintpersonen= new EasyRdf_Graph("http://leipzig-data.de/Data/MINT-Personen/");
  $mintpersonen->parseFile("rdf/MINT-Personen.rdf");
  // echo $mintpersonen->dump("Turtle");
  $a=array();
  foreach ($mintpersonen->allOfType("foaf:Person") as $v) {
    $id=$v->getUri();
    $content=displayPerson($v);
    $a[]=array("sort" => "$id", "content" => $content);
  }
  array_multisort($a);
  $out=''; foreach($a as $v) { $out.=$v["content"]; }
  return $out;
}

function displayPerson($v) {
  $a=$v->getUri();
  $name=$v->join('foaf:name'); 
  $fkt=join(", ",$v->all('org:hasFunction')); 
  $member=join("<br/>",$v->all('org:memberOf')); 
  $comment=$v->join('rdfs:comment'); 
  //$email=$v->join('foaf:mbox'); 
  $out='
<div class="row">
<h3> '.$name.' </h3>
<dl>';
  if (!empty($email)) { $out.='<strong> E-Mail: </strong>'.$email.' </br>';}
  if (!empty($fkt)) { $out.='<strong> Rolle: </strong>'.$fkt.' </br>';}
  if (!empty($member)) { $out.='<strong> Mitglied: </strong>'.$member.' </br>';}
  if (!empty($comment)) { $out.='<strong> Kommentar: </strong>'.$comment.' </br>';}
  return $out."</dl></div>";
}


// ---- test ----
//echo mint();
//echo '<meta charset="utf8">'.mintpersonen();
