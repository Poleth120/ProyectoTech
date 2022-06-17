<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Support\Str;

class Document extends Model
{
    protected $fillable = [
        'path',
        
    ];    
    use HasFactory;

    public function documentable()
    {
        return $this->morphTo();
    }    

    public function getUrl(): string
    {
        return Str::startsWith($this->path, 'https://')
            ? $this->path
            : Storage::disk('dropbox')-> url($this->path);
    }
}
