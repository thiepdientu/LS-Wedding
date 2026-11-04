<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Cache;

class SystemSetting extends Model
{
    protected $table = 'system_settings';

    protected $fillable = [
        'key',
        'value',
        'group',
    ];

    /**
     * Cache key for all settings
     */
    public const CACHE_KEY = 'system_settings_cache';

    /**
     * Danh sách giá trị mặc định cho toàn hệ thống
     */
    public static function defaults(): array
    {
        return [
            // Thông tin chung & Hỗ trợ
            'site_name' => 'WeddingSaaS',
            'site_slogan' => 'Nền tảng tạo thiệp cưới trực tuyến chuyên nghiệp',
            'hotline' => '0988 888 888',
            'zalo_url' => 'https://zalo.me/',
            'facebook_url' => 'https://facebook.com/',
            'default_domain' => 'wed.vn',

            // Quy chuẩn thiệp cưới
            'default_card_validity_months' => '12',
            'max_album_photos' => '30',
            'enable_guestbook_default' => '1',
            'enable_banking_qr_default' => '1',
            'inactive_templates' => '[]',
        ];
    }

    /**
     * Lấy toàn bộ settings dưới dạng key => value (đã gộp với defaults)
     */
    public static function getAll(): array
    {
        return Cache::rememberForever(self::CACHE_KEY, function () {
            $dbSettings = static::query()->pluck('value', 'key')->toArray();
            return array_merge(static::defaults(), $dbSettings);
        });
    }

    /**
     * Lấy giá trị của một key cụ thể
     */
    public static function get(string $key, mixed $default = null): mixed
    {
        $all = static::getAll();
        if (array_key_exists($key, $all)) {
            return $all[$key];
        }

        return $default ?? (static::defaults()[$key] ?? null);
    }

    /**
     * Cập nhật hoặc thêm mới một key
     */
    public static function set(string $key, mixed $value, string $group = 'general'): self
    {
        $setting = static::updateOrCreate(
            ['key' => $key],
            ['value' => $value, 'group' => $group]
        );

        Cache::forget(self::CACHE_KEY);

        return $setting;
    }

    /**
     * Cập nhật nhiều cấu hình cùng lúc
     */
    public static function setMany(array $settingsWithGroups): void
    {
        foreach ($settingsWithGroups as $key => $item) {
            $value = is_array($item) ? ($item['value'] ?? null) : $item;
            $group = is_array($item) ? ($item['group'] ?? 'general') : 'general';

            static::updateOrCreate(
                ['key' => $key],
                ['value' => $value, 'group' => $group]
            );
        }

        Cache::forget(self::CACHE_KEY);
    }

    /**
     * Xóa cache settings
     */
    public static function clearCache(): void
    {
        Cache::forget(self::CACHE_KEY);
    }
}
