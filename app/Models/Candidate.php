<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Candidate extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     * * Khai báo các cột được phép gán giá trị khi sử dụng phương thức create().
     * Phù hợp với các trường đã khai báo trong migration.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
        'email',
        'birthday',
        'bio',
        'avatar_path', // Đường dẫn file ảnh
        'cv_path',     // Đường dẫn file CV
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * Đảm bảo trường ngày sinh được coi là đối tượng ngày tháng.
     *
     * @var array
     */
    protected $casts = [
        'birthday' => 'date',
    ];
}