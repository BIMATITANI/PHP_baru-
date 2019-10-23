<?php

function sanitize($string){
    return str_ireplace(
        '%3Cscript',
        '',

        str_replace(
            array('<',';','|','&','>',"'",'"',')','('),
            array('&lt;','&#58;','&#124;','&#38;','&gt;','&apos;','&#x22;','&#x29;','&#x28;'),
            $string
        )
    );
}