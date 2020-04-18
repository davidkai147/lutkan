<?php
if (!function_exists('user')) {
    /**
     * Get user session info
     *
     * @return array
     */
    function user($field = '')
    {
        $user = session()->get("users");
        return !empty($user[$field]) && isset($user[$field]) ? $user[$field] : $user;
    }
}
