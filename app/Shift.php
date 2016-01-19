<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Auth;
class Shift extends Model
{
    // Prevents Mass Assignment Expoloitation
    protected $fillable = ['break','start_time','end_time'];

    // Never show these in json output
    protected $hidden   = ['created_at','updated_at'];

    /**
     * Scope a query to only include an employees shifts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByEmployee($query) {
        return $query->where('employee_id', (int)Auth::user()->id);
    }

    /**
     * Scope a query to only include a managers created shifts.
     *
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeByManager($query) {
        return $query->where('manager_id', (int)Auth::user()->id);
    }

    public function user() {
        return $this->belongsTo('App\User');
    }
}
