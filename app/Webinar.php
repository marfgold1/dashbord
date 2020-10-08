<?php

namespace App;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

class Webinar extends Model
{
    protected $fillable = [
        'nama', 'deskripsi', 'fakultas', 'narasumber', 'pic', 'kuota', 'jadwal', 'batas_pendaftaran', 'topik', 'creator_id'
    ];

    protected $dates = [
        'batas_pendaftaran', 'jadwal'
    ];

    public function users(){
        return $this->belongsToMany(User::class);
    }

    public function creator(){
        return $this->belongsTo(User::class, 'creator_id');
    }

    public function count_pendaftar(){
        return $this->users()->count();
    }

    public function isQuotaFull(){
        return $this->count_pendaftar() >= $this->kuota;
    }

    public function isRegistrationClosed(){
        return $this->batas_pendaftaran->lt(Carbon::now());
    }
}
