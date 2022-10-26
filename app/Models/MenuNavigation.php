<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Spatie\Permission\Models\Permission;

class MenuNavigation extends Model
{
    use HasFactory;

    protected $guarded = [];

    public function parent() {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function childrens() {
        return $this->hasMany(self::class, 'parent_id');
    }

    public function permission() {
        return $this->belongsTo(Permission::class, 'permission_name', 'name');
    }
}
