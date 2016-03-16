<?php
    
class TesteDoisNumeros {
    public $a;
    public $b;
    
    public function _construct($a, $b) {
        $this->a = $a;
        $this->b = $b;
    }
 
    public function somar() {
        return $this->a + $this->b;
    }
    
}

?>