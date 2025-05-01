<?php

use App\Models\GeneralInfo;


function get_general_value($key)
{
    $general = GeneralInfo::where('key', $key)->first();
    if ($general) {
        return $general->value;
    }

    return '';
}
function get_page_title($page)
{
    switch ($page) {
        case 'pay':
            return 'طرق الدفع والأقساط';
        case 'term':
            return 'سياسة الخصوصية والشروط والاحكام';
        case 'ship':
            return 'الشحن والتوصيل ';
        case 'return':
            return 'شروط و سياسة الاستبدال';
        case 'confirm':
            return 'ألية الضمان';
        case 'safe':
            return 'خدمة الحماية الشاملة';
        default:
            return 'الصفحة غير موجودة';
    }
}
