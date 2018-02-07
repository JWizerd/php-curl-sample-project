<?

/**
 * A Sample cURL project to learn how to
 * utilize the tool for future projects at
 * MadWire. I will attempt to run all CRUD
 * operations so I have a well rounded understanding
 */

/**
 * source: http://phpenthusiast.com/blog/five-php-curl-examples
 * by: Joseph Benharosh
 */

/**
 * STEP 1: Initiale a cURL session
 */
$handle = curl_init();

/**
 * STEP 2: Set Options with curl_setopt();
 * bool curl_setopt ( resource $ch , int $option , $value )
 * https://secure.php.net/manual/en/function.curl-setopt.php 
 */

$endpoint = 'http://jeremiahwodke.com';

// $options = curl_setopt($handle, CURLOPT_URL, $endpoint_or_url);

// Set the result output to be a string.
// curl_setopt($handle, CURLOPT_RETURNTRANSFER, true);

// OR use an array of options for cleaner code

curl_setopt_array($handle,
  array(
      CURLOPT_URL            => $endpoint,
      CURLOPT_RETURNTRANSFER => true,
      CURLOPT_HEADER         => true
  )
);

/**
 * STEP 3: Execution / Retrieval with curl_exec().
 */

$data = curl_exec($handle);

/**  
 * Display Data for reference. home page of Personal website 
 * locally stored on server
 */

/**
 * use curl_getinfo to receive important technical information about a response
 */

$responseCode   = 
    curl_getinfo($handle, 
        CURLINFO_HTTP_CODE
);

echo $responseCode;
 
$downloadLength = 
    curl_getinfo($handle, 
         CURLINFO_CONTENT_LENGTH_DOWNLOAD
);

echo $downloadLength;

if(curl_errno($handle)) {
  print curl_error($handle);
}

/**
 * STEP 4: Releasing the cURL handle.
 */

curl_close($handle);

/**
 * POST with cURL. In this example we are using form.php to 
 * POST form input 
 */

$post_handle = curl_init();
 
$form_url = "http://localhost:8888/php-curl-sample-project/form.php";
 
// Array with the fields names and values.
// The field names should match the field names in the form.
 
$postData = array(
  'firstName' => 'Lady',
  'lastName'  => 'Gaga',
  'submit'    => 'ok'
);
 
curl_setopt_array($post_handle,
  array(
    CURLOPT_URL => $form_url,
    // Enable the post response.
    CURLOPT_POST       => true,
    // The data to transfer with the response.
    CURLOPT_POSTFIELDS => $postData,
    CURLOPT_RETURNTRANSFER     => true
  )
);
 
$form_data = curl_exec($post_handle);
 
curl_close($post_handle);
 
echo $form_data;