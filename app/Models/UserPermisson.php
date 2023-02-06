<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class UserPermisson extends Model
{

    use HasFactory,SoftDeletes;

    protected $table = 'user_permissons';
    protected $guarded = ['id'];

    protected $dates = ['deleted_at'];
    use HasFactory;

    public function users()
    {
        return $this->belongsTo(User::class, 'fk_user');
    }
}
