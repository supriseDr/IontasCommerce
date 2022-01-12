<?php
// use database seeders

use Iontas\Commerce\Models\Cart;

require_once "bootstrap.php";


/**
 * Tests
 */
$products = json_decode('[{"id":100,"name":"iPhone SE (32 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917969-cc1b8586-a3cf-11e7-872c-92d98d24afb0.png","width":200,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"349.00"},{"id":101,"name":"iPhone SE (128 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917969-cc1b8586-a3cf-11e7-872c-92d98d24afb0.png","width":200,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"449.00"},{"id":102,"name":"iPhone 6s (32 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917728-4052e8c8-a3cf-11e7-93df-7ac32ab8dca5.png","width":157,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"449.00"},{"id":103,"name":"iPhone 6s (128 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917728-4052e8c8-a3cf-11e7-93df-7ac32ab8dca5.png","width":157,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"549.00"},{"id":104,"name":"iPhone 6s Plus (32 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917727-405206e2-a3cf-11e7-943c-b9bc44155c24.png","width":158,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"549.00"},{"id":105,"name":"iPhone 6s Plus (128 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917727-405206e2-a3cf-11e7-943c-b9bc44155c24.png","width":158,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray","rose-gold":"Rose Gold"},"price":"649.00"},{"id":106,"name":"iPhone 7 (32 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917729-405340fc-a3cf-11e7-8553-3128f2668c22.png","width":182,"height":250},"colors":{"jet-black":"Jet Black","black":"Black","silver":"Silver","gold":"Gold","rose-gold":"Rose Gold"},"price":"549.00"},{"id":107,"name":"iPhone 7 (128 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917729-405340fc-a3cf-11e7-8553-3128f2668c22.png","width":182,"height":250},"colors":{"jet-black":"Jet Black","black":"Black","silver":"Silver","gold":"Gold","rose-gold":"Rose Gold"},"price":"649.00"},{"id":108,"name":"iPhone 7 Plus (32 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917731-407d0fa4-a3cf-11e7-9454-013bf60565e2.png","width":178,"height":250},"colors":{"jet-black":"Jet Black","black":"Black","silver":"Silver","gold":"Gold","rose-gold":"Rose Gold"},"price":"669.00"},{"id":109,"name":"iPhone 7 Plus (128 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917731-407d0fa4-a3cf-11e7-9454-013bf60565e2.png","width":178,"height":250},"colors":{"jet-black":"Jet Black","black":"Black","silver":"Silver","gold":"Gold","rose-gold":"Rose Gold"},"price":"769.00"},{"id":110,"name":"iPhone 8 (64 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917730-405386fc-a3cf-11e7-96fd-94a171614c39.png","width":182,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray"},"price":"699.00"},{"id":111,"name":"iPhone 8 (256 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917730-405386fc-a3cf-11e7-96fd-94a171614c39.png","width":182,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray"},"price":"799.00"},{"id":112,"name":"iPhone 8 Plus (64 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917726-404df20a-a3cf-11e7-87e2-dd4888daa658.png","width":177,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray"},"price":"799.00"},{"id":113,"name":"iPhone 8 Plus (256 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30917726-404df20a-a3cf-11e7-87e2-dd4888daa658.png","width":177,"height":250},"colors":{"silver":"Silver","gold":"Gold","space-gray":"Space Gray"},"price":"949.00"},{"id":114,"name":"Apple TV 4K (32 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30942290-a9c91b5e-a41c-11e7-99f8-18d91be86d94.png","width":252,"height":250},"colors":[],"price":"179.00"},{"id":115,"name":"Apple TV 4K (64 GB)","image":{"source":"https:\/\/user-images.githubusercontent.com\/73107\/30942290-a9c91b5e-a41c-11e7-99f8-18d91be86d94.png","width":252,"height":250},"colors":[],"price":"199.00"}]');

$colors = [
	'black'      => 'Black',
	'space-gray' => 'Space Gray',
	'jet-black'  => 'Jet Black',
	'silver'     => 'Silver',
	'gold'       => 'Gold',
	'rose-gold'  => 'Rose Gold',
];

$a = (isset($_GET['a'])) ? $_GET['a'] : 'home';

$cart = new Cart([
	// Maximum item can added to cart, 0 = Unlimited
	'cartMaxItem' => '0',

	// Maximum quantity of a item can be added to cart, 0 = Unlimited
	'itemMaxQuantity' => '5',

	// Do not use cookie, cart items will gone after browser closed
	'useCookie' => false,
]);

//add items to cart

foreach ($products as $product) {
    $cart->add($product->id, '1', [
        'price' => $product->price,
        'color' => '',
    ]);
   
}



var_dump($cart->getItems());