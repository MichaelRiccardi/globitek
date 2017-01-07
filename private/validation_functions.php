<?php

    $max_length = 255;

    $name_length = array(
        "min" => 2,
        "max" => $max_length
    );

    $email_length = array(
        "max" => $max_length
    );

    $username_length = array(
        "min" => 8,
        "max" => $max_length
    );

    // is_blank('abcd')
    function is_blank($value='') {
        return (strlen($value) == 0);
    }

    // has_length('abcd', ['min' => 3, 'max' => 5])
    function has_length($value, $options=array()) {
        
        $length = strlen($value);
        
        $meetsMin = !isset($options['min']) || $length >= $options['min'];
        $meetsMax = !isset($options['max']) || $length <= $options['max'];     
        
        return $meetsMin && $meetsMax;
        
    }

    // has_valid_email_format('test@test.com')
    function has_valid_email_format($value) {
        // TODO
        return (strpos($value, "@") !== false);
    }

    function validate_first_name($first_name, &$errors)
    {    
        global $name_length;
        
        if(is_blank($first_name))
        {
            $errors[] = "First name cannot be blank.";
        }
        else if(!has_length($first_name, $name_length))
        {
            $errors[] = "First name must be between {$name_length['min']} and {$name_length['max']} characters.";
        }
    }

    function validate_last_name($last_name, &$errors)
    {    
        global $name_length;
        
        if(is_blank($last_name))
        {
            $errors[] = "Last name cannot be blank.";
        }
        else if(!has_length($last_name, $name_length))
        {
            $errors[] = "Last name must be between {$name_length['min']} and {$name_length['max']} characters.";
        }
    }

    function validate_email($email, &$errors)
    {
        global $email_length;
        
        if(is_blank($email))
        {
            $errors[] = "Email cannot be blank.";
        }
        else if(!has_valid_email_format($email))
        {
            $errors[] = "Email must be a valid format.";
        }
        else if(!has_length($email, $email_length))
        {
            $errors[] = "Email must not exceed {$email_length['max']} characters.";
        }
    }

    function validate_username($username, &$errors)
    {
        global $username_length;
        
        if(is_blank($username))
        {
            $errors[] = "Username cannot be blank.";
        }
        else if(!has_length($username, $username_length))
        {
            $errors[] = "Username must be between {$username_length['min']} and {$username_length['max']} characters.";
        }           
    }

?>
