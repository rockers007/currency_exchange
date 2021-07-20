# Build a Simple REST API in Core PHP By Rockers Team


### Clone this project using the following commands:

```
https://github.com/rockers007/currency_exchange

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
### API end ponit

main url =https://rockerstech.com/currency_exchange/

1.main url+currencies :- should return a list of currency rates

2.main url+currencies /{id}  :should return the currency rate for the passed id

3.main url+currencies /{id}/history  :should return the history of course changes selected currency


### API call example

show.php disply tabular data by calling currency api .server url is https://rockerstech.com/currency_exchange/show.php