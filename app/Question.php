<?php

namespace App;

use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Model;
use Psy\CodeCleaner\ReturnTypePass;
use League\CommonMark\CommonMarkConverter;

class Question extends Model
{
    protected $fillable = ['title', 'body'];
    
    public function user() {
        return $this->belongsTo(User::class);
    }

    public function setTitleAttribute($value) {
        $this->attributes['title'] = $value;
        $this->attributes['slug'] =  Str::slug($value);
    }
    
    public function getUrlAttribute() 
    {
        return route('questions.show', $this->slug);
    }

    public function getCreatedDateAttribute()
    {
        return $this->created_at->diffForHumans();
    }

    public function getStatusAttribute()
    {
        if ($this->answers_count > 0) {
            if ($this->best_answer_id) {
                return 'answer-accepted';
            }
            return 'answered';
        }
        return 'unanswered';
    }

    public function answers() {
        return $this->hasMany(Answer::class);
    }

    protected function bodyHtml()
    {
        $markdown = new CommonMarkConverter(['allow_unsafe_links' => false]);
        return $markdown->convertToHtml($this->body);
    }
}
