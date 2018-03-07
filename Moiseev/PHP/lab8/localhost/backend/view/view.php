<?php

class View {
    public function render($data, $tmplt_name) {
        include $tmplt_name;
        
    }
}

?>