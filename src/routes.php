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
$app->get('/usertypes',function (Request $request,Response $response,$args){

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

$app->get('/user/username/[{name}]',function ($request,$response,$args){
    $username=$args['name'];
    $userutil=new UserUtil($this->db);
    $user=$userutil->getUserByUsername($username);
    return $this->response->withJson($user);
});
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
$app->get('/user/[$id]',function($request,$response,$args){
    $id=$args['id'];
$userutil=new Userutil($this->db);
$user=$userutil->getUserId($id);
return $this->response->withJson($user);

});
$app->get('/adverts/',function($request,$response,$args){
$advertutil=new AdvertsUtil($this->db);
$adverts=$advertutil->getAllAdverts();
return $this->response->withJson($adverts);

});
$app->post('/adverts/add',function(Request $request,Response $response,$args){
   $body=$request->getParsedBody();
     //get ownerid ,status and flat assign it to the advert owner,status and  flat properties
    $userutil=new Userutil($this->db);
    $flatutil=new flatUtil($this->db);
    $statusutil=new StatusUtil($this->db);
    $accomutil=new AcommUtil($this->db);
    $user_id=$userutil->getUserId($body['Advert_owner']);
    $flat_id=$flatutil->getflatid($body['Flat']);
    $status_id=$statusutil->getStatusid($body['status']);
    $acomm_id=$accomutil->getAcommid($body['Accomodation_type']);
    //get flat id from name and assign it advert flat property
    $body["Flat"]=$flat_id['id'];
    $body["Advert_owner"]=$user_id['id'];
    $body["status"]=$status_id['status_id'];
    $body["Accomodation_type"]=$acomm_id['id'];

    $Advert=new AdvertsDTO($body);
    $advertutil=new AdvertsUtil($this->db);
   $message=$advertutil->AddAdvert($Advert);

      $response=["status"=>$message->getStatuscode(),
          "message"=>$message->getMessagetext(),
          "messageType"=>$message->getMessagetype()
          ];

    return $this->response->withJson($response);

});
