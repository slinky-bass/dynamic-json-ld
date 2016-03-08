<?php require('inc-public-pre-doctype.php'); ?>
<?php 
//GENERATE ENCRYPTED SESSION VARIABLE
$_SESSION['svadminsecurity'] = md5(md5(rand()));
$vsecurity = $_SESSION['svadminsecurity'];
?>
<?php
require('inc-conncvnl.php');

require('inc-function-escapestring.php');

$sql_contact = sprintf("SELECT * FROM tblcontact");

$rs_contact = mysqli_query($vconncvnl, $sql_contact);

$rs_contactRows = mysqli_fetch_assoc($rs_contact);
 
$personName = $rs_contactRows['ContactName'];
$personJobTitle = $rs_contactRows['ContactJobTitle'];
$personEmail = $rs_contactRows['ContactEmail'];
$personTelephone = $rs_contactRows['ContactTelephone'];
?>
<!DOCTYPE HTML>
<html>
<head>
<?php require('inc-head-content.php'); ?>
<?php require('inc-json-function.php'); ?>
<script type="application/ld+json">
	<?php echo buildJsonLd($personName, $personJobTitle, $personEmail, $personTelephone); ?>
</script>

<title>Dynamic JSON-LD | Tutorial</title>
</head>
<body>

<!-- WRAPPER START -->
<section id="wrapper">

<!-- CONTENT CONTAINER START -->
<section id="content_container">

	<h2 class="main-heading">Dynamic JSON-LD for a Person: a super easy how-to</h2>
    
    <!-- INTRO -->     
    <article>
      
        <h3 class="heading">1. JSON-LD, a very brief intro</h3>
        
        <p>So you have some dynamic data on your page which you would like to mark up with shiny new JSON-LD, which Google has recently accepted as one of the Structured Data formats they support. You've read the articles on Google Developers and implementing JSON-LD seems pretty simple; it's essentially a separate script block which uses a combination of JSON-LD (javaScript Object Notation Linked Data) and schema.org's predefined vocabularies to contextualize and provide meaning to your data</p>
        
        <figure>
          <img src="sources/dynamic-data.png">
        </figure>
        
        <p>Below, is the visible data echoed on our webpage, which is pictured in the above example. This data fits the type of Person. Together with JSON-LD and the common vocabulary provided to us by schema.org for the entity person, we're going to mark this data up so it becomes relevant and crawlable by search engines and their spiders.</p> 
        
        <div class="eg-wrapper">
            
            <p>	<?php echo $rs_contactRows['ContactJobTitle']; ?>: <?php echo $rs_contactRows['ContactName']; ?><br />
                Email: <?php echo $rs_contactRows['ContactEmail']; ?><br />
                Mobile: <?php echo $rs_contactRows['ContactTelephone']; ?></p>
            
         </div>
            
     </article>
     
     <!-- JSON_LD EXAMPLE MARKUP -->
     <article>

        <h3 class="heading">2. JSON-LD Example markup</h3>
        
        <p>A JSON-LD script block, like the example below, neatly contains and keeps all our structured markup separate from our HTML tree, unlike the RDFa and Microdata approaches to structuring data, which interveaves structured markup into our html. This script block can then be included in the head of our webpage or after the body. The one very important thing to remember when using JSON-LD to markup data, is to only mark up what is visible on the page.</p>
                         
        <pre>&lt;script type='application/ld+json'&gt; 
        {
          "@context": "http://www.schema.org",
          "@type": "person",
          "name": "Brian Keet",
          "jobTitle": "Director",
          "url": "http://tekiahfoundation.blogspot.co.za/",
          "address": {
            "@type": "PostalAddress",
            "streetAddress": "No 2 Greyland Rd, Ferness Estate, Ottery",
            "addressLocality": "Cape Town",
            "addressRegion": "Western Cape",
            "postalCode": "7800",
            "addressCountry": "South Africa"
          },
          "email": "briankeet@yahoo.com",
          "telephone": "+27766261024"
        }
        &lt;/script&gt;<br>
        </pre>
  
  </article>
  
  <!-- FROM STATIC TO DYNAMIC --> 
  <article>
      <h3 class="heading">3. From static to dynamic</h3>
      
      <p>Before we get into the how to, let's start with the steps you need to take in order to test that your structured data is correctly formed and meets Googles structured data requirements.</p>
      
      <ol class="steps">
          <li>Make sure you have a gmail account and are signed in</li>
          
          <li>Verify your site with Google by following <a href="https://www.google.com/webmasters/verification/home?hl=en">these simple steps </a></li>
          
          <li>Make use of a handy JSON-LD structured data helper like <a href="https://www.jamesdflynn.com/json-ld-schema-generator/
">this one to help generate your JSON-LD code</a></li>

          <li>Copy and paste the generated code into the webpage where the relevant infomation is visible</li>
          
          <li>Verify your structured data with Google's <a href="https://developers.google.com/structured-data/testing-tool/">structured data testing tool</a></li>
          
          <li>Now that you have a verified example of the code you need, time to write a function!</li>  
     </ol>  
  </article>
     
  <article> 
     <h3 class="heading">4. Functions are your friend</h3>
     
     <p>First we make sure we've selected all our required data from the database, and set up the variables we know will change and we want to work with</p>
     
     <figure>
          <img src="sources/sql-select.png">
     </figure>
     
     <p>Now that we know what ingredients we want to work with, time to build that function. Let's name it, and pass it four parameters, which will be the variables we set up earlier that are dynamic. Within our function we create an associative array that mimics the structure of the JSON-LD generated and pictured in the example code above. Add the variables we passed to the function where neccesary. Once the $contactData associated array is complete, we pass it through the json_encode() method to turn it into a JSON object and return the final result.</p>
     
     <figure>
          <img src="sources/json-ld-function.png">
     </figure>
     
  </article>
  
  <article>
     
     <h3 class="heading">5. Generating a JSON-LD script block on page</h3>
     
     <p>And now for the final piece of the puzzle. Require the partial file with the function, and within script tags which specify type='application/ld+json', make a call to our function, pass it the parameters it requires and echo it. Et voila, this generates source code which, if coped and pasted into Google's Structured data testing tool, validates! Just make sure that your page with markup is not blocked by robots.txt. Now all that's left is to sit back, wait for Google's crawlers to crawl your site and index your spiffy new, dynamic structured data, yay!</p>
     
     <figure>
          <img src="sources/call-json-function.png">
     </figure>
         
  </article>
       
  <article>
              
  	<h3 class="heading">6. References</h3>
                     
        <ul class="steps">  
            <a class="ref" href="https://schema.org/Person">
              <li>Schema.org Person</li>
            </a>
            <a class="ref" href="https://schema.org/NGO">
              <li>Schema.org NGO</li>
            </a>
            <a class="ref" href="https://www.jamesdflynn.com/json-ld-schema-generator/">
              <li>JSON-LD schema generator</li>
            </a>
            
            <a class="ref" href="https://developers.google.com/structured-data/customize/contact-points?hl=en_GB">
              <li>Structured Data: Contact Points</li>
            </a>
            
            <a class="ref" href="http://php.net/manual/en/function.json-encode.php">
              <li>PHP Manual: json_encode();</li>
            </a>         
        </ul>
        
	</article>
      
</section>
<!-- CONTENT CONTAINER END -->   

</section>
<!-- WRAPPER END -->  

</body>
</html>