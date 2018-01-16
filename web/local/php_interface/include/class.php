<?php
class p {
    private $die
    ,$data
    ,$color
    ,$toFile
    ,$varDump
    ,$onlyAdmin
    ,$onlyAjax
    ,$RestartBuffer
    ;

    function __call($name, $arguments){
        $nameDelimer = explode("_",$name);
        if( $nameDelimer[1] ){
            $name="";
            foreach ($nameDelimer as $key=> $val)
                $name .= $val.(count($nameDelimer)>$key+1?'-':"");
        }
        $this->css .= $name.":".$arguments[0].";";
        return $this;
    }

    static function init($val){
        $p = new self();
        $p->onlyAdmin = true;
        $p->data = $val;
        $p->die = false;
        $p->varDump = false;
        $p->toFile = false;
        $p->onlyAjax = false;

        return $p;
    }

    protected function setStyle($val){
        return '<pre style="border:1px solid ' . (empty($this->color) ? "red" : $this->color) . '">' . $val . "</pre>\n";
    }

    function forAjax()
    {
        $this->onlyAjax = true;
        return $this;
    }
    function forAdmin(){
        $this->onlyAdmin = true;
        return $this;
    }

    function forAll(){
        $this->onlyAdmin = false;
        return $this;
    }

    function setColor($val){
        $this->color = $val;
        return $this;
    }

    function _type(){
        $this->data = gettype($this->data);
        return $this;
    }

    function _die($restart=false){
        $this->RestartBuffer = $restart;
        $this->die = true;
        return $this;
    }

    function _varDump(){
        $this->varDump = true;
        return $this;
    }

    function _toFile(){
        $this->toFile = true;
        return $this;
    }

    function getRequest()
    {
        $this->data = \Bitrix\Main\Context::getCurrent()->getRequest()->toArray();
        return $this;
    }

    function __destruct()
    {
        if( !$this->toFile ) {
            global $USER,$APPLICATION;

            if (
                ( ($USER->IsAdmin() && $this->onlyAdmin) || !$this->onlyAdmin ) &&
                ( \Bitrix\Main\Context::getCurrent()->getRequest()->isAjaxRequest() === $this->onlyAjax)
            ) {
                $debug = (
                $this->varDump === true
                    ? var_dump($this->data)
                    : $this->setStyle( print_r($this->data, true) )
                );

                if( $this->RestartBuffer === true )
                    $APPLICATION->RestartBuffer();

                echo $debug;
                if ($this->die === true ) die();
            }

        }else
            AddMessage2Log($this->data);
    }
}