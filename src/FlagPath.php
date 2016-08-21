<?php

class FlagPath {
    public static function make($identifier, $size)
    {
        if( ! in_array($size, ["tiny", "small", "large"])){
            $size = "tiny";
        }

        return __DIR__."/../images/".$size."/".$identifier.".png";
    }
}