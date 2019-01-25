<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\Models\Traits\Attribute\Test1Attribute;
use Sofa\Eloquence\Eloquence;
use Sofa\Eloquence\Metable;
use Spatie\Sluggable\HasSlug;
use Spatie\Sluggable\SlugOptions;
use Illuminate\Database\Eloquent\SoftDeletes;
use Iatstuti\Database\Support\CascadeSoftDeletes;
use Kyslik\ColumnSortable\Sortable;
use Storage;

class Test1 extends Model
{
    use Sortable,
        Test1Attribute,
        Eloquence,
        Metable,
        SoftDeletes,
        CascadeSoftDeletes,
        HasSlug;

    /**
     * Get the options for generating the slug.
     */

    public function getSlugOptions(): SlugOptions
    {
        return SlugOptions::create()
            ->generateSlugsFrom('name ')
            ->saveSlugsTo('slug');
    }

    /**
     * The sortable attributes.
     *
     * @var array
     */

    protected $sortable = ["id", "name", "l_name", "email"];

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */

    protected $fillable = ["name", "l_name", "email", "sms"];

    public $timestamps = false;

    /**
     * The attributes that should be mutated to dates.
     *
     * @var array
     */
    protected $dates = ['deleted_at'];
    protected $cascadeDeletes = [];

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'test1s';

    /**
     * Get the key name for route model binding.
     *
     * @return string
     */
    public function getRouteKeyName()
    {
        return 'id';
    }

    // ***********************************************************
    // ***********************************************************
    // ************************ RELATIONS ************************
    // ***********************************************************
    // ***********************************************************

    // ***********************************************************
    // ***********************************************************
    // ************************CASCADE  RELATIONS ****************
    // ***********************************************************
    // ***********************************************************
}
