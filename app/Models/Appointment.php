<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Appointment extends Model
{
    protected $fillable = ['client_name', 'client_phone', 'start_time', 'end_time', 'notes', 'status'];

public function services() {
    return $this->belongsToMany(Service::class);
}

// Método para calcular el total
public function getTotalAttribute() {
    return $this->services->sum('price');
}

// Método para calcular la duración total
public function getTotalDurationAttribute() {
    return $this->services->sum('duration_minutes');
}
}
