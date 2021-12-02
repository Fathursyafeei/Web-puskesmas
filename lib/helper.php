<?php

class Helper
{

    public static function arrayInputSanitizer($data, $conn)
    {
        if (!is_array($data)) die('hanya array yang diterima');
        if (empty($data)) return $data;

        $temp = [];
        foreach ($data as $key => $value) {
            if ($key == 'password') {
                $temp[$key] = password_hash($value, PASSWORD_DEFAULT);
                continue;
            }

            $temp[$key] = mysqli_real_escape_string($conn, htmlspecialchars(strip_tags($value, ''), ENT_QUOTES));
        }

        return $temp;
    }
}
