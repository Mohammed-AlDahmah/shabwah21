<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SiteSettings extends Model
{
    use HasFactory;

    protected $fillable = [
        'key',
        'value',
        'type',
        'description'
    ];

    protected $casts = [
        'value' => 'json'
    ];

    /**
     * Get setting value by key
     */
    public static function getValue($key, $default = null)
    {
        $setting = static::where('key', $key)->first();
        return $setting ? $setting->value : $default;
    }

    /**
     * Set setting value
     */
    public static function setValue($key, $value, $type = 'text', $description = null)
    {
        return static::updateOrCreate(
            ['key' => $key],
            [
                'value' => $value,
                'type' => $type,
                'description' => $description
            ]
        );
    }

    /**
     * Get hero description
     */
    public static function getHeroDescription()
    {
        return static::getValue('hero_description', 'منبرك الأول للأخبار الصادقة والتحليلات العميقة من قلب محافظة شبوة. نقدم لكم آخر الأخبار والتقارير والتحليلات السياسية والاقتصادية والاجتماعية.');
    }

    /**
     * Get footer description
     */
    public static function getFooterDescription()
    {
        return static::getValue('footer_description', 'موقع إخباري شامل يغطي آخر المستجدات في محافظة شبوة واليمن والعالم العربي، برسالة مهنية وحيادية وموضوعية. نقدم لكم الأخبار العاجلة والتحليلات العميقة.');
    }

    /**
     * Get privacy policy
     */
    public static function getPrivacyPolicy()
    {
        return static::getValue('privacy_policy', 'سياسة الخصوصية الخاصة بموقع شبوة 21');
    }

    /**
     * Get terms of service
     */
    public static function getTermsOfService()
    {
        return static::getValue('terms_of_service', 'شروط الاستخدام الخاصة بموقع شبوة 21');
    }

    /**
     * Get social media links
     */
    public static function getSocialMediaLinks()
    {
        return static::getValue('social_media_links', [
            'facebook' => 'https://facebook.com/shabwah21',
            'twitter' => 'https://twitter.com/shabwah21',
            'instagram' => 'https://instagram.com/shabwah21',
            'youtube' => 'https://youtube.com/shabwah21',
            'telegram' => 'https://t.me/shabwah21',
            'linkedin' => 'https://linkedin.com/company/shabwah21'
        ]);
    }

    /**
     * Get contact information
     */
    public static function getContactInfo()
    {
        return static::getValue('contact_info', [
            'email' => 'info@shabwah21.com',
            'phone' => '+967 123 456 789',
            'address' => 'محافظة شبوة، اليمن',
            'working_hours' => 'الأحد - الخميس: 8:00 ص - 6:00 م'
        ]);
    }
} 