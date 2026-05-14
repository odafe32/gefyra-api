<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;

class EmailCampaign extends Model
{
    protected $fillable = [
        'name', 'subject', 'content', 'status', 'scheduled_at', 'started_at', 'completed_at',
        'recipients', 'recipient_source', 'attachment_path', 'total_recipients', 'sent_count',
        'failed_count', 'created_by',
    ];

    protected $casts = [
        'recipients' => 'array',
        'scheduled_at' => 'datetime',
        'started_at' => 'datetime',
        'completed_at' => 'datetime',
    ];

    public function creator(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by');
    }

    public function logs(): HasMany
    {
        return $this->hasMany(EmailCampaignLog::class);
    }
}
