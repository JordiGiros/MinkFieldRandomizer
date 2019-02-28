<?php

namespace MinkFieldRandomizer\Model;

use MinkFieldRandomizer\Filter\FilterInterface;

class RandomEmail implements FilterInterface
{

    public function filter($params)
    {
        if (count($params) > 1) {
            throw new \Exception('RandomEmail accepts at most a parameter, the domain for the random email address - if none is given gmail.com is provided.');
        }
        $domain = 'gmail.com';
        if (!empty($params[0])) {
            $domain = filter_var ( $params[0], FILTER_SANITIZE_STRING);
        }
        $length = 10;

        $chr = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chr[rand(0, strlen($chr) - 1)];
        }

        return "Mail{$randomString}@{$domain}";
    }
}
