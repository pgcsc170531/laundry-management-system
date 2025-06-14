<?php defined('BASEPATH') OR exit('No direct script access allowed'); ?>

INFO - 2024-12-30 13:37:59 --> Config Class Initialized
INFO - 2024-12-30 13:37:59 --> Hooks Class Initialized
DEBUG - 2024-12-30 13:38:00 --> UTF-8 Support Enabled
INFO - 2024-12-30 13:38:00 --> Utf8 Class Initialized
INFO - 2024-12-30 13:38:00 --> URI Class Initialized
INFO - 2024-12-30 13:38:00 --> Router Class Initialized
INFO - 2024-12-30 13:38:00 --> Output Class Initialized
INFO - 2024-12-30 13:38:00 --> Security Class Initialized
DEBUG - 2024-12-30 13:38:00 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-12-30 13:38:00 --> Input Class Initialized
INFO - 2024-12-30 13:38:00 --> Language Class Initialized
INFO - 2024-12-30 13:38:00 --> Loader Class Initialized
INFO - 2024-12-30 13:38:00 --> Database Driver Class Initialized
INFO - 2024-12-30 13:38:00 --> Session: Class initialized using 'database' driver.
INFO - 2024-12-30 13:38:00 --> Controller Class Initialized
DEBUG - 2024-12-30 13:38:00 --> Session class already loaded. Second attempt ignored.
INFO - 2024-12-30 13:38:00 --> Model "Products_model" initialized
INFO - 2024-12-30 13:38:00 --> Model "Constant_model" initialized
INFO - 2024-12-30 13:38:00 --> Helper loaded: form_helper
INFO - 2024-12-30 13:38:00 --> Form Validation Class Initialized
INFO - 2024-12-30 13:38:01 --> Helper loaded: url_helper
INFO - 2024-12-30 13:38:01 --> Language file loaded: language/english/pagination_lang.php
INFO - 2024-12-30 13:38:01 --> Pagination Class Initialized
INFO - 2024-12-30 13:38:01 --> Helper loaded: language_helper
INFO - 2024-12-30 13:38:01 --> Language file loaded: language/english/message_lang.php
ERROR - 2024-12-30 13:38:01 --> Severity: Notice --> Undefined index: per_page C:\xampp\htdocs\offline\application\controllers\Products.php 322
INFO - 2024-12-30 13:38:02 --> Config Class Initialized
INFO - 2024-12-30 13:38:02 --> Hooks Class Initialized
DEBUG - 2024-12-30 13:38:02 --> UTF-8 Support Enabled
INFO - 2024-12-30 13:38:02 --> Utf8 Class Initialized
INFO - 2024-12-30 13:38:02 --> URI Class Initialized
DEBUG - 2024-12-30 13:38:02 --> No URI present. Default controller set.
INFO - 2024-12-30 13:38:02 --> Router Class Initialized
INFO - 2024-12-30 13:38:02 --> Output Class Initialized
INFO - 2024-12-30 13:38:02 --> Security Class Initialized
DEBUG - 2024-12-30 13:38:02 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-12-30 13:38:02 --> Input Class Initialized
INFO - 2024-12-30 13:38:02 --> Language Class Initialized
INFO - 2024-12-30 13:38:02 --> Loader Class Initialized
INFO - 2024-12-30 13:38:02 --> Database Driver Class Initialized
INFO - 2024-12-30 13:38:02 --> Session: Class initialized using 'database' driver.
INFO - 2024-12-30 13:38:02 --> Controller Class Initialized
DEBUG - 2024-12-30 13:38:02 --> Session class already loaded. Second attempt ignored.
INFO - 2024-12-30 13:38:02 --> Model "Auth_model" initialized
INFO - 2024-12-30 13:38:02 --> Helper loaded: form_helper
INFO - 2024-12-30 13:38:02 --> Form Validation Class Initialized
INFO - 2024-12-30 13:38:02 --> Helper loaded: url_helper
INFO - 2024-12-30 13:38:02 --> Helper loaded: language_helper
INFO - 2024-12-30 13:38:02 --> Language file loaded: language/english/message_lang.php
INFO - 2024-12-30 13:38:02 --> File loaded: C:\xampp\htdocs\offline\application\views\login.php
INFO - 2024-12-30 13:38:02 --> Final output sent to browser
DEBUG - 2024-12-30 13:38:02 --> Total execution time: 0.1343
INFO - 2024-12-30 14:29:40 --> Config Class Initialized
INFO - 2024-12-30 14:29:40 --> Hooks Class Initialized
DEBUG - 2024-12-30 14:29:41 --> UTF-8 Support Enabled
INFO - 2024-12-30 14:29:41 --> Utf8 Class Initialized
INFO - 2024-12-30 14:29:41 --> URI Class Initialized
INFO - 2024-12-30 14:29:41 --> Router Class Initialized
INFO - 2024-12-30 14:29:41 --> Output Class Initialized
INFO - 2024-12-30 14:29:41 --> Security Class Initialized
DEBUG - 2024-12-30 14:29:41 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-12-30 14:29:41 --> Input Class Initialized
INFO - 2024-12-30 14:29:41 --> Language Class Initialized
INFO - 2024-12-30 14:29:41 --> Loader Class Initialized
INFO - 2024-12-30 14:29:41 --> Database Driver Class Initialized
INFO - 2024-12-30 14:29:41 --> Session: Class initialized using 'database' driver.
INFO - 2024-12-30 14:29:41 --> Controller Class Initialized
INFO - 2024-12-30 14:29:41 --> Model "Sync_model" initialized
DEBUG - 2024-12-30 14:29:41 --> cURL Class Initialized
INFO - 2024-12-30 14:29:41 --> Helper loaded: language_helper
INFO - 2024-12-30 14:29:41 --> Language file loaded: language/english/message_lang.php
DEBUG - 2024-12-30 14:29:41 --> SQL Query for orders: SELECT *
FROM `orders`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for order_items: SELECT *
FROM `order_items`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for order_payments: SELECT *
FROM `order_payments`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for products: SELECT *
FROM `products`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for inventory: SELECT *
FROM `inventory`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for customers: SELECT *
FROM `customers`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for suppliers: SELECT *
FROM `suppliers`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for purchase_order: SELECT *
FROM `purchase_order`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for purchase_order_items: SELECT *
FROM `purchase_order_items`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for users: SELECT *
FROM `users`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 14:29:41 --> SQL Query for expenses: SELECT *
FROM `expenses`
WHERE `updated_at` > '1970-01-01 00:00:00'
ERROR - 2024-12-30 14:29:41 --> Error syncing to remote server. HTTP Code: 0. Response: 
INFO - 2024-12-30 14:29:41 --> Final output sent to browser
DEBUG - 2024-12-30 14:29:41 --> Total execution time: 0.1701
INFO - 2024-12-30 15:53:12 --> Config Class Initialized
INFO - 2024-12-30 15:53:12 --> Hooks Class Initialized
DEBUG - 2024-12-30 15:53:12 --> UTF-8 Support Enabled
INFO - 2024-12-30 15:53:12 --> Utf8 Class Initialized
INFO - 2024-12-30 15:53:12 --> URI Class Initialized
INFO - 2024-12-30 15:53:12 --> Router Class Initialized
INFO - 2024-12-30 15:53:12 --> Output Class Initialized
INFO - 2024-12-30 15:53:12 --> Security Class Initialized
DEBUG - 2024-12-30 15:53:12 --> Global POST, GET and COOKIE data sanitized
INFO - 2024-12-30 15:53:12 --> Input Class Initialized
INFO - 2024-12-30 15:53:12 --> Language Class Initialized
INFO - 2024-12-30 15:53:12 --> Loader Class Initialized
INFO - 2024-12-30 15:53:12 --> Database Driver Class Initialized
INFO - 2024-12-30 15:53:12 --> Session: Class initialized using 'database' driver.
INFO - 2024-12-30 15:53:12 --> Controller Class Initialized
INFO - 2024-12-30 15:53:12 --> Model "Sync_model" initialized
DEBUG - 2024-12-30 15:53:12 --> cURL Class Initialized
INFO - 2024-12-30 15:53:12 --> Helper loaded: language_helper
INFO - 2024-12-30 15:53:12 --> Language file loaded: language/english/message_lang.php
DEBUG - 2024-12-30 15:53:12 --> SQL Query for orders: SELECT *
FROM `orders`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for order_items: SELECT *
FROM `order_items`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for order_payments: SELECT *
FROM `order_payments`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for products: SELECT *
FROM `products`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for inventory: SELECT *
FROM `inventory`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for customers: SELECT *
FROM `customers`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for suppliers: SELECT *
FROM `suppliers`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for purchase_order: SELECT *
FROM `purchase_order`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for purchase_order_items: SELECT *
FROM `purchase_order_items`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for users: SELECT *
FROM `users`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:12 --> SQL Query for expenses: SELECT *
FROM `expenses`
WHERE `updated_at` > '1970-01-01 00:00:00'
DEBUG - 2024-12-30 15:53:15 --> Decoded Response Data: Array
(
    [orders] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [customer_id] => 1
                    [customer_name] => offline
                    [customer_email] => 
                    [customer_mobile] => 
                    [ordered_datetime] => 2024-12-24 01:00:08
                    [outlet_id] => 2
                    [outlet_name] => SPLASH SUPER STORE MAKUDAWA
                    [outlet_address] => MAGANGARIN MAKUDAWA
                    [outlet_contact] => 07042829161  08037466122
                    [outlet_receipt_footer] => <p>Good receive in good condition are not refundable.</p>
                    [gift_card] => 
                    [subtotal] => 1.00
                    [discount_total] => 0.00
                    [discount_percentage] => 
                    [tax] => 0.00
                    [grandtotal] => 1.00
                    [total_items] => 1
                    [payment_method] => 1
                    [payment_method_name] => Cash
                    [cheque_number] => 
                    [paid_amt] => 1.00
                    [return_change] => 0.00
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 01:00:08
                    [updated_user_id] => 0
                    [updated_datetime] => 0000-00-00 00:00:00
                    [vt_status] => 1
                    [status] => 1
                    [refund_status] => 0
                    [remark] => 
                    [card_number] => 
                    [current_balance] => 0
                    [created_at] => 2024-12-24 01:00:08
                    [updated_at] => 2024-12-24 01:00:08
                )

        )

    [order_items] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [order_id] => 1
                    [product_code] => 15
                    [product_name] => COKE
                    [product_category] => 2
                    [cost] => 1.00
                    [price] => 1.00
                    [qty] => 1
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 01:00:08
                    [updated_user_id] => 0
                    [updated_datetime] => 0000-00-00 00:00:00
                    [status] => 1
                    [created_at] => 2024-12-24 01:00:08
                    [updated_at] => 2024-12-24 01:00:08
                )

        )

    [order_payments] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [order_id] => 1
                    [payment_method_id] => 1
                    [payment_method_name] => Cash
                    [payment_amount] => 1.00
                    [number] => 
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 01:00:08
                    [updated_user_id] => 0
                    [updated_datetime] => 0000-00-00 00:00:00
                    [status] => 1
                    [created_at] => 2024-12-24 01:00:08
                    [updated_at] => 2024-12-24 01:00:08
                )

        )

    [products] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [code] => 15
                    [name] => COKE
                    [category] => 2
                    [purchase_price] => 1.00
                    [retail_price] => 1.00
                    [thumbnail] => no_image.jpg
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 00:58:51
                    [updated_user_id] => 0
                    [updated_datetime] => 0000-00-00 00:00:00
                    [status] => 1
                    [exp_date] => 
                    [created_at] => 2024-12-24 00:58:51
                    [updated_at] => 2024-12-24 00:58:51
                )

            [1] => Array
                (
                    [id] => 2
                    [code] => 11
                    [name] => ONLINE PRODUCT
                    [category] => 2
                    [purchase_price] => 1.00
                    [retail_price] => 1.00
                    [thumbnail] => no_image.jpg
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 01:01:34
                    [updated_user_id] => 0
                    [updated_datetime] => 0000-00-00 00:00:00
                    [status] => 1
                    [exp_date] => 
                    [created_at] => 2024-12-24 01:01:34
                    [updated_at] => 2024-12-24 01:01:34
                )

            [2] => Array
                (
                    [id] => 3
                    [code] => 890
                    [name] => ONLINE 2 0880
                    [category] => 1
                    [purchase_price] => 1.00
                    [retail_price] => 1.00
                    [thumbnail] => no_image.jpg
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 01:07:54
                    [updated_user_id] => 34
                    [updated_datetime] => 2024-12-24 01:09:43
                    [status] => 1
                    [exp_date] => 
                    [created_at] => 2024-12-23 19:07:54
                    [updated_at] => 2024-12-24 01:09:43
                )

        )

    [inventory] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [product_code] => 15
                    [outlet_id] => 2
                    [qty] => 0
                    [new_qty] => 0
                    [new_qty_date] => 2024-12-24 01:00:08
                    [updatetime] => 2024-12-24 00:58:51
                    [created_at] => 2024-12-24 00:58:51
                    [updated_at] => 2024-12-24 01:00:08
                )

            [1] => Array
                (
                    [id] => 2
                    [product_code] => 11
                    [outlet_id] => 2
                    [qty] => 1
                    [new_qty] => 0
                    [new_qty_date] => 2024-12-24 01:01:34
                    [updatetime] => 2024-12-24 01:01:34
                    [created_at] => 2024-12-24 01:01:34
                    [updated_at] => 2024-12-24 01:01:34
                )

            [2] => Array
                (
                    [id] => 3
                    [product_code] => 890
                    [outlet_id] => 2
                    [qty] => 1
                    [new_qty] => 0
                    [new_qty_date] => 2024-12-23 19:07:54
                    [updatetime] => 2024-12-23 19:07:54
                    [created_at] => 2024-12-23 19:07:54
                    [updated_at] => 2024-12-23 19:07:54
                )

        )

    [customers] => Array
        (
            [0] => Array
                (
                    [id] => 1
                    [fullname] => offline
                    [email] => 
                    [mobile] => 
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 00:34:49
                    [current_balance] => 0
                    [created_at] => 2024-12-24 00:34:49
                    [updated_at] => 2024-12-24 00:34:49
                )

            [1] => Array
                (
                    [id] => 2
                    [fullname] => online
                    [email] => 
                    [mobile] => 
                    [created_user_id] => 34
                    [created_datetime] => 2024-12-24 00:35:08
                    [current_balance] => 0
                    [created_at] => 2024-12-23 18:35:08
                    [updated_at] => 2024-12-23 18:35:08
                )

        )

    [suppliers] => Array
        (
        )

    [purchase_order] => Array
        (
        )

    [purchase_order_items] => Array
        (
        )

    [users] => Array
        (
            [0] => Array
                (
                    [id] => 33
                    [fullname] => ALH NASIRU
                    [email] => alh@splash.com
                    [password] => 097eb8e24af9f6ef9852f7b02ff68ff0
                    [role_id] => 1
                    [outlet_id] => 0
                    [created_user_id] => 1
                    [created_datetime] => 2020-08-13 17:34:58
                    [updated_user_id] => 34
                    [updated_datetime] => 2024-11-11 12:24:21
                    [status] => 1
                    [created_at] => 2024-12-23 18:29:53
                    [updated_at] => 2024-12-23 18:29:53
                )

            [1] => Array
                (
                    [id] => 34
                    [fullname] => SUPER USER
                    [email] => super@splash.com
                    [password] => b6e1c022069bc2cc67557bbe5ed407fd
                    [role_id] => 1
                    [outlet_id] => 0
                    [created_user_id] => 1
                    [created_datetime] => 2020-09-16 17:53:37
                    [updated_user_id] => 0
                    [updated_datetime] => 0000-00-00 00:00:00
                    [status] => 1
                    [created_at] => 2024-12-23 18:29:53
                    [updated_at] => 2024-12-23 18:29:53
                )

        )

    [expenses] => Array
        (
        )

)

DEBUG - 2024-12-30 15:53:15 --> No records to upsert for table: suppliers
DEBUG - 2024-12-30 15:53:15 --> No records to upsert for table: purchase_order
DEBUG - 2024-12-30 15:53:15 --> No records to upsert for table: purchase_order_items
DEBUG - 2024-12-30 15:53:15 --> No records to upsert for table: expenses
INFO - 2024-12-30 15:53:15 --> Final output sent to browser
DEBUG - 2024-12-30 15:53:15 --> Total execution time: 3.0779
