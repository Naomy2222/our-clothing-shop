<?php
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
if(!$input){ echo json_encode(['success'=>false,'message'=>'No data']); exit; }

$id = intval($input['id']);
$name = isset($input['name']) ? $input['name'] : 'Item';
$price = floatval($input['price']);

if(!isset($_SESSION['cart'])) $_SESSION['cart'] = [];

$found = false;
foreach($_SESSION['cart'] as &$it){
  if($it['id'] === $id){
    $it['qty'] += 1;
    $found = true;
    break;
  }
}
if(!$found){
  $_SESSION['cart'][] = ['id'=>$id,'name'=>$name,'price'=>$price,'qty'=>1];
}

echo json_encode(['success'=>true,'cart'=>$_SESSION['cart']]);