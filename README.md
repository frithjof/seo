# magento2-seo
Magento 2 module to automatically add open graph data
Facebook sharing looks really bad in standard magento 2 because it misses open graph data

This adds opengraph data for cats based standard magento data

Install

**composer require gfe/seo:dev-master**

Please run these commands in CLI 

php bin/magento setup:upgrade

php bin/magento cache:flush

php bin/magento setup:di:compile

