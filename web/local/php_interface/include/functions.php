<?

class p {
    private $die,
        $data,
        $color,
        $return,
        $toFile,
        $varDump,
        $onlyAdmin;

    static function init($val){
        $p = new self();
        $p->onlyAdmin = false;
        $p->data = $val;
        $p->die = false;
        $p->return = false;
        $p->varDump = false;
        $p->toFile = false;
        return $p;
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

    function _die(){
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

    function __destruct()
    {
        if( !$this->toFile ) {
            global $USER;

            if (($USER->IsAdmin() && $this->onlyAdmin) || !$this->onlyAdmin) {
                $debug = (
                $this->varDump === true
                    ? var_dump($this->data)
                    : '<pre style="border:1px solid ' . (empty($this->color) ? "red" : $this->color) . '">' . print_r($this->data, true) . "</pre>\n"
                );
            }

            echo $debug;

            if ($this->die) die();
        }else
            AddMessage2Log($this->data);
    }
}
