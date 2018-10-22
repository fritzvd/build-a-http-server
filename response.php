<?php

function create_response($request) {

  $parts = explode(' ', $request);

  $response = '';
  $method = $parts[0][0];
  $path = $parts[0][1];
  
  if ($method == 'GET' && $path == '/') {
    $response .= "
HTTP/1.1 200 OK

<!doctype html>
<html><body><h1>Hhahahah</h1></body></html>";
  } else if ($method == 'POST' && $path == '/') {
    $response = "
HTTP/1.1 201 OK

You posted!
  ";
  }
  return $response;
}