<?php

namespace utils;

class Data_Validation
{

    public static function cleanData($input): string
    {
        $input = trim($input);
        $input = stripslashes($input);
        return htmlspecialchars($input);
    }

    public static function validateDate($date): bool
    {
        $date_arr = explode('-', $date);
        $yy = $date_arr[0];
        $mm = $date_arr[1];
        $dd = $date_arr[2];

        $is_format_valid = checkdate($mm, $dd, $yy);

        $today = date("Y-m-d H:i:s");

        $is_valid = $date < $today;

        return $is_valid && $is_format_valid;
    }


    /**
     * Reset errors at global session level.
     * @return void
     */
    public static function unsetError(): void
    {
        if (isset($_SESSION['error'])) {
            unset($_SESSION['error']);
        }
    }

}