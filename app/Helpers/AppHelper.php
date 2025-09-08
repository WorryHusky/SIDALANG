<?php
namespace App\Helpers;


class AppHelper {
    static function type($type){
        if($type == 'rumah_sakit'){
            return "Rumah Sakit";
        } else if($type == 'puskesmas') {
            return "Puskesmas";
        } else {
            return "Klinik";
        }
    }
}
