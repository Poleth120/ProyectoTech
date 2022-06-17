<?php

namespace App\Models;

use App\Traits\HasDocument;
use App\Models\User;
use Carbon\Carbon;
//use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Factories\HasFactory;

use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;
use Illuminate\Support\Str;

class Contrato extends Model
{
    use HasFactory,HasDocument;
    protected $fillable = ['año','cód', 'tít_contrato','tipo',
    'cpc','clte', 'tipo_clte','inicio', 
    'termino','monto_sin_iva', 'estado',
    'p_anticipo', 'val_anticipo_sin_iva',
    'val_cobrar_sin_iva', 'IVA','monto_final_con_iva'];

    // Relación de uno a muchos
    // Un reporte le pertenece a un usuario
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Relación polimórfica uno a uno
    // Un contrato pueden tener una documento
    public function document()
    {
        return $this->morphOne(Document::class,'documentable');
    }        

//--------------mejorar el formato de la fecha de contrato--------------------
    public function getInicioAttribute($value)
    {
        // https://laravel.com/docs/8.x/eloquent-mutators#accessors-and-mutators
        return isset($value) ? Carbon::parse($value)->format('d/m/Y') : null;
    }    
    public function getTerminoAttribute($value)
    {
        // https://laravel.com/docs/8.x/eloquent-mutators#accessors-and-mutators
        return isset($value) ? Carbon::parse($value)->format('d/m/Y') : null;
    }   

//--------------------------CALCULOS VALORES DE ENTRADA-----------------------    
    public function valorAnticipo()
    {
       return ($this->monto_sin_iva - ($this->monto_sin_iva*$this->p_anticipo / 100));
    }

    public function valorCobrar(){
       return ($this->monto_sin_iva - ($this->monto_sin_iva - ($this->monto_sin_iva*$this->p_anticipo / 100)));
    }
    public function valorFinal(){
        return ($this->monto_sin_iva + ($this->monto_sin_iva*$this->IVA / 100));
     }
     
}
