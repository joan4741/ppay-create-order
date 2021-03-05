<?php
require __DIR__ . '/vendor/autoload.php';


use Automattic\WooCommerce\Client;

use Automattic\WooCommerce\HttpClient\HttpClientException;


$woocommerce = new Client(
    'https://www.pymepay.com', 
    'ck_f1f7187d8c8d656cfcb0caf0a027e3090224b374', 
    'cs_49a6a046fe2d4900d482c52ea7e38d5b56db01b3',
    
     

    [
        'wp_api' => true,
        'version' => 'wc/v3',

    ]
);
$data = [
    'payment_method' => 'bacs',
    'payment_method_title' => 'Tarjeta de Credito',
    'status' => 'pending',

    'billing' => [
        'first_name' => $_POST['nombre'],
        'last_name' => $_POST['apellidos'],
        'address_1' => $_POST['direccion'],
        'city' => $_POST['canton'],
        'state' => $_POST['provincia'],
        'postcode' => $_POST['postal'],
        'country' => $_POST['pais'],
        'email' => $_POST['email'],
        'phone' => $_POST['telefono']
    ],
    'shipping' => [
        'first_name' => $_POST['nombre'],
        'last_name' => $_POST['apellidos'],
        'address_1' => $_POST['direccion'],
        'city' => $_POST['canton'],
        'state' => $_POST['provincia'],
        'postcode' => $_POST['postal'],
        'country' => $_POST['pais'],
        'email' => $_POST['email'],
        'phone' => $_POST['telefono']
    ],
    'line_items' => [
        [
            
            'product_id' => $_POST['codigo'],
            'name' => $_POST['producto'],
            'quantity' => $_POST['iten'],
            'total' => $_POST['codigo']
            
            
        ],
        
    ],
    'shipping_lines' => [
        [
            'method_id' => 'IVA',
            'method_title' => 'IVA',
            'total' => '10.00'
        ]
        ],
];

print_r($woocommerce->post('orders', $data));

?>
