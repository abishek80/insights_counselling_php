<?php

use App\Models\SettingModel;

if (!function_exists('get_settings')) {
    function get_settings()
    {
        try {
            $settingModel = new SettingModel();
            $settings = $settingModel->find(1);
            if ($settings) {
                return $settings;
            }
        } catch (\Exception $e) {
            // Fallback to default settings if DB isn't set up yet
        }

        return [
            'id' => 1,
            'phone' => '+91 94456 62922',
            'email' => 'lekhapsy@gmail.com',
            'address_kovur' => 'No 8/124 Ragavendra nagar, near ECI church, Kovur, Chennai, Tamil Nadu 600128',
            'address_porur' => '71-A, 1st St, Karambakkam, Rajeswari Nagar, Porur, Chennai, Tamil Nadu 600116',
            'address_vadapalani' => 'P & G Multispeciality Hospital, New No.42, Old No.60, Jawaharlal Nehru Salai, Vadapalani, Chennai, Tamil Nadu 600026',
            'facebook' => 'https://www.facebook.com/share/18wRNfkPeE/',
            'instagram' => 'https://www.instagram.com/lekhaedwin_psychologist?igsh=MTlubjViY3hrcXB1dg==',
            'youtube' => 'https://youtube.com/@lekhaedwinpsychologist?si=4-nhvp-idsdt8Sc-',
            'whatsapp' => '9445662922',
            'booking_url' => 'https://insightcounselings.com/bookings/'
        ];
    }
}
