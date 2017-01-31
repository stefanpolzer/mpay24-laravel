# mpay24-laravel

This package is a Laravel 5 plugin working with mpay24.com payments.

## Installation

Install using composer:
`composer require mpay24/mpay24-laravel`

Then add this to `providers` list in `config/app.php`:
```php
'MPay24Laravel\MPay24LaravelServiceProvider',
```

Add the settings in the `.env` file:
```
MPAY24_MERCHANT_ID="9000"           // Required
MPAY24_SOAP_PASSWORD="*******"      // Required
MPAY24_TEST_SYSTEM=true             // use true [default] for Test System and false for Live System
MPAY24_DEBUG=true                   // optional default is true

// If have a Proxy 
MPAY24_PROXY_Host="proy.host.com"
MPAY24_PROXY_Port="0104"            // must be a 4 digit number
MPAY24_PROXY_User="proxy_user"
MPAY24_PROXY_Pass="*******"
    		
MPAY24_VERIFY_PEER=true
    		
MPAY24_SPID="abcdedfghij"           // requiert if you want to use the Flex Link integration 
MPAY24_FLEX_LINK_PASSWORD="*******" // requiert if you want to use the Flex Link integration
MPAY24_FLEX_LINK_TEST_SYSTEM=true   // use true [default] for Test System and false for Live System 
    		
MPAY24_LOG_PATH='path/to/folder'    // optional default is the Laravel service/log folder
MPAY24_LOG_FILE='mpay24.log'        // name of the logfile default is mpay24.log
    		
MPAY24_ENABLE_CURL_LOG=false        // use true if you want to log the curl excange otherwise false [default] 
MPAY24_CURL_LOG_FILE="curl.log"     // name of the logfile default is mpay24_curl.log

```

## Usage

Now you can call `app()->mpay24` or using the `MPay24` Facade which provides you a instance of the `\mPay24\MPAY24` class.
All settings that you provided in the `.env` are already set

If you want to change settings during runtime `app()->mpay24config` will provide you the configuration instance.
For all available available see the PHP SDK [Wiki](https://github.com/mpay24/mpay24-php/wiki/Configuring-the-php-sdk).
