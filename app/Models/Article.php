<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Str;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'status',
        'category_id',
        'thumbnail',
        'content',
    ];

    public function scopePublished($query)
    {
        return $query->where('status', 'published');
    }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function scopeByCategory($query, $categoryId)
    {
        return $query->when($categoryId, function ($query) use ($categoryId) {
            $query->where('category_id', $categoryId);
        });
    }

    public static function boot()
    {
        parent::boot();

        static::creating(function ($article) {
            if (empty($article->slug)) {
                $article->slug = Str::slug($article->title);
            }
        });

        static::updating(function ($article) {
            if ($article->isDirty('title')) {
                $article->slug = Str::slug($article->title);
            }
        });
    }

    public static function getRelatedArticles($slug)
    {
        $article = self::where('slug', $slug)->first();

        return self::where('category_id', $article->category_id)
            ->where('slug', '!=', $slug)
            ->published()
            ->limit(5)
            ->get();
    }
}
