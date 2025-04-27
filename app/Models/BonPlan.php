<?php

namespace App\Models;

use App\Models\Scopes\Searchable;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class BonPlan extends Model
{
    use HasFactory;
    use Searchable;

    protected $fillable = [
        'nom_bp',
        'categorie_bp',
        'tel_bp',
        'desc_bp',
        'location',
        'user_id',
        'ouverture',
        'fermuture',
        'img',
        'rate_moy',
    ];

    protected $searchableFields = ['*'];

    protected $table = 'bon_plans';

    public function offres()
    {
        return $this->hasMany(Offre::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function ratings()
    {
        return $this->hasMany(Rating::class);
    }

    public function menus()
    {
        return $this->hasMany(Menu::class);
    }

    public function sousMenus()
    {
        return $this->hasMany(SousMenu::class);
    }

    public function favourises()
    {
        return $this->hasMany(Favouris::class);
    }

    
}

    
