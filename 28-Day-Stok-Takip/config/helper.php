<?php
class helper
{
    static function redirect($url)
    {
        if($url)
        {
            if(!headers_sent())
            {
                header("Location:".$url);
            }
            else
            {
                echo '<script>location.href="'.$url.'";</script>';
            }
        }
    }

    static function cleaner($text)
    {
        $array = array('insert','update','union','select','*');
        $text = str_replace($array,'',$text);
        $text = strip_tags($text);
        $text = trim($text);
        return $text;
    }

    static function flashData($key,$value)
    {
        $_SESSION[$key] = $value;
    }

    static function flashDataView($key)
    {
        if(isset($_SESSION[$key])) {
            $sonuc = $_SESSION[$key];
            unset($_SESSION[$key]);
            echo $sonuc;
        }

    }

}



?>