<?php
header("Access-Control-Allow-Origin: *");
header("Access-Control-Allow-Methods: POST");
header("Content-Type: application/json; charset=UTF-8");
header("Access-Control-Allow-Headers: Content-Type, Access-Control-Allow-Headers, Authorization, X-Requested-With");

require __DIR__.'/classes/Database.php';
require __DIR__.'/middlewares/Auth.php';

$allHeaders = getallheaders();
$db_connection = new Database();
$conn = $db_connection->dbConnection();
$auth = new Auth($conn,$allHeaders);

$returnData = [
    "success" => 0,
    "status" => 401,
    "message" => "Unauthorized"
];

if($auth->isAuth()){
    $returnData =[
        'success' => 1,
        'status' => 200
    ];
   $id=isset($_REQUEST['id'])?$_REQUEST['id']:"";
   $type=isset($_REQUEST['type'])?$_REQUEST['type']:"";

    //end point filter
   $case=($id>0)?"single":"";
   $case=($type=="history")?"history":$case;
   switch( $case) {
   
    case 'single':
        $single_rec = "SELECT * FROM `currency` WHERE `id`=:id";
        $single_rec_stmt = $conn->prepare($single_rec);
        $single_rec_stmt->bindValue(':id', $id,PDO::PARAM_STR);
        $single_rec_stmt->execute();
        $row = $single_rec_stmt->fetchall(PDO::FETCH_ASSOC);
        $returnData['data'] =$row ;
        break;
    case 'history':
        $history_rec = "SELECT * FROM `currency_history`  WHERE `currency_id`=:id order by id desc";
        $history_rec_stmt = $conn->prepare($history_rec);
        $history_rec_stmt->bindValue(':id', $id,PDO::PARAM_STR);
        $history_rec_stmt->execute();
        $row = $history_rec_stmt->fetchall(PDO::FETCH_ASSOC);
        $returnData['data'] =$row ;
        break;
    default:
        $currency_rec = "SELECT * FROM `currency` order by id desc";
        $currency_rec_stmt = $conn->prepare($currency_rec);
        $currency_rec_stmt->execute();
        $row = $currency_rec_stmt->fetchall(PDO::FETCH_ASSOC);
        $returnData['data'] =$row ;
        break;
    }
}

echo json_encode($returnData);