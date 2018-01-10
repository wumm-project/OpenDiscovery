# transformiere Quelle-3.xml, Quelle: http://triz-online.de/index.php?id=5593

use XML::DOM;
use strict;
use utf8;

my $parser=new XML::DOM::Parser;
my $dom=$parser->parsefile("Quelle-3.xml") or die;
my $doc;
map { $doc.=getItem($_) } $dom->getElementsByTagName("td");
print TurtleEnvelope($doc);

sub getItem {
  my $node=shift;
  my @l=map($_->toString(),$node->getElementsByTagName("p"));
  my $title=strip($l[0]);
  $title=~s/IGP (\d+).\s*//; my $nr=$1;
  $nr="0$nr" if $nr<10;
  my @b=split(/<br\/>/,strip($l[1]));
  my $beschreibung=join("\"\@de, \"",@b);
  my ($problem,$loesung); 
  ($problem,$loesung)=split(/<br\/>/,strip($l[2]));
  return <<EOT;
<http://opendiscovery.org/rdf/Recommendation/Principle$nr>     
  a od:Principle, od:Recommendation ;
  od:hasPrincipleNumber "$nr" ; 
  rdfs:label "$title"\@de ;
  od:description "$beschreibung"\@de .

<http://opendiscovery.org/rdf/Discovery/PDemo$nr>     
  a od:Discovery ;
  od:demonstrates <http://opendiscovery.org/rdf/Recommendation/Principle$nr> ;
  od:theProblem "$problem"\@de ;
  od:theSolution "$loesung"\@de .

EOT
}

sub strip {
  local $_=shift;
  s|<p>(.*)</p>|$1|s;
  s|Problem:\s*||s;
  s|Lösung:\s*||s;
  s|:\s*||s;
  s|&quot;|\\\"|gs;
  return $_;
}
  
sub rest {
  local $_=$_->toString();
  s|<p>IGP (\d+)\.\s*([^<]*):\s*</p>||s;
  my $nr=$1; my $title=$2;
  return <<EOT;
Nummer: $nr
Titel: $title
Rest: $_
==========
EOT
}

sub TurtleEnvelope {
  my $out=shift;

  return <<EOT
\@prefix rdfs: <http://www.w3.org/2000/01/rdf-schema#> .
\@prefix xsd: <http://www.w3.org/2001/XMLSchema#> .
\@prefix owl: <http://www.w3.org/2002/07/owl#> .
\@prefix skos: <http://www.w3.org/2004/02/skos/core#> .
\@prefix cc: <http://creativecommons.org/ns#> .
\@prefix dcterms: <http://purl.org/dc/terms/> .
\@prefix od: <http://opendiscovery.org/rdf/Model#> .

<http://opendiscovery.org/rdf/ThePrinciples/>
    a owl:Ontology ;
    cc:attributionName "The Open Discovery Project" ;
    cc:attributionURL <http://opendiscovery.org> ;
    cc:license <http://creativecommons.org/publicdomain/zero/1.0/> ;
    dcterms:source <http://triz-online.de/index.php?id=5593> ;
    rdfs:comment "Extracted and transformed by HGG, 2018-01-10" ;
    rdfs:label "TRIZ Database - The 40 Principles" .

$out
EOT
}


