<?php

namespace Spyrit\Billetel\Util;

class Util
{
    static public function getArrayFromObject($object, $propertyName = null)
    {
        $result = [];

        if (!is_object($object)) {
            if (!is_null($object)) {
                $result[$propertyName] = $object;
            }

            return $result;
        }

        foreach ($object as $key => $value) {
            if (!is_object($value)) {
                $result = array_merge($result, self::getArrayFromObject($value, $key));
            } else {
                $result = array_merge($result, [
                    $key => self::getArrayFromObject($value, $key)
                ]);
            }
        }

        return $result;
    }
}
