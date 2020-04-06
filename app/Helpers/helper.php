<?php

//Here has helper functions that are available throughout the project

if (!function_exists('get_users_page_details')) {
    /**
     * Return Users Page Details
     *
     * @return array
     */
    function get_users_page_details()
    {
        return array('page' => 'users', 'btn_name' => 'Add User', 'btn_icon' => 'fa-plus');
    }
}

if (!function_exists('auth_user_full_name')) {
    /**
     * Returns the authenticated user's full name
     */

    function auth_user_full_name($param)
    {
        return $param->first_name . " " . $param->last_name;
    }
}

function currency_format($val)
{
    return "$" . $val;
}
