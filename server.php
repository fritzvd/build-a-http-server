<?php

$socket = socket_create( AF_INET, SOCK_STREAM, 0 );

if ( !socket_bind($socket, '127.0.0.1', 3003 ) )
		{
			throw new Exception( 'Could not bind: - '.socket_strerror( socket_last_error() ) );
		}

while (true) {
  socket_listen( $socket );

  // try to get the client socket resource
  // if false we got an error close the connection and continue
  if ( !$client = socket_accept( $socket ) ) {
    socket_close( $client ); continue;
  }

  $request = socket_read( $client, 1024 );
  $response = "HTTP/1.1 200 OK

Hello, I'm a webserver";
  
  socket_write( $client, $response, strlen( $response ) );
  socket_close($client);
}