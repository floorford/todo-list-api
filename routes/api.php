<?php

// we can group all our articles routes together
$router->group(["prefix" => "tasks"], function ($router) {
  $router->post("", "Tasks@store");
  $router->get("", "Tasks@index");
  $router->patch("{task}", "Tasks@update");
  $router->delete("{task}", "Tasks@destroy");
  $router->patch("{task}/complete", "Tasks@complete");

  // {task} is a url parameter representing the id we want
});
