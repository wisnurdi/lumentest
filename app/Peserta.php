<?php namespace App;

 use Illuminate\Database\Eloquent\Model;
 

 class Peserta extends Model
 {
 	protected $table = 'peserta'; //kalau tidak begini, table akan di-set ke pesertas (asumsi bentuk plural dari peserta)
     
    protected $fillable = ['nama', 'nip', 'sex', 'tgllahir', 'biodata'];
     
 }