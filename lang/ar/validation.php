<?php

/*************************************************
 * Copyright (c) 2024.
 * @Author: Shaker Awad <awadshaker74@gmail.com>
 * @Date: 5/22/24, 12:42 PM.
 * @Project: Jumla
 ************************************************/

return [
    'accepted' => 'يجب قبول هذا الحقل.',
    'accepted_if' => 'يجب قبول هذا الحقل في حالة :other يساوي :value.',
    'active_url' => 'هذا الحقل لا يُمثّل رابطًا صحيحًا.',
    'after' => 'يجب على هذا الحقل أن يكون تاريخًا لاحقًا للتاريخ :date.',
    'after_or_equal' => 'هذا الحقل يجب أن يكون تاريخاً لاحقاً أو مطابقاً للتاريخ :date.',
    'alpha' => 'يجب أن لا يحتوي هذا الحقل سوى على حروف.',
    'alpha_dash' => 'يجب أن لا يحتوي هذا الحقل سوى على حروف، أرقام ومطّات.',
    'alpha_num' => 'يجب أن يحتوي هذا الحقل على حروفٍ وأرقامٍ فقط.',
    'array' => 'يجب أن يكون هذا الحقل ًمصفوفة.',
    'before' => 'يجب على هذا الحقل أن يكون تاريخًا سابقًا للتاريخ :date.',
    'before_or_equal' => 'هذا الحقل يجب أن يكون تاريخا سابقا أو مطابقا للتاريخ :date.',
    'between' => [
        'array' => 'يجب أن يحتوي هذا الحقل على عدد من العناصر بين :min و :max.',
        'file' => 'يجب أن يكون حجم ملف هذا الحقل بين :min و :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل بين :min و :max.',
        'string' => 'يجب أن يكون عدد حروف نّص هذا الحقل بين :min و :max.',
    ],
    'boolean' => 'يجب أن تكون قيمة هذا الحقل إما true أو false .',
    'confirmed' => 'حقل التأكيد غير مُطابق لهذا الحقل.',
    'current_password' => 'كلمة المرور غير صحيحة.',
    'date' => 'هذا الحقل ليس تاريخًا صحيحًا.',
    'date_equals' => 'يجب أن يكون هذا الحقل مطابقاً للتاريخ :date.',
    'date_format' => 'لا يتوافق هذا الحقل مع الشكل :format.',
    'declined' => 'يجب رفض هذا الحقل.',
    'declined_if' => 'يجب رفض هذا الحقل عندما يكون :other بقيمة :value.',
    'different' => 'يجب أن يكون الحقلان هذا الحقل و :other مُختلفين.',
    'digits' => 'يجب أن يحتوي هذا الحقل على :digits رقمًا/أرقام.',
    'digits_between' => 'يجب أن يحتوي هذا الحقل بين :min و :max رقمًا/أرقام .',
    'dimensions' => 'هذا الحقل يحتوي على أبعاد صورة غير صالحة.',
    'distinct' => 'لهذا الحقل قيمة مُكرّرة.',
    'email' => 'يجب أن يكون هذا الحقل عنوان بريد إلكتروني صحيح البُنية.',
    'ends_with' => 'يجب أن ينتهي هذا الحقل بأحد القيم التالية: :values',
    'enum' => 'هذا الحقل المختار غير صالح.',
    'exists' => 'القيمة المحددة لهذا الحقل غير موجودة.',
    'file' => 'هذا الحقل يجب أن يكون ملفا.',
    'filled' => 'هذا الحقل إجباري.',
    'gt' => [
        'array' => 'يجب أن يحتوي هذا الحقل على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم ملف هذا الحقل أكبر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل أكبر من :value.',
        'string' => 'يجب أن يكون طول نّص هذا الحقل أكثر من :value حروفٍ/حرفًا.',
    ],
    'gte' => [
        'array' => 'يجب أن يحتوي هذا الحقل على الأقل على :value عُنصرًا/عناصر.',
        'file' => 'يجب أن يكون حجم ملف هذا الحقل على الأقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من :value.',
        'string' => 'يجب أن يكون طول نص هذا الحقل على الأقل :value حروفٍ/حرفًا.',
    ],
    'image' => 'يجب أن يكون هذا الحقل صورةً.',
    'in' => 'هذا الحقل غير موجود.',
    'in_array' => 'هذا الحقل غير موجود في :other.',
    'integer' => 'يجب أن يكون هذا الحقل عددًا صحيحًا.',
    'ip' => 'يجب أن يكون هذا الحقل عنوان IP صحيحًا.',
    'ipv4' => 'يجب أن يكون هذا الحقل عنوان IPv4 صحيحًا.',
    'ipv6' => 'يجب أن يكون هذا الحقل عنوان IPv6 صحيحًا.',
    'json' => 'يجب أن يكون هذا الحقل نصًا من نوع JSON.',
    'lt' => [
        'array' => 'يجب أن يحتوي هذا الحقل على أقل من :value عناصر/عنصر.',
        'file' => 'يجب أن يكون حجم ملف هذا الحقل أصغر من :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل أصغر من :value.',
        'string' => 'يجب أن يكون طول نّص هذا الحقل أقل من :value حروفٍ/حرفًا.',
    ],
    'lte' => [
        'array' => 'يجب أن لا يحتوي هذا الحقل على أكثر من :value عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم ملف هذا الحقل :value كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل مساوية أو أصغر من :value.',
        'string' => 'يجب أن لا يتجاوز طول نّص هذا الحقل :value حروفٍ/حرفًا.',
    ],
    'mac_address' => 'الهذا الحقل يجب أن يكون عنوان MAC صالحاً.',
    'max' => [
        'array' => 'يجب أن لا يحتوي هذا الحقل على أكثر من :max عناصر/عنصر.',
        'file' => 'يجب أن لا يتجاوز حجم ملف هذا الحقل :max كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل مساوية أو أصغر من :max.',
        'string' => 'يجب أن لا يتجاوز طول نّص هذا الحقل :max حروفٍ/حرفًا.',
    ],
    'mimes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'mimetypes' => 'يجب أن يكون ملفًا من نوع : :values.',
    'min' => [
        'array' => 'يجب أن يحتوي هذا الحقل على الأقل على :min عُنصرًا/عناصر.',
        'file' => 'يجب أن يكون حجم ملف هذا الحقل على الأقل :min كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل مساوية أو أكبر من :min.',
        'string' => 'يجب أن يكون طول نص هذا الحقل على الأقل :min حروفٍ/حرفًا.',
    ],
    'multiple_of' => 'هذا الحقل يجب أن يكون من مضاعفات :value',
    'not_in' => 'عنصر الهذا الحقل غير صحيح.',
    'not_regex' => 'صيغة هذا الحقل غير صحيحة.',
    'numeric' => 'يجب على هذا الحقل أن يكون رقمًا.',
    'password' => 'كلمة المرور غير صحيحة.',
    'present' => 'يجب تقديم هذا الحقل.',
    'prohibited' => 'هذا الحقل محظور.',
    'prohibited_if' => 'هذا الحقل محظور إذا كان :other هو :value.',
    'prohibited_unless' => 'هذا الحقل محظور ما لم يكن :other ضمن :values.',
    'prohibits' => 'الهذا الحقل يحظر تواجد الحقل :other.',
    'regex' => 'صيغة هذا الحقل .غير صحيحة.',
    'required' => 'هذا الحقل مطلوب.',
    'required_array_keys' => 'الهذا الحقل يجب أن يحتوي على مدخلات لـ: :values.',
    'required_if' => 'هذا الحقل مطلوب في حال ما إذا كان :other يساوي :value.',
    'required_unless' => 'هذا الحقل مطلوب في حال ما لم يكن :other يساوي :values.',
    'required_with' => 'هذا الحقل مطلوب إذا توفّر :values.',
    'required_with_all' => 'هذا الحقل مطلوب إذا توفّر :values.',
    'required_without' => 'هذا الحقل مطلوب إذا لم يتوفّر :values.',
    'required_without_all' => 'هذا الحقل مطلوب إذا لم يتوفّر :values.',
    'same' => 'يجب أن يتطابق هذا الحقل مع :other.',
    'size' => [
        'array' => 'يجب أن يحتوي هذا الحقل على :size عنصرٍ/عناصر بالضبط.',
        'file' => 'يجب أن يكون حجم ملف هذا الحقل :size كيلوبايت.',
        'numeric' => 'يجب أن تكون قيمة هذا الحقل مساوية لـ :size.',
        'string' => 'يجب أن يحتوي نص هذا الحقل على :size حروفٍ/حرفًا بالضبط.',
    ],
    'starts_with' => 'يجب أن يبدأ هذا الحقل بأحد القيم التالية: :values',
    'string' => 'يجب أن يكون هذا الحقل نصًا.',
    'timezone' => 'يجب أن يكون هذا الحقل نطاقًا زمنيًا صحيحًا.',
    'unique' => 'قيمة هذا الحقل مُستخدمة من قبل.',
    'uploaded' => 'فشل في تحميل الـ هذا الحقل.',
    'url' => 'صيغة رابط هذا الحقل غير صحيحة.',
    'uuid' => 'هذا الحقل يجب أن يكون بصيغة UUID سليمة.',

    'process_success' => 'نجحت العملية.',
    'created_success' => 'تم انشاء ال:model بنجاح.',
    'deleted_success' => 'تم حذف ال:model بنجاح.',
    'edited_success' => 'تم تعديل ال:model بنجاح.',
    'process_fail' => 'فشلت العملية.',
    'created_fail' => 'فشلت عملية انشاء :model جديد.',
    'deleted_fail' => 'فشلت عملية حذف ال:model.',
    'edited_fail' => 'فشلت عملية تعديل ال:model.',

    'attributes' => [
        'password' => 'كلمة المرور',
    ],

];
