<?php

namespace App\Http\Helper;

class Helper{

    public static function validEmail($email)
    {
        return filter_var($email, FILTER_VALIDATE_EMAIL) !== false;
    }

    public static function validEmailFromPayload($payload)
    {
        if (isset($payload['contact_email'])) {
            $res = self::validEmail($payload['contact_email']);
            if(!$res){
                return false;
            }
        }
        if (isset($payload['cc_emails']) && is_array($payload['cc_emails'])) {
            foreach ($payload['cc_emails'] as $cc_email) {
                if (!empty($cc_email)) {
                    $res = self::validEmail($cc_email);
                    if(!$res){
                        return false;
                    }
                }
            }
        }
        return true;
    }
}