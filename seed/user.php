<?php
# When installed via composer
require('../config/database.php');
require_once '../vendor/autoload.php';
$faker = Faker\Factory::create();
 for($i=1;$i<150;$i++){
 
 $q=$db->prepare('INSERT INTO users(name,pseudo,email,password,active,created_at) VALUES(:name,:pseudo,:email,:password,:active,:created_at) ');
 $q->execute(array(
  
  'name'=>$faker->unique()->name,
  'pseudo'=>$faker->unique()->userName,
  'email'=>$faker->unique()->email,
  'password'=>password_hash('123456', PASSWORD_BCRYPT),
  'active'=>1,
  'created_at'=>$faker->date().' '.$faker->time()
     ));


 }
 echo "Success 150 users has been added ";