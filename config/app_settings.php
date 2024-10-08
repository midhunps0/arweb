<?php

return [
    'enabled_locales' => [
        'en' => 'English',
        'ar' => 'Arabic'
    ],
    'default_locale' => 'en',
    'page_templates_folder' => 'pagetemplates',
    'form_templates_folder' => 'pageformtemplates',
    'article_translation_component' => 'article',
    'department_translation_component' => 'department',
    'facility_translation_component' => 'facility',
    'review_translation_component' => 'review',
    'video_translation_component' => 'video',
    'photo_translation_component' => 'photo',
    'doctor_translation_component' => 'doctor',
    'news_translation_component' => 'news',
    'hfeature_translation_component' => 'hilight_feature',
    'solver_userid' => 'VOICEOC_TEST',
    'solver_password' => '@piPa$$word',
    'solver_domain' => 'http://117.232.77.122:98',
    'solver_token_url' => '/API/Security/ValidateUser',
    'solver_specialties_url' => '/API/Appointment/GetSpecialtyList',
    'solver_doctors_url' => '/API/Appointment/GetDoctorsList',
    'solver_dates_url' => '/API/Appointment/GetConsultationDates',
    'solver_slots_url' => '/API/Appointment/GetFreeSlots',
    'solver_booking_url' => '/API/Appointment/BookAppointment',
    'solver_adv_booking_days' => 7,
    'airpay_username' => env('AIRPAY_USERNAME'),
    'airpay_password' => env('AIRPAY_PASSWORD'),
    'airpay_api_key' => env('AIRPAY_API_KEY'),
    'airpay_mercid' => env('AIRPAY_MERCID')

];
