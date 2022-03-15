<?php
namespace controllers;

use Ubiquity\attributes\items\router\Get;
use Ubiquity\security\data\EncryptionManager;

#[Get('cryptuser/{$id}')]
public function cryptuser($id){
$user=DAO::getbyId($id);
    $crypt=EncryptionManager::encrypt($user);
echo "<pre>$crypt</pre>";

#[Get('DecryptUser/{data}')]
public function decryptUser($data){
$user=EncryptionManager::decryptString($data);