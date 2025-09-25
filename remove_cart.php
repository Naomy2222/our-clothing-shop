<?php
session_start();
header('Content-Type: application/json');

$input = json_decode(file_get_contents('php://input'), true);
if(!isset($input['index'])) { echo json_encode(['success'=>false]); exit; }
$index = intval($input['index']);

if(isset($_SESSION['cart'][$index])){
  array_splice($_SESSION['cart'], $index, 1);
  echo json_encode(['success'=>true,'cart'=>$_SESSION['cart']]);
} else {
  echo json_encode(['success'=>false,'message'=>'Not found']);
}