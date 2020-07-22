# magento2-seo
Magento 2 module to automatically add open graph data
Facebook sharing looks really bad in standard magento 2 because it misses open graph data

This adds opengraph data for cats based standard magento data.

It grabs the Seo fields and cat image and the first 10 product images and pushes them into fb open graph data

If you like this and it helps you consider donating here https://paypal.me/frithjofdev

Install

**composer require gfe/seo:dev-master**

Please run these commands in CLI 

php bin/magento setup:upgrade

php bin/magento cache:flush

php bin/magento setup:di:compile

