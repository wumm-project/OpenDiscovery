<?php 

require_once("lib/EasyRdf.php");

function alteEvents() {  
  EasyRdf_Namespace::set('ical', 'http://www.w3.org/2002/12/cal/ical#');
  EasyRdf_Namespace::set('ld', 'http://leipzig-data.de/Data/Model/');

  $query = '
PREFIX ld: <http://leipzig-data.de/Data/Model/> 
PREFIX ical: <http://www.w3.org/2002/12/cal/ical#>
construct {
?a a ld:Event ; rdfs:label ?l ; ical:dtstart ?begin ; 
ical:location ?locname ; ical:summary ?sum; ical:url ?url. 
}
from <http://leipzig-data.de/Data/AlteEvents/>
from <http://leipzig-data.de/Data/Orte/>
from <http://leipzig-data.de/Data/Treffpunkte/>
from <http://leipzig-data.de/Data/Traeger/>
Where { 
?a a ld:Event ; rdfs:label ?l ; ical:dtstart ?begin ; ical:location ?loc .
optional { ?loc rdfs:label ?locname . } 
optional { ?a ical:summary ?sum . } 
optional { ?a ical:url ?url . } 
}
';
  
  $sparql = new EasyRdf_Sparql_Client('http://leipzig-data.de:8890/sparql');
  $result=$sparql->query($query); // a CONSTRUCT query returns an EasyRdf_Graph
  // echo $result->dump("turtle");
  $s=array();
  foreach ($result->allOfType("ld:Event") as $v) {
    $a=$v->getUri();
    $date=$v->get('ical:dtstart');
    $s["$date.$a"]=displayEvent($v);
  }
  ksort($s);
  return join($s,"\n") ; 		
}

function displayEvent($v) {
    $a=$v->getUri();
    $label=$v->get('rdfs:label'); 
    $date=$v->get('ical:dtstart');
    $from=date_format(date_create($date),"d.m.Y H:i");
    $loc=$v->get('ical:location');
    $description=$v->get('ical:summary');
    $out='
<div class="row">
<h3> <a href="'.$a.'">'.$label.'</a></h3>
<dl><dt> Wann? '.$from.' </dt><dt> Wo? '.$loc.'.</dt>
<dd> <strong>Kurzankündigung:</strong> '.$description.'</dd>
';
    foreach($v->all('ical:url') as $url) {
	$out.='<dd> URL: <a href="'.$url.'">'.$url.'</a></dd>' ;
    }
    return $out."</div>";
}


// ---- test ----
//echo events();