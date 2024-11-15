<?php
class Response {
    private $array = [];
    private string $message = '';
    private string $action = '';

    public function __construct(array $array) {
        $this->array = $array;
        
    }

    public function getArray() : array {
        return $this->array;
    }

    public function getMessage() : string {
        return $this->message;
    }

    public function getAction() : string {
        return $this->action;
    }

    public function setMessage(string $message) : void {
         $this->message = $message;
    }
    public function setAction(string $action) : void {
        $this->action = $action;
   }

}