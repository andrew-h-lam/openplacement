<?php

namespace PhoneBundle;

use Symfony\Component\HttpKernel\Bundle\Bundle;

class PhoneBundle extends Bundle {
    public function formatPhoneNumber($phone_number) {

        $phone_number = preg_replace('/[^0-9]/', '',$phone_number);

        if(ctype_digit($phone_number) && strlen($phone_number) == 10) {
        $phone_number = substr($phone_number, 0, 3) .'-'.
                        substr($phone_number, 3, 3) .'-'.
                        substr($phone_number, 6);
        }
        return $phone_number;
    }
}
