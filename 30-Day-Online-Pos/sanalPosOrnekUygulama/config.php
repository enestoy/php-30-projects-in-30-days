<?php

require_once('IyzipayBootstrap.php');

IyzipayBootstrap::init();

class Config
{
    public static function options()
    {
        $options = new \Iyzipay\Options();
        $options->setApiKey('sandbox-sKr6MOdbNJFleh86bdCcTNAPdLM5hcU2');
        $options->setSecretKey('sandbox-FTTs9ex0T500xfqUzoVdRKeehSvuCS9P');
        $options->setBaseUrl('https://sandbox-api.iyzipay.com');

        return $options;
    }
}