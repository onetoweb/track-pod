.. title:: Order

`Back to index <index.rst>`_

=====
Order
=====

.. contents::
    :local:


Create Order
````````````

.. code-block:: php
    
    $result = $client->post('/Order', [
        'Number' => 'cv30001-2',
        'Id' => '10000345',
        'Date' => '2019-02-01',
        'Type' => 0,
        'ShipperId' => '357',
        'Shipper' => 'Sanitex',
        'DepotId' => '1',
        'Depot' => '9 Riverside, Salford M7 1PA ',
        'ClientId' => '247',
        'Client' => 'Maxima',
        'AddressId' => '13587',
        'Address' => '2 St Josephs Crescent, Liverpool L3 3JF',
        'AddressLat' => 25.29048,
        'AddressLon' => 65.29405,
        'AddressZone' => 'Zone 1',
        'TimeSlotFrom' => '2019-02-01T09:00:00',
        'TimeSlotTo' => '2019-02-01T18:00:00',
        'ServiceTime' => 10,
        'Note' => 'Only to sign Invoice',
        'ContactName' => 'John Doe',
        'Phone' => '+37061191244',
        'Email' => 'X-604@maxima.com',
        'Weight' => 50.5,
        'Volume' => 8.54,
        'Pallets' => 3.5,
        'COD' => 20.45,
        'InvoiceId' => 'inv0002 ',
        'CustomerReferenceId' => 'ord123/1',
        'Barcode' => '1234567890123',
        'GoodsList' => [[
            'OrderLineId' => '22435324',
            'GoodsId' => '30495',
            'GoodsName' => 'Some big mystic box',
            'GoodsUnit' => 'pcs.',
            'Note' => 'ID3658AAA',
            'Quantity' => 10.5,
            'Cost' => 2.99,
            'OrderLineBarcode' => '1234567890123',
            'GoodsBarcode' => '1234567890123',
        ]],
        'CustomFields' => [[
            'Id' => 'cf_456',
            'Value' => 'string',
        ]],
    ]);


Update Order
````````````

.. code-block:: php
    
    $result = $client->put('/Order', [
        'Number' => 'cv30001-2',
        'Id' => '10000345',
        'Date' => '2019-02-01',
        'Type' => 0,
        'ShipperId' => '357',
        'Shipper' => 'Sanitex',
        'DepotId' => '1',
        'Depot' => '9 Riverside, Salford M7 1PA ',
        'ClientId' => '247',
        'Client' => 'Maxima',
        'AddressId' => '13587',
        'Address' => '2 St Josephs Crescent, Liverpool L3 3JF',
        'AddressLat' => 25.29048,
        'AddressLon' => 65.29405,
        'AddressZone' => 'Zone 1',
        'TimeSlotFrom' => '2019-02-01T09:00:00',
        'TimeSlotTo' => '2019-02-01T18:00:00',
        'ServiceTime' => 10,
        'Note' => 'Only to sign Invoice',
        'ContactName' => 'John Doe',
        'Phone' => '+37061191244',
        'Email' => 'X-604@maxima.com',
        'Weight' => 50.5,
        'Volume' => 8.54,
        'Pallets' => 3.5,
        'COD' => 20.45,
        'InvoiceId' => 'inv0002 ',
        'CustomerReferenceId' => 'ord123/1',
        'Barcode' => '1234567890123',
        'GoodsList' => [[
            'OrderLineId' => '22435324',
            'GoodsId' => '30495',
            'GoodsName' => 'Some big mystic box',
            'GoodsUnit' => 'pcs.',
            'Note' => 'ID3658AAA',
            'Quantity' => 10.5,
            'Cost' => 2.99,
            'OrderLineBarcode' => '1234567890123',
            'GoodsBarcode' => '1234567890123',
        ]],
        'CustomFields' => [[
            'Id' => 'cf_456',
            'Value' => 'string',
        ]],
    ]);
    


Get Order by number
```````````````````

.. code-block:: php
    
    $number = 'cv30001-2';
    $order = $client->get("/Order/Number/$number");


Get Order by id
```````````````

.. code-block:: php
    
    $id = 10000345;
    $order = $client->get("/Order/Id/$id");


Get Order by date
`````````````````

.. code-block:: php
    
    $date = '2019-02-01';
    $order = $client->get("/Order/Date/$date");


Get Order by route date
```````````````````````

.. code-block:: php
    
    $date = '2019-02-01';
    $order = $client->get("/Order/Route/Date/$date");


Get Order by route code
```````````````````````
.. code-block:: php
    
    $code = 'R0001234';
    $order = $client->get("/Order/Route/Code/$code");


Get Order by status date
````````````````````````
.. code-block:: php
    
    $date = '2019-02-01T12:00:00';
    $order = $client->get("/Order/Status/Date/$date");


Set Order status by number
``````````````````````````
.. code-block:: php
    
    $number = 'cv30001-2';
    $result = $client->put("/Order/Number/$number/Status",  [
        'Status' => 'Unknown',
        'RejectReason' => 'None',
    ]);



Set Order status by id
``````````````````````
.. code-block:: php
    
    $id = 10000345;
    $result = $client->put("/Order/id/$id/Status",  [
        'Status' => 'Unknown',
        'RejectReason' => 'None',
    ]);


Delete Order by number
``````````````````````

.. code-block:: php
    
    $number = 'cv30001-2';
    $result = $client->delete("/Order/Number/$number");


Delete Order by id
``````````````````

.. code-block:: php
    
    $id = 10000345;
    $result = $client->delete("/Order/Id/$id");