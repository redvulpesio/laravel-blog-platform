<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = [
        'title',
        'slug',
        'parent_id',
    ];

    public function parentCategory()
    {
        return $this->belongsTo(Category::class, 'parent_id')->withDefault(['title' => 'دسته بندی اصلی']);
    }

    public function childrenCategory()
    {
        return $this->hasMany(Category::class, 'parent_id');
    }

    public static function getCategories()
    {
        $array = [];
        $categories = self::query()->with('childrenCategory')->where('parent_id', 0)->get();
        foreach ($categories as $category) {
            $array[$category->id] = $category->title;
            foreach ($category->childrenCategory as $child) {
                $array[$child->id] = '- ' . $child->title;
                foreach ($child->childrenCategory as $child2) {
                    $array[$child2->id] = '-- ' . $child2->title;
                    foreach ($child2->childrenCategory as $child3) {
                        $array[$child3->id] = '--- ' . $child3->title;
                    }
                }
            }
        }
        return $array;
    }

    protected static function boot()
    {
        parent::boot();
        self::deleting(function ($category) {
            foreach ($category->childrenCategory()->get() as $child) {
                $child->delete();
            }
        });
    }

    public function articles()
    {
        return $this->hasMany(Articles::class);
    }
}
