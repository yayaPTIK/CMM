<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use App\Models\Submenu;

class Menu extends Model
{
    use HasFactory;

    /**
     * Get all of the submenus for the Menu
     *
     * @return \Illuminate\Database\Eloquent\Relations\HasMany
     */
    public function submenus()
    {
        return $this->hasMany(Submenu::class);
    }
}
