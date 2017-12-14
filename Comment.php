<?php

class Comment implements \JsonSerializable
{
    private $user_uid, $date, $message, $deletable, $cid;
    
    public function __construct($user_uid, $date, $message, $deletable, $cid)
    {
        $this->user_uid = $user_uid;
        $this->date = $date;
        $this->message = $message;
        $this->deletable = $deletable;
        $this->cid = $cid;
    }
 
    
    public function jsonSerialize()
    {
        $json_obj = new \stdClass;
        $json_obj->user_uid = $this->user_uid;
        $json_obj->date = $this->date;
        $json_obj->message = $this->message;
        $json_obj->deletable = $this->deletable;
        $json_obj->cid = $this->cid;
        return $json_obj;
    }
}