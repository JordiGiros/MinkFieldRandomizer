<?php

namespace MinkFieldRandomizer\Model;

use MinkFieldRandomizer\Filter\FilterInterface;

class RandomEmail implements FilterInterface
{

    public function filter($params)
    {
        if (count($params) > 0) {
            throw new \Exception("RandomEmail does not accept parameters");
        }
        $length = 10;

        $chr = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
        $randomString = '';
        for ($i = 0; $i < $length; $i++) {
            $randomString .= $chr[rand(0, strlen($chr) - 1)];
        }

        return "Mail{$randomString}@grr.la";
    }
}
