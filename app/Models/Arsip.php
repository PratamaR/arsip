<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Arsip extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['no_surat', 'tgl_surat', 'pengirim', 'penerima', 'sifat', 'perihal', 'isi', 'file'];
    protected $guarded = ['id'];
}
