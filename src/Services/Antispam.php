<?php

namespace App\Services;

class Antispam {
        
    /**
     * isSpam
     *
     * @param  mixed $text
     * @return bool
     */
    public function isSpam($text) {
        return \strlen($text) > 5;
    }
}