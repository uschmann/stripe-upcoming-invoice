# Installation

1. Clone the repo
2. Open the stripe dashboard and copy your api-secret
3. Open index.php
4. Search for the variable *$stripeSecret* and set your api-secret
```php
$stripeSecret = 'YOUR_KEY_HERE';
```

# How to run
```
$php index.php
```

# The problem that is demonstrated
Stripe provides a feature to retrieve an upcoming invoice.
This can be used to preview a proration of an existing subscription.
The problem is that the returned invoice does not return all line_items
of an upcoming invoices. Instead the consumer of the api
has to fetch the complete list of line_items of the upcoming invoice.

The Problem: When fetching the list of line_items of an upcoming invoice, the api
does return the line_items without the temporary updates.

# What does this application do?

1. It creates a new customer with a default source.
2. It creates 10 plan testplan.0 - testplan.9
3. It creates a subscription with teplan.0 - testplan.9 where each subscription_item has a quantity of 1
4. It calls **Invoice::upcoming** to preview an upgrade of each plan to a quantity of 2
5. It prints the upcoming invoice as JSON. (Here we expect 20 line_items 10 for the unused time and 10 for the remaining time. But we only receive 10)
6. It fetches the remaining invoice_items  and prints them as json

# The JSON output of **Invoice::upcoming**

```javascript
{
  "object": "invoice",
  "amount_due": 150000,
  "application_fee": null,
  "attempt_count": 0,
  "attempted": false,
  "billing": "charge_automatically",
  "charge": null,
  "closed": false,
  "currency": "eur",
  "customer": "cus_CR8B5BAyX6txd9",
  "date": 1522921690,
  "description": null,
  "discount": null,
  "due_date": null,
  "ending_balance": null,
  "forgiven": false,
  "lines": {
    "object": "list",
    "data": [
      {
        "id": "ii_1C2FvVCLbSY8uKOo8V3rBLQA",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.9 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.9",
          "object": "plan",
          "amount": 5000,
          "created": 1520237035,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6V5qmdJVSIgN",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.9"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BGaOq1e3N72",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOohQfwRRfn",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.8 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.8",
          "object": "plan",
          "amount": 5000,
          "created": 1520237034,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VoBlHHRsc2f",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.8"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BNwIDCCzZKS",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOogZukBhfO",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.7 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.7",
          "object": "plan",
          "amount": 5000,
          "created": 1520237033,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VcHiWYPAOSZ",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.7"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BWSsz8HO29b",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOo4VV19O2X",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.6 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.6",
          "object": "plan",
          "amount": 5000,
          "created": 1520237033,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6Ve3cXLuVoR5",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.6"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BL6M4srOno2",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOoWOg4SOkN",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.5 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.5",
          "object": "plan",
          "amount": 5000,
          "created": 1520237032,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VicdLAyskOh",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.5"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8Bv6CFzQYtj2",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOo4ZMZSNYW",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.4 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.4",
          "object": "plan",
          "amount": 5000,
          "created": 1520237031,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VPlGNJxzvDr",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.4"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BoSVJGjOrNh",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOo8rZjIZv1",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.3 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.3",
          "object": "plan",
          "amount": 5000,
          "created": 1520237030,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VisPylRWmHp",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.3"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BJVibgW0Dr6",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOosgTWuIv6",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.2 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.2",
          "object": "plan",
          "amount": 5000,
          "created": 1520237029,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VYH7LD7UHQB",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.2"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8B2yB9GIXXZJ",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOoY10H7YJq",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.1 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.1",
          "object": "plan",
          "amount": 5000,
          "created": 1520237028,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6VxStL5PuGWI",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.1"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8B2RcqPLw81w",
        "type": "invoiceitem"
      },
      {
        "id": "ii_1C2FvVCLbSY8uKOow4WlxQV1",
        "object": "line_item",
        "amount": -5000,
        "currency": "eur",
        "description": "Unused time on testplan.0 after 05 Mar 2018",
        "discountable": false,
        "livemode": false,
        "metadata": [

        ],
        "period": {
          "start": 1520243293,
          "end": 1522921690
        },
        "plan": {
          "id": "testplan.0",
          "object": "plan",
          "amount": 5000,
          "created": 1520237027,
          "currency": "eur",
          "interval": "month",
          "interval_count": 1,
          "livemode": false,
          "metadata": [

          ],
          "nickname": null,
          "product": "prod_CR6V6B6tuSGfJq",
          "trial_period_days": null,
          "statement_descriptor": null,
          "name": "testplan.0"
        },
        "proration": true,
        "quantity": 1,
        "subscription": "sub_CR8B60YkD87Yax",
        "subscription_item": "si_CR8BdaPDjHJ4Kv",
        "type": "invoiceitem"
      }
    ],
    "has_more": true,
    "total_count": 30,
    "url": "\/v1\/invoices\/upcoming\/lines?customer=cus_CR8B5BAyX6txd9&subscription=sub_CR8B60YkD87Yax"
  },
  "livemode": false,
  "metadata": [

  ],
  "next_payment_attempt": 1522925290,
  "number": "8943DBD-0002",
  "paid": false,
  "period_end": 1522921690,
  "period_start": 1520243290,
  "receipt_number": null,
  "starting_balance": 0,
  "statement_descriptor": null,
  "subscription": "sub_CR8B60YkD87Yax",
  "subscription_proration_date": 1520243293,
  "subtotal": 150000,
  "tax": null,
  "tax_percent": null,
  "total": 150000,
  "webhooks_delivered_at": null
}
```

