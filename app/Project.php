<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    protected $fillable = [
        'title', 'category', 'url', 'user_id', 'description', 'read', 'status'
    ];

    protected $casts = [
        'read' => 'boolean',
        'created_at' => 'datetime',
        'updated_at' => 'datetime'
    ];

    public function user()
    {
        return $this->belongsTo('App\User', 'user_id');
    }

    public function getStatusBadgeAttribute()
    {
        $statusClasses = [
            'active' => 'badge-success',
            'inactive' => 'badge-secondary',
            'pending' => 'badge-warning',
            'completed' => 'badge-primary'
        ];

        return $statusClasses[$this->status] ?? 'badge-secondary';
    }

    public function getCategoryIconAttribute()
    {
        $icons = [
            'forex' => 'fa-exchange-alt',
            'commodities' => 'fa-seedling', 
            'indices' => 'fa-chart-line',
            'crypto' => 'fa-bitcoin',
            'stocks' => 'fa-chart-bar'
        ];

        return $icons[$this->category] ?? 'fa-file';
    }
}
