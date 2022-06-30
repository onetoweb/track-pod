.. title:: Route

`Back to index <index.rst>`_

=====
Route
=====

.. contents::
    :local:


Create Route
````````````

.. code-block:: php
    
    $result = $client->post('/Route', [
        'Code' => 'R0001234',
        'Id' => '1234',
        'Date' => '2019-02-01',
        'StartTimePlan' => '13:00',
        'DepotId' => '1',
        'Depot' => '9 Riverside, Salford M7 1PA ',
        'DriverLogin' => 'RT567 ',
        'DriverPassword' => '1',
        'DriverName' => 'Peter G.',
        'DriverVehicle' => 'FCU 819',
        'Vehicle' => [
            'Number' => 'XXX777',
            'CarrierCode' => '31',
            'Carrier' => 'Big Logistics',
            'Weight' => 10000,
            'Volume' => 14.5,
            'Pallets' => 16,
        ],
        'Orders' => [[
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
        ]],
    ]);


Update Route by code
````````````````````

.. code-block:: php
    
    $code = 'R0001234';
    $result = $client->put("/Route/Code/$code", [
        'Code' => 'R0001234',
        'Id' => '1234',
        'Date' => '2019-02-01',
        'StartTimePlan' => '13:00',
        'DepotId' => '1',
        'Depot' => '9 Riverside, Salford M7 1PA ',
        'DriverLogin' => 'RT567 ',
        'DriverPassword' => '1',
        'DriverName' => 'Peter G.',
        'DriverVehicle' => 'FCU 819',
        'Vehicle' => [
            'Number' => 'XXX777',
            'CarrierCode' => '31',
            'Carrier' => 'Big Logistics',
            'Weight' => 10000,
            'Volume' => 14.5,
            'Pallets' => 16,
        ],
        'Orders' => [[
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
        ]],
    ]);


Update Route by id
``````````````````

.. code-block:: php
    
    $id = 1234;
    $result = $client->put("/Route/Id/$id", [
        'Code' => 'R0001234',
        'Id' => '1234',
        'Date' => '2019-02-01',
        'StartTimePlan' => '13:00',
        'DepotId' => '1',
        'Depot' => '9 Riverside, Salford M7 1PA ',
        'DriverLogin' => 'RT567 ',
        'DriverPassword' => '1',
        'DriverName' => 'Peter G.',
        'DriverVehicle' => 'FCU 819',
        'Vehicle' => [
            'Number' => 'XXX777',
            'CarrierCode' => '31',
            'Carrier' => 'Big Logistics',
            'Weight' => 10000,
            'Volume' => 14.5,
            'Pallets' => 16,
        ],
        'Orders' => [[
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
        ]],
    ]);


Get Route by id
```````````````

.. code-block:: php
    
    $code = 'R0001234';
    $route = $client->get("/Route/Code/$code");


Get Route by id
```````````````

.. code-block:: php
    
    $id = 1234;
    $route = $client->get("/Route/Id/$id");


Get Route by date
`````````````````

.. code-block:: php
    
    $date = '2019-02-01';
    $route = $client->get("/Route/Date/$date");


Get Route codes for export
``````````````````````````

.. code-block:: php
    
    $routeCodes = $client->get('/Route/Export/Code', [
        'status' => 5
    ]);


Get Route ids for export
````````````````````````

.. code-block:: php
    
    $routeIds = $client->get('/Route/Export/Code', [
        'status' => 5
    ]);


Confirm Route export by code
````````````````````````````

.. code-block:: php
    
    $code = 'R0001234';
    $result = $client->put("/Route/Export/Code/$code");


Confirm Route export by id
``````````````````````````

.. code-block:: php
    
    $id = 10000345;
    $result = $client->put("/Route/Export/Id/$id");