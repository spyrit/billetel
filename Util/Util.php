<?php

namespace Spyrit\Billetel\Util;

class Util
{
    static public function getArrayFromObject($object, $propertyName = null)
    {
        $result = [];

        if (!is_object($object)) {
            $result[$propertyName] = $object;

            return $result;
        }

        foreach ($object as $key => $value) {
            $result = array_merge($result, $this->getArrayFromObject($value, $key));
        }

        return $result;
    }
}