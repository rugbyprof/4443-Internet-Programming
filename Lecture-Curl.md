Why do we need PHP CURL ?

This seems to work just fine:

```php
file_get_contens('http://hayageek.com')
```

Sending HTTP requests is very simple with PHP CURL.You need to follow the four steps to send request.

_1) Initialize CURL session_

```php
$ch = curl_init();
```
_2) Provide options for the CURL session_

```php
curl_setopt($ch,CURLOPT_URL,"http://hayageek.com");
curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//curl_setopt($ch,CURLOPT_HEADER, true); //if you want headers
```

- `CURLOPT_URL` -> URL to fetch
- `CURLOPT_HEADER`  -> to include the header/not
- `CURLOPT_RETURNTRANSFER` -> if it is set to true, data is returned as string instead of outputting it.

For full list of options, check this [PHP Documentation](http://php.net/manual/en/book.curl.php).

_3) Execute the CURL session_

```php
$output=curl_exec($ch);
```

_4) Close the session_

```php
curl_close($ch);
```

_Note: You can check whether CURL enabled/not with the following code._

```php
if(is_callable('curl_init')){
   echo "Enabled";
}
else
{
   echo "Not enabled";
}
```

___PHP CURL GET EXAMPLE___

```php
function httpGet($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
//  curl_setopt($ch,CURLOPT_HEADER, false); 
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
}

echo httpGet("http://hayageek.com");
```

___PHP CURL POST EXAMPLE___

You can use the below code to submit form using PHP CURL.

```php
function httpPost($url,$params)
{
  $postData = '';
   //create name value pairs seperated by &
   foreach($params as $k => $v) 
   { 
      $postData .= $k . '='.$v.'&'; 
   }
   rtrim($postData, '&');
 
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
    curl_setopt($ch,CURLOPT_HEADER, false); 
    curl_setopt($ch, CURLOPT_POST, count($postData));
        curl_setopt($ch, CURLOPT_POSTFIELDS, $postData);    
 
    $output=curl_exec($ch);
 
    curl_close($ch);
    return $output;
 
}
```
How to use the function:

```php
$params = array(
   "name" => "Ravishanker Kusuma",
   "age" => "32",
   "location" => "India"
);
 
echo httpPost("http://hayageek.com/examples/php/curl-examples/post.php",$params);
```

___SEND RANDOM USER-AGENT IN THE REQUESTS___

You can use the below function to get Random User-Agent.

```php
function getRandomUserAgent()
{
    $userAgents=array(
        "Mozilla/5.0 (Windows; U; Windows NT 5.1; en-GB; rv:1.8.1.6) Gecko/20070725 Firefox/2.0.0.6",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1)",
        "Mozilla/4.0 (compatible; MSIE 7.0; Windows NT 5.1; .NET CLR 1.1.4322; .NET CLR 2.0.50727; .NET CLR 3.0.04506.30)",
        "Opera/9.20 (Windows NT 6.0; U; en)",
        "Mozilla/4.0 (compatible; MSIE 6.0; Windows NT 5.1; en) Opera 8.50",
        "Mozilla/4.0 (compatible; MSIE 6.0; MSIE 5.5; Windows NT 5.1) Opera 7.02 [en]",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X Mach-O; fr; rv:1.7) Gecko/20040624 Firefox/0.9",
        "Mozilla/5.0 (Macintosh; U; PPC Mac OS X; en) AppleWebKit/48 (like Gecko) Safari/48"       
    );
    $random = rand(0,count($userAgents)-1);
 
    return $userAgents[$random];
}
```

Using `CURLOPT_USERAGENT`, you can set User-Agent string.

```php
curl_setopt($ch,CURLOPT_USERAGENT,getRandomUserAgent());
```

___HANDLE REDIRECTS (HTTP 301,302)___

To handle URL redirects, set `CURLOPT_FOLLOWLOCATION` to TRUE.
Maximum number of redirects can be controlled using `CURLOPT_MAXREDIRS`.

```php
curl_setopt($ch,CURLOPT_FOLLOWLOCATION,TRUE);
curl_setopt($ch,CURLOPT_MAXREDIRS,2);//only 2 redirects
```

___HOW TO HANDLE CURL ERRORS___

we can use `curl_errno()`,`curl_error()` methods, to get the last errors for the current session.
- `curl_error($ch)` -> returns error as string
- `curl_errno($ch)` -> returns error number

You can use the below code to handle errors.

```php
function httpGetWithErros($url)
{
    $ch = curl_init();  
 
    curl_setopt($ch,CURLOPT_URL,$url);
    curl_setopt($ch,CURLOPT_RETURNTRANSFER,true);
 
    $output=curl_exec($ch);
 
    if($output === false)
    {
        echo "Error Number:".curl_errno($ch)."<br>";
        echo "Error String:".curl_error($ch);
    }
    curl_close($ch);
    return $output;
}
```
Source: http://hayageek.com/php-curl-post-get/
