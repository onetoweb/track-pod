.. title:: Index

===========
Basic Usage
===========

Setup client

.. code-block:: php
    
    require 'vendor/autoload.php';
    
    use Onetoweb\TrackPod\Client;
    
    // params
    $apiKey = 'api_key';
    
    // setup client
    $client = new Client($apiKey);
    
    // set rate limit callback
    $client->setRateLimitCallback(function(int $remaining, int $seconds) {
        
        if ($remaining === 0) {
            
            // sleep
            sleep($seconds);
        }
    });


========
Examples
========

* `Address <address.rst>`_
* `Driver <driver.rst>`_
* `Order <order.rst>`_
* `Route <route.rst>`_
* `Test <test.rst>`_