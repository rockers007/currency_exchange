# Build a Simple REST API in Core PHP By Rockers Team


### Clone this project using the following commands:

```
git@github.com:oktadeveloper/okta-php-core-rest-api-example.git
cd okta-php-core-rest-api-example
```

### Configure the application

Create mysql database using phpmyadmin or command prompt on your server
import currnecy_date.sql file into your database

```
configure host,username,password,database name at classes/database.php file
```

### jwt token setting

```
set time duration for token,api domain,scret ket at classess/Jwthandler.php
```

### Postman file

```
import USD Rate.postman_collection.json to your postman to check api end point
```

### Cron Job file or url for update currnecy rate

this url is used for update currnecy rate http://<your domain path>/currency_cron.php

