<?php

namespace App\Models;

use App\Models\Kategori;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class MasterItem extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function KategoriItems()
    {
        return $this->belongsToMany(KategoriItem::class, 'kategori_item_master_items', 'master_item_id', 'kategori_item_id');
    }
}
