<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SocialAccounts extends Model
{
    use HasFactory;
    protected $table='social_accounts';
    protected $guarded=[];
}
