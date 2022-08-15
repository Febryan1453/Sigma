<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class HasilTugas extends Model
{
    use HasFactory;

    protected $fillable = [
        'tugas_id',
        'mahasiswa_id',
        'link_tugas',
        'kendala',
        'status',
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
    
    public function mhs()
    {
        return $this->belongsTo(Mahasiswa::class, 'mahasiswa_id', 'id');
    }
    
    public function tugas()
    {
        return $this->belongsTo(Tugas::class, 'tugas_id', 'id');
    }
}
