<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Mahasiswa extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'name',
        'gender',
        'nim',
        'jurusan',
        'tempat_lahir',
        'tgl_lahir',
        'telp',
        'alasan',
        'isready',
    ];

    public $incrementing = false;
    protected $keyType = 'string';
    
    protected static function boot()
    {
        parent::boot();
        static::creating(function($model){
            if($model->getKey() == null){
                // $model->setAttribute($model->getKeyName(), Str::uuid()->toString());
                $permitted_chars = '0123456789abcdefghijklmnopqrstuvwxyzABCDEFGHIJKLMNOPQRSTUVWXYZ';
                $model->setAttribute($model->getKeyName(), substr(str_shuffle($permitted_chars), 0, 12));
            }
        });
    }
    
    public function hasilTugasMhs()
    {
        return $this->hasMany(HasilTugas::class, 'id', 'mahasiswa_id');
    }
}
