<?php
require_once('DatumboxAPI.php');

$api_key='YOUR_API_KEY_GOES_HERE'; //To get your API visit datumbox.com, register for an account and go to your API Key panel: http://www.datumbox.com/apikeys/view/

$DatumboxAPI = new DatumboxAPI($api_key);

//Example of using Document Classification API Functions
$text="Google Search (or Google Web Search) is a web search engine owned by Google Inc. Google Search is the most-used search engine on the World Wide Web,[4] receiving several hundred million queries each day through its various services.[5] The order of search results on Google's search-results pages is based, in part, on a priority rank called a 'PageRank'. Google Search provides many options for customized search, using Boolean operators such as: exclusion ('-xx'), alternatives ('xx OR yy'), and wildcards ('x * x').[6] The main purpose of Google Search is to hunt for text in publicly accessible documents offered by web servers, as opposed to other data, such as with Google Image Search. Google Search was originally developed by Larry Page and Sergey Brin in 1997.[7] Google Search provides at least 22 special features beyond the original word-search capability.[8] These include synonyms, weather forecasts, time zones, stock quotes, maps, earthquake data, movie showtimes, airports, home listings, and sports scores. There are special features for dates, including ranges,[9] prices, temperatures, money/unit conversions, calculations, package tracking, patents, area codes,[8] and language translation of displayed pages. In June 2011, Google introduced 'Google Voice Search' and 'Search by Image' features for allowing the users to search words by speaking and by giving images.[10] In May 2012, Google introduced a new Knowledge Graph semantic search feature to customers in the U.S";

$DocumentClassification=array();
$DocumentClassification['SentimentAnalysis']=$DatumboxAPI->SentimentAnalysis($text);
$DocumentClassification['SubjectivityAnalysis']=$DatumboxAPI->SubjectivityAnalysis($text);
$DocumentClassification['TopicClassification']=$DatumboxAPI->TopicClassification($text);
$DocumentClassification['SpamDetection']=$DatumboxAPI->SpamDetection($text);
$DocumentClassification['AdultContentDetection']=$DatumboxAPI->AdultContentDetection($text);
$DocumentClassification['ReadabilityAssessment']=$DatumboxAPI->ReadabilityAssessment($text);
$DocumentClassification['LanguageDetection']=$DatumboxAPI->LanguageDetection($text);
$DocumentClassification['CommercialDetection']=$DatumboxAPI->CommercialDetection($text);
$DocumentClassification['EducationalDetection']=$DatumboxAPI->EducationalDetection($text);
$DocumentClassification['GenderDetection']=$DatumboxAPI->GenderDetection($text);

$tweet="I love the new Datumbox API! :)";
$DocumentClassification['TwitterSentimentAnalysis']=$DatumboxAPI->SentimentAnalysis($tweet);

//Example of using Information Retrieval API Functions
$InformationRetrieval=array();

$url='http://en.wikipedia.org/wiki/Google_Search';
$html=file_get_contents($url);

$InformationRetrieval['TextExtraction']=$DatumboxAPI->TextExtraction($html);
$InformationRetrieval['KeywordExtraction']=$DatumboxAPI->KeywordExtraction($InformationRetrieval['TextExtraction'],3);



//Example of using Mertics Calculation API Functions
$Metrics=array();

$original='This book has been written against a background of both reckless optimism and reckless despair. It holds that Progress and Doom are two sides of the same medal; that both are articles of superstition, not of faith. It was written out of the conviction that it should be possible to discover the hidden mechanics by which all traditional elements of our political and spiritual world were dissolved into a conglomeration where everything seems to have lost specific value, and has become unrecognizable for human comprehension, unusable for human purpose. Hannah Arendt, The Origins of Totalitarianism (New York: Harcourt Brace Jovanovich, Inc., 1973 ed.), p.vii, Preface to the First Edition.';
$copy='Hannah Arendt’s book, The Origins of Totalitarianism, was written in the light of both excessive hope and excessive pessimism. Her thesis is that both Advancement and Ruin are merely different sides of the same coin. Her book was produced out of a belief that one can understand the method in which the more conventional aspects of politics and philosophy were mixed together so that they lose their distinctiveness and become worthless for human uses.';

$Metrics['DocumentSimilarity']=$DatumboxAPI->DocumentSimilarity($original,$copy);


unset($DatumboxAPI);


//Print the Results
echo '<h1>Document Classification</h1>';
echo '<pre>';
print_r($DocumentClassification);
echo '</pre>';

echo '<h1>Information Retrieval</h1>';
echo '<pre>';
print_r($InformationRetrieval);
echo '</pre>';

echo '<h1>Metrics</h1>';
echo '<pre>';
print_r($Metrics);
echo '</pre>';
