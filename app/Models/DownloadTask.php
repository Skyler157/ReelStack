<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DownloadTask extends Model
{
    use HasFactory;

    protected $fillable = [
        'source_url',
        'status',
        'provider',
        'provider_run_id',
        'media_url',
        'local_file_path',
        'mime_type',
        'file_size',
        'payload',
        'error_message',
        'requested_ip',
    ];

    protected $casts = [
        'payload' => 'array',
    ];
}
