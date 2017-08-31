<?php
/**
 * Created by PhpStorm.
 * User: micthaworm
 * Date: 8/31/17
 * Time: 3:15 AM
 */
use \Psr\Http\Message\ServerRequestInterface as Request;
use \Psr\Http\Message\ResponseInterface as Response;
$app->post("/address/new",function(Request $request,$response,$args){
    $body=$request->getParsedBody();

    return $response->withJson($body);
});