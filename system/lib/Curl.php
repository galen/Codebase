<?php

class Curl {

    protected $curl = null;

    function __construct(){
        $this->initializeCurl();
    }

    protected function initializeCurl() {
        $this->curl = curl_init();
        curl_setopt( $this->curl, CURLOPT_RETURNTRANSFER, true );
    }

    public function setOption( $option, $value ) {
        curl_setopt( $this->curl, $option, $value );
    }

    public function get( $url, array $data = null ){
        curl_setopt( $this->curl, CURLOPT_CUSTOMREQUEST, 'GET' );
        curl_setopt( $this->curl, CURLOPT_URL, sprintf( "%s?%s", $url, http_build_query( (array)$data ) ) );
        return $this->fetch();
    }

    public function post( $url, $data = null ) {
        curl_setopt( $this->curl, CURLOPT_CUSTOMREQUEST, 'POST' );
        curl_setopt( $this->curl, CURLOPT_URL, $url );
        curl_setopt( $this->curl, CURLOPT_POSTFIELDS, is_array( $data ) ? http_build_query( $data ) : $data );
        return $this->fetch();
    }

    public function put( $url, array $data = null  ){
        curl_setopt( $this->curl, CURLOPT_CUSTOMREQUEST, 'PUT' );
        curl_setopt( $this->curl, CURLOPT_URL, sprintf( "%s?%s", $url, http_build_query( (array)$data ) ) );
        return $this->fetch();
    }

    public function delete( $url, array $data = null  ){
        curl_setopt( $this->curl, CURLOPT_CUSTOMREQUEST, 'DELETE' );
        curl_setopt( $this->curl, CURLOPT_URL, sprintf( "%s?%s", $url, http_build_query( (array)$data ) ) );
        return $this->fetch();
    }

    protected function fetch() {
        $raw_response = curl_exec( $this->curl );
        $error = curl_error( $this->curl );
        if ( $error ) {
            return false;
        }
        return $raw_response;
    }
    
}