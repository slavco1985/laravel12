<?php

use App\Models\AppSettings;

function currency()
    {
        $settings = AppSettings::first();
        if(!empty($settings)){
            if($settings->currency_type == 'Symbol')
                return $settings->currency_symbol;
            else
                return $settings->currency_code;
        }else{
            return '$';
        }
       
    }