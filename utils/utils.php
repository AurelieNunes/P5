<?php

namespace P5\Utils;

class Utils
{
    /**
     * Fonction qui vérifie si un des champs est vide
     * @param array $properties
     * @return bool
     * 
     */
    public function isEmpty(array $properties): bool
    {
        foreach ($properties as $property) {
            if(empty($property)){
                return true;
            }
        }
        return false;
    }

    /**
     * Fonction qu vérifie que la valeur existe
     * @param array $values
     * @return bool
     */
    public function isIsset(array $values): bool
    {
        foreach ($values as $value){
            if(!isset($value)){
                return false;
            }
        }
        return true;
    }
}
