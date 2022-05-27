<?php

namespace Model\ClassGenerateTokens;

class GenerateTokens{
    
    private $key = "jWnZr4u7x!A%D*G-JaNdRgUkXp2s5v8y";

    public function generateToken($value){

        $this->key = $this->key . $value;
        return password_hash($this->key, PASSWORD_BCRYPT);
    }

    public function isValidToken($value, $sessao){

        $this->key = $this->key . $sessao;

        if(password_verify($this->key, $value)){
            return true;
        }

        return false;

    }
}

?>