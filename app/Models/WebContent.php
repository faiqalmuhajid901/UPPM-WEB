<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class WebContent extends Model
{
    use HasFactory;

    protected $fillable = ['section_key', 'title', 'description', 'image', 'additional_data'];
    
    // Helper untuk mengambil data JSON
    public function getData($key, $default = null) {
        $data = json_decode($this->additional_data, true);
        return $data[$key] ?? $default;
    }
}