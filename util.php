<?php


function dePara($array, $para)
{
    $r = new ReflectionClass($para);
    
    $properties = $r->getProperties();

    foreach ($properties as $prop) {
        $propName = $prop->getName();
        if (array_key_exists($propName, $array)) {
            $prop->setValue($para, $array[$propName] );
        }
    }

    return $para;
}


