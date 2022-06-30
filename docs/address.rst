.. title:: Address

`Back to index <index.rst>`_

=======
Address
=======

.. contents::
    :local:


Create Address
``````````````

.. code-block:: php
    
    $result = $client->post('/Address', [
        'Id' => '30495',
        'Name' => '2 St Josephs Crescent, Liverpool, L3 3JF',
        'Street' => 'Josephs Crescent',
        'City' => 'Liverpool',
        'State' => '',
        'PostalCode' => '',
        'FullAddress' => '2 St Josephs Crescent, Liverpool, L3 3JF',
        'Zone' => 'Lvp',
        'Lat' => 25.29048,
        'Lon' => 65.29405,
    ]);