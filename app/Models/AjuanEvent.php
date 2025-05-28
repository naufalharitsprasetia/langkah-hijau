<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class AjuanEvent extends Model
{
    protected $table = 'ajuan_events';
    protected $guarded = ['id'];
    protected $primaryKey = 'id';
    protected $keyType = 'string'; // Atur tipe data primary key sebagai string
    public $incrementing = false; // Nonaktifkan incrementing ID

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}