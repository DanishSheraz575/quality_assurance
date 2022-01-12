<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Shift extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'shifts';
    protected $primaryKey = 'shift_id';
    const CREATED_AT = 'added_on';
    const UPDATED_AT = 'modified_on';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title' , 'check_in', 'check_out', 'added_by' ,'modified_by',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [

    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'added_on' => 'datetime',
        'modified_on' => 'datetime',
    ];

    public function manager()
    {
        return $this->belongsTo(User::class , 'added_by' , 'user_id');
    }

    public function shiftUsers()
    {
        return $this->hasMany(ShiftUser::class, 'shift_id', 'shift_id');
    }
}
