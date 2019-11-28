# Material of the TRIZ Summit Cup

## The history and motivation

I have large background in the organisation of mathematical olympiads and so
it was no surprise for me to see the very enthusiastic faces of both the
children and the supervisors of the final round of the TRIZ Summit Cup at the
TRIZ Summit in June 2018 in Minsk.

Later on it turned out to be difficult to get access to the announcement and
exercises of the competition.

On 22 October 2019 the announcement and exercises of the new competition were
distributed by email in Russian.

I translated this material into German and moved it also from Word to LaTeX
due to a better maintenance of text under git control.

On 06 and 08 November 2019 I informed the organizers of the contest about
these efforts and got a long answer on 10 November including an authorized
English version of the exercises.

Hans-Gert Gräbe, 28.11.2019

## What do you find here

We started within our WUMM project a translation project of the TRIZ Summit
materials.

**Note that all derived materials provided in this directory are (so far) not**
**authorized by the organisators of the competition. **

* The original announcement and translations to English and German in a single
  document.
  - InformationLetter-2020.docx
  - InformationLetter-2020.pdf

* The original rules of participation and translations to English and German
  in a single document.
  - RulesOfParticipation-2020.docx
  - RulesOfParticipation-2020.pdf

* The original Questionnaire for participants (in Russian and English) and a
  translations to German in a single document.
  - ContestantsQuestionnaire-2020.docx
  - ContestantsQuestionnaire-2020.pdf

* The original exercises in Russian and English
  - Exercises-2020-ru.docx
  - Exercises-2020-en.docx

* LaTeX versions of the exercises in Russian and English and a translations to
  German in separate documents.
  - Exercises-ru.pdf
  - Exercises-ru.tex
  - Exercises-en.pdf
  - Exercises-en.tex
  - Exercises-de.pdf
  - Exercises-de.tex

Note that the LaTeX versions require the od.sty LateX style located at
Sources/od.sty in this repo to be compiled. 

## Some points and observations within the translation process 

The authors of the exercises provide in several places a quite elaborated
special understanding of TRIZ. A good German reference to TRIZ standards is
the book "Koltze/Souchkov: Systematische Innovation". I added such a remark in
the preface of the exercises.

### Fantasy Techniques

This concerns "Fantasy Techniques" - there is a short listing in brackets
somewhere in the text, I added in one place a link to Gianni Rodari. In the
English TRIZ online literature I found these links:
* https://triz-journal.com/creative-imagination-development/
* https://triz-journal.com/innovation-tools-tactics/breakthroughdisruptive-innovation-tools/fantogramma-technique-new-fantasy-ideas/

Is this the correct interpretation of "Fantasy Techniques" by the authors of
the exercises?

### Altshuller's "Floors Scheme" («этажная схема»)

I added footnote 9 in my translation explaining shortly the 4 floors along the
explanations in http://www.trizminsk.org/e/246006.htm#0101 (in Russian) but
found no English sources on that topic.

### Qualities of Creative Personalities (Качества Творческой Личности)

Although this is a hot topic in the late work of Altshuller I found (a) only
sources in Russian and (b) very heterogeneous understanding of the topic.

In particular in OTSM the discussion goes (very convincing for me) in a *very*
different direction, that clearly relates the topic with societal conditions.
Pointing to special qualities of a creative personality implicitly supposes a
(for me) very strange image of human - there are some personalities that are
more creative and others less. I strongly disagree with such a position since I
do not suppose that creativity could be measured on a one-dimensional scale.

### Developmental laws of technical systems

Even the authorized English version (sent to me on 10 November 2019) displays
the scheme with Russian wordings in that place. Moreover, the scheme is
different to the scheme in the Russian version, probably a reaction on my
objections to the quite special wording used in the first version.

The scheme is only available as image so far (a tikz version is in
preparation).  For the moment I reproduced in the LaTeX versions the scheme as
image (in Russian) and added translations of the different developmental laws
(or tendencies in several places of the improved version). 

I matched my German translation with the German wording in (Koltze/Souchkov)
so the translation is only approximative. The English LaTeX version contains
also such an (not authorized) addition, obtained from the German version by
bare translation, incorporating the changes of nomination in the improved
Russian version.

One law is not contained in the list of (Koltze/Souchkov), the

Law of Replacement of man

and I strongly disagree that this is a developmental law of technical systems.
There is a very long discussion about that topic at least in the German
literature starting already in the 1980s.  For example Klaus Fuchs-Kittowski
underlines in a summary paper on his work

"Our answer to the question has always been: man is the only creative
productive force, he must be and remain the subject of development. Therefore,
the concept of full automation, according to which humans should be gradually
eliminated from the process, misses the point."

http://www.informatik.uni-leipzig.de/~graebe/Texte/Fuchs-02.pdf (in German)

Considering Replacement of man as a law of technical development roots in a
very strange understanding of the terminus "Technics" that forgets about the
obvious - there are no "technical systems" but only "techno-social systems".

## Concluding:

I have no idea if the competition is really minded also for a non-Russian
audience, even if I very liked that.  I hope, the German and English versions
(Open Sourced here) are a good starting point to compile also other language
versions since I transformed all to the very easily to handle LaTeX format and
substituted repeating in different age categories exercises with LaTeX macros
to avoid repeated editing of the same text - with more consequence in the
German LaTeX version compared to the Russian one.

The English version is compiled from the structure of the German version,
substituting the German texts by those from the authorized English version.

Hans-Gert Gräbe, 28.11.2019
