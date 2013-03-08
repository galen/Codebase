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

class ApiResult {

    protected $error = null;
    protected $result;
    const ERROR_SYSTEM = 1;
    const ERROR_USER = 2;

    public function __construct( $api_result ) {
        $api_result = json_decode( $api_result );
        if ( !is_array( $api_result ) && !$api_result ) {
            throw new UnexpectedValueException( 'Unknown Error', self::ERROR_SYSTEM );
        }
        elseif( isset( $api_result->error ) ) {
            throw new Exception( $api_result->error, self::ERROR_USER );
        }
        else {
            $this->result = $api_result;
        }
    }

    public function getData() {
        return $this->result;
    }

    public function __get( $var ) {
        return $this->result->$var;
    }

    public function isError() {
        return $this->error !== null;
    }

    public function getError() {
        return $this->error;
    }

}