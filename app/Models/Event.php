<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Event extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'description',
        'date',
        'acceptation',
        'location',
        'user_id',
        'media',
        'category_id',
    ];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function category(){
        return $this->belongsTo(Category::class);
    }

    public function tickets(){
        return $this->hasMany(Ticket::class);
    }
    protected static function booted () {
        static::deleting(function(Event $event) { // before delete() method call this
             $event->tickets()->delete();
             // do the rest of the cleanup...
        });
    }

}
