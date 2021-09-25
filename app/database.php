<?php

/**
 * Database Connection 
 */
function connect()
{
    return new mysqli(HOST, USER, PASS, DB);
}


/**
 * Create 
 */
function create($sql)
{
    connect()->query($sql);
}

/**
 * Get all data 
 */
function all($table)
{
    return connect()->query("SELECT * FROM {$table}");
}
