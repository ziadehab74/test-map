<?php

namespace App\Models\GD;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Acme\AcmeCrudGenerator\Traits\ModelHelper;

class Inspector extends Model
{
    use HasFactory, ModelHelper, SoftDeletes;

    protected $table = "inspector";

    protected $fillable = ["name", "nat_id"];

    protected $hidden = [];

    protected $casts = [];


    public function rules($view = null)
    {
        return array (
          'name' => 'nullable|string',
          'nat_id' => 'nullable|string',
        );
    }

}
