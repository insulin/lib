<?php

abstract class Insulin_Service_Mapping_Abstract
{

    /**
     * 
     * @param array|object $source 
     * @return array
     */
    abstract static function toInternal($source);

    /**
     * 
     * @param array|object $source 
     * @return array
     */
    abstract static function toExternal($source);

}
