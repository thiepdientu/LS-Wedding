<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class WeddingWish extends Model
{
    protected $fillable = [
        'wedding_card_id',
        'sender_name',
        'message',
        'attendance_status',
        'guest_count',
        'is_approved',
        'ip_address',
    ];

    protected $casts = [
        'is_approved' => 'boolean',
        'guest_count' => 'integer',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    /**
     * Mối quan hệ: Lời chúc thuộc về một thiệp cưới
     */
    public function weddingCard(): BelongsTo
    {
        return $this->belongsTo(WeddingCard::class, 'wedding_card_id');
    }

    /**
     * Scope lọc các lời chúc đang hiển thị công khai (đã duyệt)
     */
    public function scopeApproved(Builder $query): Builder
    {
        return $query->where('is_approved', true);
    }

    /**
     * Scope lọc theo thiệp cưới
     */
    public function scopeForCard(Builder $query, int|string $cardId): Builder
    {
        return $query->where('wedding_card_id', $cardId);
    }

    /**
     * Định dạng ngày tạo thân thiện: 14:30 13/10/2026
     */
    public function getFormattedCreatedAtAttribute(): string
    {
        return $this->created_at ? $this->created_at->format('H:i d/m/Y') : '';
    }

    /**
     * Nhãn hiển thị trạng thái tham dự
     */
    public function getAttendanceLabelAttribute(): string
    {
        return match ($this->attendance_status) {
            'attending' => 'Sẽ tham dự (' . ($this->guest_count ?: 1) . ' người)',
            'not_attending' => 'Không thể tham dự',
            default => 'Chưa xác nhận RSVP',
        };
    }

    /**
     * Lớp màu badge Tailwind cho trạng thái tham dự
     */
    public function getAttendanceBadgeAttribute(): array
    {
        return match ($this->attendance_status) {
            'attending' => [
                'label' => 'Tham dự (' . ($this->guest_count ?: 1) . ')',
                'class' => 'bg-emerald-50 text-emerald-700 ring-1 ring-emerald-600/20',
                'dot' => 'bg-emerald-500',
            ],
            'not_attending' => [
                'label' => 'Không tham dự',
                'class' => 'bg-rose-50 text-rose-700 ring-1 ring-rose-600/20',
                'dot' => 'bg-rose-500',
            ],
            default => [
                'label' => 'Chưa rõ',
                'class' => 'bg-slate-50 text-slate-600 ring-1 ring-slate-500/20',
                'dot' => 'bg-slate-400',
            ],
        };
    }
}
