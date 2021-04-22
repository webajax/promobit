<?php

namespace App\Service;

class ResponseService
{
    protected $redirect;
    
    protected $success;
    
    protected $style;
    
    protected $icon;
    
    protected $message;
    
    protected $strongMessage;
    
    protected $vars;
    
    public function __construct()
    {
        
    }
    
    public function getRedirect() {
        return $this->redirect;
    }

    public function setRedirect($redirect) {
        $this->redirect = $redirect;
    }

    public function getSuccess() {
        return $this->success;
    }

    public function setSuccess($success) {
        $this->success = $success;
    }

    public function getStyle() {
        return $this->style;
    }

    public function setStyle($style) {
        $this->style = $style;
    }

    public function getMessage() {
        return $this->message;
    }

    public function setMessage($message) {
        $this->message = $message;
    }

    public function getStrongMessage() {
        return $this->strongMessage;
    }

    public function setStrongMessage($strongMessage) {
        $this->strongMessage = $strongMessage;
    }

    public function getVars() {
        return $this->vars;
    }

    public function setVars($vars) {
        $this->vars = $vars;
    }
    
    public function getIcon() {
        return $this->icon;
    }

    public function setIcon($icon) {
        $this->icon = $icon;
    }




}
?>