<?php

class Api {

    protected $curl;

    public function __construct( Curl $curl ) {
        $this->curl = $curl;
    } 

    protected function fetch( $method, $url, array $data = null ) {
        return new ApiResult( $this->curl->$method( $url, (array)$data ) );
    }

    public function get( $url, array $data = null ) {
        return $this->fetch( 'get', $url, $data );
    }

    public function post( $url, array $data = null ) {
        return $this->fetch( 'post', $url, $data );
    }

}