# The JSON output of **$invoice->lines->all()->jsonSerialize()**

```javascript
{
    "object": "list",
    "data": [
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.0 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.0",
                "object": "plan",
                "amount": 5000,
                "created": 1520237027,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6V6B6tuSGfJq",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.0"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8ENe0a5u8WLR",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.1 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.1",
                "object": "plan",
                "amount": 5000,
                "created": 1520237028,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VxStL5PuGWI",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.1"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8EvrHbOxjBsT",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.2 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.2",
                "object": "plan",
                "amount": 5000,
                "created": 1520237029,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VYH7LD7UHQB",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.2"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8EaJri0d9gIf",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.3 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.3",
                "object": "plan",
                "amount": 5000,
                "created": 1520237030,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VisPylRWmHp",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.3"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8EIdXH4SFPrm",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.4 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.4",
                "object": "plan",
                "amount": 5000,
                "created": 1520237031,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VPlGNJxzvDr",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.4"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8ExcJ46WTEQQ",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.5 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.5",
                "object": "plan",
                "amount": 5000,
                "created": 1520237032,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VicdLAyskOh",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.5"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8ECZkrNRFzOh",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.6 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.6",
                "object": "plan",
                "amount": 5000,
                "created": 1520237033,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6Ve3cXLuVoR5",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.6"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8E2Nyx8Rc2Yf",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.7 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.7",
                "object": "plan",
                "amount": 5000,
                "created": 1520237033,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VcHiWYPAOSZ",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.7"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8EdeT1PCEUMZ",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.8 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.8",
                "object": "plan",
                "amount": 5000,
                "created": 1520237034,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6VoBlHHRsc2f",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.8"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8Ezo7kq9Ahhk",
            "type": "subscription"
        },
        {
            "id": "sub_CR8EdUiL8sdVuy",
            "object": "line_item",
            "amount": 5000,
            "currency": "eur",
            "description": "1 \u00d7 testplan.9 (at \u20ac50.00 \/ month)",
            "discountable": true,
            "livemode": false,
            "metadata": [],
            "period": {
                "start": 1522921878,
                "end": 1525513878
            },
            "plan": {
                "id": "testplan.9",
                "object": "plan",
                "amount": 5000,
                "created": 1520237035,
                "currency": "eur",
                "interval": "month",
                "interval_count": 1,
                "livemode": false,
                "metadata": [],
                "nickname": null,
                "product": "prod_CR6V5qmdJVSIgN",
                "trial_period_days": null,
                "statement_descriptor": null,
                "name": "testplan.9"
            },
            "proration": false,
            "quantity": 1,
            "subscription": null,
            "subscription_item": "si_CR8EAOiqBstFOF",
            "type": "subscription"
        }
    ],
    "has_more": false,
    "url": "\/v1\/invoices\/upcoming\/lines?customer=cus_CR8EsFhqYz18bv&subscription=sub_CR8EdUiL8sdVuy"
}
```