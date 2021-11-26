<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;

class Prescription extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'doctor_name',
        'patient_name',
        'clinic',
        'doctor_id',
        'patient_id',
        'clinic_id',
        'expired_date'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [];

    public function scirptdetails() {
        return $this->hasMany(Scirptdetail::class);
    }

    public function delete() {
        DB::transaction(function()
        {
            $this->scirptdetails()->delete();
            parent::delete();
        });
    }
}
