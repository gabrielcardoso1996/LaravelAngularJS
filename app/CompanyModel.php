<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class CompanyModel extends Model
{
    protected $fillable = ['title', 'phone', 'adress', 'cep', 'city', 'state', 'description', 'category_id'];
    protected $guarded = ['id'];
    protected $table = 'company';
}
