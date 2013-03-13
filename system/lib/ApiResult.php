<?php

class ApiResult {

    protected $error = null;
    protected $result;
    const ERROR_SYSTEM = 1;
    const ERROR_USER = 2;

    public function __construct( $api_result ) {
        $api_result = json_decode( $api_result );
        // Something went completely wrong
        if ( !is_array( $api_result ) && !$api_result ) {
            throw new UnexpectedValueException( 'Unknown Error', self::ERROR_SYSTEM );
        }
        // User error
        elseif( isset( $api_result->error ) ) {
            throw new Exception( $api_result->error, self::ERROR_USER );
        }
        // Valid response
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