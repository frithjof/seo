# magento2-seo

This is a module for Magento 2 automatically adds open graph data.

Facebook sharing looks really bad in standard magento 2 because it misses open graph data.

This adds open graph data for categories based on standard magento data.

It grabs the seo Data for the Category, the Image and the first 10 Product Images

If you like this and it helps consider donating here https://paypal.me/frithjofdev

## Installation

**`composer require gfe/seo:dev-master`**

Please run these commands in CLI after installation

    php bin/magento setup:upgrade
    php bin/magento cache:flush
    php bin/magento setup:di:compile
