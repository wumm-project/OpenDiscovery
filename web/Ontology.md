---
layout: default
title: Vocabulary
---

This is a short description of the vocabulary developed so far.  We use the
[SKOS Ontology](https://www.w3.org/2004/02/skos/) as basic modeling frame.

## Namespaces

- skos: <http://www.w3.org/2004/02/skos/core#> 
- od: <http://opendiscovery.org/rdf/Model#> (not yet operating as link)

## Types

od:Context
  - *Description:* The context for the application of a certain rule
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Context/>
  - *Predicates*
    - rdfs:label Literal = label
  
od:Discovery
  - *Description:* Instances are examples of a discovery. They may belong to several discovery types
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Discovery/>
  - *Predicates*
    - rdfs:label Literal = label
    - od:demonstrates od:DiscoveryType, od:Recommendation = what the example demonstrates 
    - od:theProblem Literal = description of the problem (for od:Principle)
    - od:theSolution Literal = description of the solution (for od:Principle)

od:DiscoveryClass
  - *Description:* Instances are sets of discoveries. It groups discoveries "as they are". 
  - *Namespace prefix:* <http://opendiscovery.org/rdf/DiscoverySet/>
  - *Predicates*
    - rdfs:label Literal = label
    - od:demonstrates od:DiscoveryType = the types that the example is a demonstration for

od:DiscoveryType 
  - *Description:* A discovery type groups discoveries along types.
  - *Explanation:* A hierarchical type system is provided as a tree (or better a DAG?). A subtype of skos:Concept 
  - *Namespace prefix:* <http://opendiscovery.org/rdf/DiscoveryType/>
  - *Predicates*
    - rdfs:label Literal = label 
    - od:description Literal = description
    - od:hasPurpose Literal = the purpose of the discovery type
    - skos:broader od:DiscoveryType = subtype property

od:Principle
  - *Description:* The class of the famous "40 principles"
  - *Explanation:* A subclass of od:Recommendation
  - *Predicates* (additional to predicates of od:Recommendation)
    - od:hasPrincipleNumber Literal = the number of the principle
    
od:Recommendation
  - *Description:* A recommendation is an advice what to do or a question to explore in a special context.
  - *Explanation:* Recommendations are bound to relations that describe the applicability of the recommendation. 
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Recommendation/>
  - *Predicates*
    - od:description Literal = label 

od:Relation
  - *Description:* A relation is a named and classified relation between two rules (the subrule and the superrule)
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Relation/>
  - *Predicates*
    - od:subrule, od:superrule od:Rule = the related rules
    - od:hasRelationType od:RelationType = the type of the relation

od:RelationType
  - *Description:* An instance classifies a special sort of relations.
  - *Namespace prefix:* <http://opendiscovery.org/rdf/RelationType/>
  - *Predicates*
    - rdfs:label Literal = label 

od:Rule
  - *Description:* An instance classifies a special sort of relations.
  - *Namespace prefix:* <http://opendiscovery.org/rdf/Rule/>
  - *Predicates*
    - od:hasContext od:Context = one or several contexts to be fulfilled in which the rule is applicable
    - od:hasRecommendation od:Recommendation = one or several recommendations when the rule should be applied