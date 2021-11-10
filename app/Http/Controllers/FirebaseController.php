<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

use Kreait\Firebase;

use Kreait\Firebase\Factory;

use Kreait\Firebase\ServiceAccount;

use Kreait\Firebase\Database;

class FirebaseController extends Controller

{

//

public function index(){

$serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');

$firebase = (new Factory)

->withServiceAccount($serviceAccount)

->withDatabaseUri('https://findnoyfirebase.firebaseio.com/')

->create();

$database = $firebase->getDatabase();

$newPost = $database

->getReference('crimes');

$crimes = $newPost->getValue();

foreach ($crimes as $crimes) {
    $all_crimes[] = $crimes;
}

 return json_encode($all_crimes);
}

public function getData() {
    $serviceAccount = ServiceAccount::fromJsonFile(__DIR__.'/FirebaseKey.json');
    $firebase = (new Factory)
    ->withServiceAccount($serviceAccount)
    ->withDatabaseUri('https://findnoyfirebase.firebaseio.com/')
    ->create();

    $database   =   $firebase->getDatabase();
    $createPost    =   $database->getReference('blog/posts')->getvalue();      
    return response()->json($createPost);
}
}
?>