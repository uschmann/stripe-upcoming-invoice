<?php
require_once('vendor/autoload.php');

use Stripe\Customer;
use Stripe\Stripe;
use Stripe\Plan;
use Stripe\Subscription;
use Stripe\Invoice;


function printLine($text) {
	echo $text . "\n";
}

// Set your API-secret here.
// Get it from: https://dashboard.stripe.com/account/apikeys
$stripeSecret = 'YOUR_KEY_HERE';
$numberOfPlans = 10;


Stripe::setApiKey($stripeSecret);

/****************************************************************************************
 * 1. Create customer
 ***************************************************************************************/
printLine("Create customer");
$customer = Customer::create([
	'description' => 'A test customer',
	'source'      => 'tok_amex',
]);

/****************************************************************************************
 * 2. Create Plans if they do not exist yet
 ***************************************************************************************/
printLine('Creating plans');
try {
	for($i = 0; $i < $numberOfPlans; $i++) {
		Plan::create([
			"amount"   => 5000,
			"interval" => "month",
			"product"  => [
				"name" => 'testplan.' . $i
			],
			"currency" => "eur",
			"id"       => 'testplan.' . $i
		]);
	}
}
catch(Exception $e) {
	printLine('Plans already exist');
}

/****************************************************************************************
 * 3. Create subscription
 ***************************************************************************************/
printLine('Creating subscription');

$items = [];
for($i = 0; $i < $numberOfPlans; $i++) {
	$items[] = [
		'plan' => 'testplan.' . $i,
		'quantity' => 1,
	];
}

$subscription = Subscription::create(array(
	"customer" => $customer->id,
	"items"    => $items,
));

/****************************************************************************************
 * 4. Get upcoming invoice for a subscription where quantity of each plan is increased by 1
 ***************************************************************************************/
printLine('Retrieve upcoming invoice');
$items = [];
foreach($subscription->items->data as $item) {
	$items[] = [
		'id'       => $item->id,
		'plan'     => $item->plan,
		'quantity' => 2,
	];
}

$invoice = Invoice::upcoming([
	"customer"           => $customer->id,
	"subscription"       => $subscription->id,
	"subscription_items" => $items,
], ['limit' => 100]);


/****************************************************************************************
 * 5. Print json-serialized invoice
 ***************************************************************************************/
printLine(json_encode($invoice->jsonSerialize()), JSON_PRETTY_PRINT);


/****************************************************************************************
 * 6. print all line_items as json
 ***************************************************************************************/
printLine(json_encode($invoice->lines->all()->jsonSerialize(), JSON_PRETTY_PRINT));