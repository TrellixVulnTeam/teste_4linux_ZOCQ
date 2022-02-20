<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:sanctum')->get('/user', function (Request $request) {
    return $request->user();
});

Route::get('/salas', function () {

    $database = new SQLite3('../database/database.db');
    $sql = "SELECT * FROM salas";
    $rows = array();

    $results = $database->query($sql);

    while ($row = $results->fetchArray(SQLITE3_ASSOC)) {

        $jsonArray[] = $row;
    };
    

    return json_encode(['data' => $jsonArray]);

});

Route::post('/store', function () {
    
    $postdata = file_get_contents("php://input");
    $database = new SQLite3('../database/database.db');

    if(!empty($postdata)){

        $request = json_decode($postdata, true);
        $sala = $request['data'];
        if(!empty($sala)){
            $database->exec("INSERT INTO salas VALUES('{$sala}', 'Manhã', TRUE)");
            $database->exec("INSERT INTO salas VALUES('{$sala}', 'Tarde', TRUE)");
            $database->exec("INSERT INTO salas VALUES('{$sala}', 'Noite', TRUE)");

            echo json_encode(['data'=>$sala]);
            http_response_code(201);
        }

    }

});

Route::post('/agendar', function() {

    $postdata = file_get_contents("php://input");
    $database = new SQLite3('../database/database.db');
    
    if(!empty($postdata)){

        $request = json_decode($postdata, true);
        $sala = $request['data']['nome'];
        $horario = $request['data']['horario'];
        
        $database->exec("UPDATE salas SET disp = FALSE WHERE nome = '{$sala}' and horario = '{$horario}'");
        

    };

});