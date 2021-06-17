<?php

namespace App\Models\Region;

use Illuminate\Database\Eloquent\Model;

class RegionModel extends Model
{
    protected $fillable = [
        'state_id',
        'slug',
        'name',

    ];


    public function MainPart()
    {
        if (app()->getLocale()=='hy'):

            return $this->hasOne(RegionMainPartModel::class, 'parent_id', 'state_id')->where('slug','am');

        else:
            return $this->hasOne(RegionMainPartModel::class, 'parent_id', 'state_id')->where('slug',app()->getLocale());

        endif;
  }
  public function MainPartAdmin()
    {

return $this->hasOne(RegionMainPartModel::class, 'parent_id', 'state_id')->where('slug','am');

  }
    public function Informate()
    {
        if (app()->getLocale()=='hy'):

            return $this->hasOne(RegionInformateModel::class, 'parent_id', 'state_id')->where('slug','am');

        else:
            return $this->hasOne(RegionInformateModel::class, 'parent_id', 'state_id')->where('slug',app()->getLocale());

        endif;
   }
}
