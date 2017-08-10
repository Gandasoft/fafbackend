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

   $usertUtil=new userTypeUtil($this->db);
   $usertypes=$usertUtil->getUsertypes();

   return $response->withJson($usertypes);
});
$app->get('/usertype/[{id}]',function($request,$response,$args){
       $id=$args['id'];
       $usertypeutil=new UserTypeUtil($this->db);
       $usertype=$usertypeutil->getUsertypeById($id);
    return $this->response->withJson($usertype);
});
$app->get('/flat/search/[{query}]',function($request,$responnse,$args){
     $flatutil=new flatUtil($this->db);
     $query=$args['query'];
     $flats=$flatutil->Searchflat($query);

    return $this->response->withJson($flats);
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
$app->delete('userTypeUtil/[{id}]',function($request,$response,$args){
    $stamnt=$this->db->prepare("DELETE FROM userTypeUtil WHERE id=:id");
    $stamnt->bindParam("id",$args['id']);
    $stamnt->execute();
    $usertypes=$stamnt->fetchAll();
    return $this->response->withJson($usertypes);
});
$app->put('userTypeUtil/[{id}]',function($request,$response,$args){
    $input=$request->getParseBody();
    $sql=$this->db->prepare("Update userTypeUtil SET type=:type  WHERE id=:id");
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
$app->get('/flat/[{id}]',function ($request,$response,$args){
    $id=$args['id'];
    $dbutil=new flatUtil($this->db);
    $flat=$dbutil->getflatbyid($id);
    if($flat!==0){
        return $this->response->withJson($flat);

    }else{
        $errorutil=new ErrorUtil();
        $errorutil->setStatus('404');
        $errorutil->setErrortext('The flat was not found');
        $res=['status'=>$errorutil->getStatus(),'errortext'=>$errorutil->getErrortext()];
        return $this->response->withJson($res);

    }

});
