<?php

namespace Database\Factories;
use App\Models\Contrato;
use Illuminate\Database\Eloquent\Factories\Factory;

class ContratoFactory extends Factory
{
   

    protected $model = contrato::class;
    public function definition()
    {
        return [
            'año'=>$this->faker->numberBetween($min = 2017, $max = 2021),
            'cód'=> $this->faker->text(20), 
            'tít_contrato'=> $this->faker->paragraph,
            'tipo'=> $this->faker->text(100), 
            'clte'=> $this->faker->text(100), 
            'tipo_clte'=> $this->faker->text(30),
            'inicio'=> $this->faker->dateTimeBetween('-50 years', 'now'), 
            'termino'=> $this->faker->dateTimeBetween('-50 years', 'now'),
            'monto_sin_iva'=>$this->faker->randomNumber(6), 
            'estado'=> $this->faker->text(20),
            'p_anticipo'=>$this->faker->randomNumber(2),
            'val_anticipo_sin_iva'=>$this->faker->randomNumber(4),
            'val_cobrar_sin_iva'=>$this->faker->randomNumber(4), 
            'IVA'=>$this->faker->numberBetween($min = 1, $max = 99),
            'monto_final_con_iva'=>$this->faker->randomNumber(4),
            //'user_id'=>$this->faker->randomNumber(1),
        ];
    }
}