<html>
<head>

<meta name="viewport" content="width=device-width, initial-scale=1.0">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />


    <!--jQuery library file -->
    <script type="text/javascript" src=
        "https://code.jquery.com/jquery-3.5.1.js">
    </script>
  
  
<title>Currency Data</title>
<link rel="stylesheet" href="style.css" type="text/css" />
</head>
<body>
<table id="tableID">
       
            <tr>
                <th>Name</th>
                <th>Rate</th>
            </tr>
       
       
    </table>
</body>
</html>
<script type="text/javascript">
var token ="Bearer eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJodHRwOlwvXC9sb2NhbGhvc3RcL2NvcmVwaHBcLyIsImF1ZCI6Imh0dHA6XC9cL2xvY2FsaG9zdFwvY29yZXBocFwvIiwiaWF0IjoxNjI2NzcwMjMyLCJleHAiOjE2Mzk3MzAyMzIsImRhdGEiOnsidXNlcl9pZCI6IjYifX0.nAbEFfeKtGnbE-4hLdliYQIw-KKeVlIX6Sx8HAoZ56M";
var url="http://localhost/corephp/currencies";
    function showRecords(perPageCount, pageNumber) {
        $.ajax({
            type: "GET",
            url: url,
           // data: "pageNumber=" + pageNumber,
            cache: false,
            dataType: 'json',
            headers: {
                'Authorization': token,
                'header2': 'value2'
            },
            contentType: 'application/json; charset=utf-8',
    		
            success: function(result) {
               
                var trHTML = '';
                    $.each(result.data, function (i, item) {
                        trHTML += '<tr><td>' + item.name + '</td><td>' +item.rate + '</td</tr>';
                    });
                    $('#tableID').append(trHTML);

                   
               
            }
        });
    }
    
    $(document).ready(function() {
        showRecords(10, 1);
    });
</script>