<?php

class View {
    public function render ($data, $name_tpl) {
        include $name_tpl;
    }
}