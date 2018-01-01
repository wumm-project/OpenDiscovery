---
layout: default
title: Vocabulary
---

This is a short description of the vocabulary developed so far.  We use the
[SKOS Ontology](https://www.w3.org/2004/02/skos/) as basic modeling frame.

## Namespaces

- skos: <http://www.w3.org/2004/02/skos/core#> 
- od: <http://opendiscovery.org/rdf/Model#>
- odc: <http://opendiscovery.org/rdf/Context/> .
- odd: <http://opendiscovery.org/rdf/Discovery/> .
- odr: <http://opendiscovery.org/rdf/Rule/> .
- odt: <http://opendiscovery.org/rdf/DiscoveryType/> .

## Types

od:Context
  - The context for the application of a certain rule
  - namespace prefix odc:
  - rdfs:label Literal = label
  
od:Discovery
  - Instances are examples of a discovery. They may belong to several discovery types
  - namespace prefix odd:
  - rdfs:label Literal = label
  - od:demonstrates od:DiscoveryType = the types that the example is a
    demonstration for

od:DiscoveryClass
  - Instances are sets of discoveries. It groups discoveries "as they are". 
  - namespace prefix odd:
  - rdfs:label Literal = label
  - od:demonstrates od:DiscoveryType = the types that the example is a
    demonstration for

od:DiscoveryType 
  - A discovery type groups discoveries along types. A hierarchical type system is provided as a tree (or better a DAG?). A subtype of skos:Concept
  - namespace prefix odt:
  - rdfs:label Literal = label 
  - od:description Literal = description
  - od:hasPurpose Literal = the purpose of the discovery type
  - skos:broader od:DiscoveryType = subtype property

od:Recommendation
  - A recommendation is an advice what to do or a question to explore in a special context. Recommendations are bound to relations that describe the applicability of the recommendation. 
  - namespace prefix http://opendiscovery.org/rdf/Recommendation/
  - rdfs:label Literal = label 

od:Relation
  - A relation is a named and classified relation between two rules (the subrule and the superrule)
  - namespace prefix http://opendiscovery.org/rdf/Relation/
  - od:subrule, od:superrule od:Rule = the related rules
  - od:hasRelationType od:RelationType = the type of the relation

od:RelationType
  - An instance classifies a special sort of relations.
  - namespace prefix http://opendiscovery.org/rdf/RelationType/
  - rdfs:label Literal = label 

od:Rule
  - An instance classifies a special sort of relations.
  - namespace prefix odr:
  - od:hasContext od:Context = one or several contexts to be fulfilled in which the rule is applicable
  - od:hasRecommendation od:Recommendation = one or several recommendations when the rule should be applied