<?php
include("./lib/Bulbaphp.php");
include("./lib/Bulbasql.php");

$app = new \Bulba\BulbaApp();
$conn = new BulbaSqlConn("./secret/mysql.json");
$_SERVER['JWT_TOKENS'] = [

];

$app->setFreeFolders([""]);

$app->use([], "*", function (\Bulba\BulbaAppReq $req, \Bulba\BulbaAppRes $res) {
    $token = $req->body["jwt-token"];
    if (empty($token)) {
        $res->status(401)->sendJson([
            "error" => "Bad-Data"
        ]);
    }
});

