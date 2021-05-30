<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\{
    Model,SoftDeletes};
use Illuminate\Support\Str;
class Category extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'name', 'image',
        'description',
        'slug'
    ];
    protected $data = [
        'deleted_at',
    ];
    protected static function booted(): void
    {
        static::creating(function($category){
            $category->slug = Str::slug(
                $category->name);
        });
    }
    public function products()
    {
        return $this->hasMany(
            Product::class
        );
    }
    /*
    public function setNameAttribute($name)
    {
        $this->attributes['name'] = $name;
        $this->attributes['slug'] =
            Str::slug($this->attributes['name']);
    }*/
}
