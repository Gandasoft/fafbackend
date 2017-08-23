<?php
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
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
