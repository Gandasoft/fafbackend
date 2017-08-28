<?php

// Routes
//
//$app->get('/[{name}]', function ($request, $response, $args) {
//    // Sample log message
//    $this->logger->info("Slim-Skeleton '/' route");
//
//    // Render index view
//    return $this->renderer->render($response, 'index.phtml', $args);
//});
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;

$app->get('/flat/[{id}]',function ($request,$response,$args){
    $id=$args['id'];

    $dbutil=new flatUtil($this->db);
    $flat=$dbutil->getflatbyid($id);
    if($flat!==false){
        return $this->response->withJson($flat);

    }else{
        $errorutil=new MessageDTO('404',"Search ERROR","The flat you search for was not found");
        $res=[
            "statuscode"=>$errorutil->getStatuscode(),
        "messageType"=>$errorutil->getMessagetype(),
            "messageText"=>$errorutil->getMessagetext()

            ];
   
        return $this->response->withJson($res);

    }


});
$app->get('/flat/search/[{query}]',function($request,$responnse,$args){
    $flatutil=new flatUtil($this->db);
    $query=$args['query'];
    $flats=$flatutil->Searchflat($query);

    return $this->response->withJson($flats);
});
$app->get('/flats/',function($request,$responnse,$args){
    $flatutil=new flatUtil($this->db);
    $flats=$flatutil->getflats();

    return $this->response->withJson($flats);
});