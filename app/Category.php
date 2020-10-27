<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $table = 'categories';
    protected $fillable = [
        'name','slug','image','icon_class','description','parent_id'
    ];

    /**
    * @return \Illuminate\Database\Eloquent\Relations\BelongsTo
    */
    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function children() {
        return $this->hasMany(self::class, 'parent_id','id');
    }

    public function products()
    {
        return $this->belongsToMany('App\Product', 'category_product', 'category_id', 'product_id');
    }


    public function child(){
        return $this->hasMany(Category::class,'parent_id','id');
    }


}
