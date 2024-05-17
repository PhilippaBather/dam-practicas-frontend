<?php

namespace utils;

class Data_Validation
{

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