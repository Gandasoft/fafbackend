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

$app->get('/usertypes',function ($request,$response,$args){
   $stamnt=$this->db->prepare("SELECT * FROM fafdb.usertypes");
   $stamnt->execute();
   $usertypes=$stamnt->fetchAll();
   return $this->response->withJson($usertypes);
});
$app->get('/usertypes/[{id}]',function($request,$responnse,$args){
    $stamnt=$this->db->prepare("SELECT * FROM fafdb.usertypes WHERE id=:id");
    $stamnt->bindParam("id",$args['id']);
    $stamnt->execute();
    $usertypes=$stamnt->fetchObject();
    return $this->response->withJson($usertypes);
});
$app->get('/usertypes/search/[{query}]',function($request,$responnse,$args){
    $stamnt=$this->db->prepare("SELECT * FROM fafdb.usertypes WHERE UPPER(Type) LIKE :query");
    $query="%".$args['query']."%";
    $stamnt->bindParam("query",$query);
    $stamnt->execute();
    $usertypes=$stamnt->fetchAll();
    return $this->response->withJson($usertypes);
});
$app->post('/usertype',function ($request,$response){
    $input=$request->getParsedBody();
    $sql="INSERT INTO usertypes(usertype) VALUES(:usertype)";
    $stamnt=$this->db->preapre($sql);
    $stamnt->bindParam("usertype",$input['usertype']);
    $stamnt->execute();
    $input['id']=$this->db->lastInsertId();
    return $this->response->withJson($input);
});
$app->delete('usertypes/[{id}]',function($request,$response,$args){
    $stamnt=$this->db->prepare("DELETE FROM usertypes WHERE id=:id");
    $stamnt->bindParam("id",$args['id']);
    $stamnt->execute();
    $usertypes=$stamnt->fetchAll();
    return $this->response->withJson($usertypes);
});
$app->put('usertypes/[{id}]',function($request,$response,$args){
    $input=$request->getParseBody();
    $sql=$this->db->prepare("Update usertypes SET type=:type  WHERE id=:id");
    $stamnt=$this->db->prepare($sql);
    $stamnt->bindParam("id",$args['id']);
    $stamnt->$this->bindParam("type",$input['type']);
    $stamnt->execute();
    $input['id']=$args[id];
    return $this->response->withJson($input);
});
$app->get('/flat',function ($request,$response,$args){
      $dbutil=new flatUtil($this->db);
     $flats=$dbutil->getflats();
    return $this->response->withJson($flats);
});
