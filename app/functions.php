<?php


/**
 * Validate Msg
 */
function validate($msg, $type = 'danger')
{
    return "<p class=\"alert alert-{$type}\">{$msg} ! <button class=\"close\" data-dismiss=\"alert\">&times;</button></p>";
}


/**
 * Email validation 
 */
function emailCheck($email)
{
    if (filter_var($email, FILTER_VALIDATE_EMAIL)) {
        return true;
    } else {
        return false;
    }
}

/**
 * Check inst email 
 */
function instEmail(string $email, array $mails)
{
    // Email last part 
    $mail_arr = explode('@', $email);
    $last = end($mail_arr);

    if (in_array($last, $mails)) {
        return true;
    } else {
        return false;
    }
}


/**
 * Cell Validation 
 * [ 01 8801 +8801 min length  11 ]  
 */
function cellcheck($cell)
{
    $length = strlen($cell);

    if (substr($cell, 0, 2) == '01' and $length > 10) {
        return true;
    } else if (substr($cell, 0, 4) == '8801' and $length > 12) {
        return  true;
    } else if (substr($cell, 0, 5) == '+8801' and $length > 13) {
        return true;
    } else {
        return  false;
    }
}


/**
 * Old data store
 */
function old($name)
{

    if (isset($_POST[$name])) {
        echo $_POST[$name];
    } else {
        echo "";
    }
}

/**
 * Form Clear 
 */
function formClean()
{
    $_POST = '';
}

/**
 * File Upload System 
 */
function move($file, $path = '/')
{

    $file_name = time() . '_' . rand() . '_' . $file['name'];
    $file_tmp = $file['tmp_name'];
    $file_size = $file['size'];

    move_uploaded_file($file_tmp, $path . $file_name);

    return $file_name;
}
