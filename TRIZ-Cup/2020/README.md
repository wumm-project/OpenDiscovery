# Material of the TRIZ Summit Cup 2019/2020

## The 2019/20 competition

On 22 October 2019 the announcement and exercises of the new competition were
distributed by email in Russian. An English version and some additional
material
* for the topic “Theory of creative personality development (TCPD).
* inventive techniques in silent films
* the meaning of freeze frame 

compiled by A.P. Dyachenko is meanwhile available from the
[English website](https://triz-summit.ru/en/300139/contest-2019-2020/) of the
TRIZ Summit.

I translated this material into German and moved it also from Word to LaTeX
due to a better maintenance of text under git control.

On 06 and 08 November 2019 I informed the organizers of the contest about
these efforts and got a long answer on 10 November including an authorized
English version of the exercises.

Hans-Gert Gräbe, 28.11.2019

## What do you find here

We started within our WUMM project a translation project of the TRIZ Summit
materials. The original materials are available from the web site of the
organizers in
[Russian](https://triz-summit.ru/contest/cup-tds-2019-2020/) and
[English](https://triz-summit.ru/en/300139/contest-2019-2020/305709/)

**Note that all derived materials provided in this directory are (so far) not**
**authorized by the organisators of the competition. **

* LaTeX versions of the exercises in Russian and English and a translation to
  German in separate documents.
  - Exercises-ru.pdf
  - Exercises-ru.tex
  - Exercises-en.pdf
  - Exercises-en.tex
  - Exercises-de.pdf
  - Exercises-de.tex

Note that the LaTeX versions require the od.sty LateX style located at
Sources/od.sty in this repo and the tikz graphics package to be compiled. 

The following material was removed and replaced by the correcsponding actual
materials in different language versions in the parent directory

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

* Information letter about the results of the contest and translations to
  English and German in a single document.  
  - Results.docx
  - Results.pdf
  - Results.md
    - The list of the award winners as plain txt, one team per line, in
      markdown notation

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

### Laws of development of technical systems

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

## Conclusion

I have no idea if the competition is really minded also for a non-Russian
audience, even if I very liked that.  I hope, the German and English versions
(Open Sourced here) are a good starting point to compile also other language
versions since I transformed all to the very easily to handle LaTeX format and
substituted repeating in different age categories exercises with LaTeX macros
to avoid repeated editing of the same text - with more consequence in the
German LaTeX version compared to the Russian one.

The English version is compiled from the structure of the German version,
substituting the German texts by those from the authorized English version.

Hans-Gert Gräbe, 28.11.2019, update 16.11.2020
