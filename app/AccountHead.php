<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class AccountHead extends Model
{
    protected $fillable = [

      'accountname',
        'slug'
    ];
    public function getRouteKeyName()
    {
        return 'slug';
    }
    public function setTitleAttribute($value)
    {
        $this->attributes['title'] = $value;

        if ( ! $this->exists)
        {
            $this->setUniqueSlug($value, '');
        }
    }

    /**
     * Recursive routine to set a unique slug.
     *
     * @param string $title
     * @param mixed $extra
     */
    protected function setUniqueSlug($title, $extra)
    {
        $slug = str_slug($title . '-' . $extra);

        $extra = !empty($extra) ?: 1;

        if (static::whereSlug($slug)->exists())
        {
            $this->setUniqueSlug($title, $extra + 1);

            return;
        }

        $this->attributes['slug'] = $slug;
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopePublished($query, $type = true)
    {
        return $query->where('is_published', $type);
    }

    /**
     * @param $query
     * @param bool $type
     * @return mixed
     */
    public function scopePrimary($query, $type = true)
    {
        return $query->where('is_primary', $type);
    }

    /**
     * @return \Illuminate\Database\Eloquent\Relations\MorphOne
     */
//    public function image()
//    {
//        return $this->morphOne(Image::class, 'imageable');
//    }

    /**
     * @param array $options
     * @return bool|null|void
     * @throws \Exception
     */
    public function delete(array $options = array())
    {
        if ($this->image)
        {
            $this->image->delete();
        }

        return parent::delete($options);
    }
}
