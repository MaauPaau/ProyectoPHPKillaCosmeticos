<?php
namespace App\Core;

class Validator {
    public static function clean($data) {
        return htmlspecialchars(stripslashes(trim($data)));
    }

    public static function validateEmail($email) {
        return filter_var($email, FILTER_VALIDATE_EMAIL);
    }

    public static function validateRequired($fields, $data) {
        $errors = [];
        foreach ($fields as $field) {
            if (!isset($data[$field]) || empty(trim($data[$field]))) {
                $errors[] = "El campo $field es obligatorio.";
            }
        }
        return $errors;
    }
}
