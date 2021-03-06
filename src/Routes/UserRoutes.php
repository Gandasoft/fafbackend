<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->get('/usertypes',function ( $request, $response,$args){

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


$app->get('/user/username/[{name}]',function ($request,$response,$args){
    $username=$args['name'];
    $userutil=new UserUtil($this->db);
    $user=$userutil->getUserByUsername($username);
    return $this->response->withJson($user);
});
$app->get('/user/[$id]',function($request,$response,$args){
    $id=$args['id'];
    $userutil=new Userutil($this->db);
    $user=$userutil->getUserId($id);
    return $this->response->withJson($user);

});
$app->post('/user/add',function(Request $request,Response $response,$args){
    $body=$request->getParsedBody();
    //get the usertype id and put the type name into the object to be send to the db
    $userutil=new Userutil($this->db);
    $usertypeutil=new userTypeUtil($this->db);
    $usertype=$usertypeutil->getIdByUsertype($body['UserTypes']);

  $body["UserTypes"]=$usertype['id'];

   $userDTO=new UserDTO($body);
   $message=$userutil->createUser($userDTO);

   $res=["status"=>$message->getStatuscode(), "message"=>$message->getMessagetext(),
        "messageType"=>$message->getMessagetype()    ];

    return $this->response->withJson($res);

});