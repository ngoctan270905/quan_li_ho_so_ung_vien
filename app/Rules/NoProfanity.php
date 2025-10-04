<?php

namespace App\Rules;

use Closure;
use Illuminate\Contracts\Validation\ValidationRule;

class NoProfanity implements ValidationRule
{
    /**
     * Danh sách từ cấm phổ biến (có thể mở rộng thêm).
     */
    protected array $blacklist = [
        // Từ gốc
        'địt', 'đụ', 'đm', 'đmm', 'dm', 'vcl', 'vãi', 'lồn', 'buồi', 'cặc',
        'dcm', 'dcmm', 'mẹ mày', 'cha mày', 'má mày', 'đéo', 'mịa', 'đỉ',
        'đĩ', 'ngu', 'óc chó', 'óc lợn', 'chó má', 'con đĩ', 'thằng ngu',
        'mày', 'tao', 'bố mày', 'mẹ kiếp', 'vãi lúa', 'vl', 'vkl',

        // Viết không dấu
        'dit', 'du', 'dm', 'dmm', 'dcm', 'dcmm', 'lon', 'buoi', 'cak', 'cac',
        'deo', 'mia', 'di', 'ngu', 'oc cho', 'oc lon', 'cho ma', 'con di',
        'thang ngu', 'bo may', 'me may', 'vl', 'vkl', 'vai', 'vai lon',

        // Lách luật (biến thể thường gặp)
        'đjt', 'dj', 'vailon', 'vlon', 'vaicalon', 'vaica', 'vai ca',
        'dkm', 'clm', 'ccm', 'cc', 'cl', 'lol', 'lmao', 'fck', 'fuck', 'shit',
        'bitch', 'bastard', 'motherfucker', 'asshole', 'wtf', 'fml'
    ];

    public function validate(string $attribute, mixed $value, Closure $fail): void
    {
        $normalized = strtolower($value);

        foreach ($this->blacklist as $word) {
            if (str_contains($normalized, $word)) {
                $fail("Trường :attribute chứa từ ngữ không phù hợp.");
                return;
            }
        }
    }
}
