<?php

namespace App\Http\Controllers;
use App\Models\Contrato;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Auth;
use Illuminate\Validation\Rule;
class ContratoController extends Controller
{

    public function __construct()
    {
        $this->authorizeResource(Contrato::class, 'contrato');
        $this->middleware('can:manage-contratos');
    }


    public function index()
    {
        $contratos=Contrato::where('state',  '1' )->first();

        if (request('search')) {
            $contratos = $contratos->where('tít_contrato', 'like', '%' . request('search') . '%');
        }

        $contratos = $contratos->orderBy('tít_contrato', 'asc')
            ->paginate();

        return view('contrato.index', [
            'contratos' => $contratos,
        ]);
    }




    public function create()
    {
        return view('contrato.create');
    }



    public function store(Request $request)
    {   

        $request->validate([
            'document' => ['required', 'mimes:pdf'],
            'año'=> ['required', 'numeric', 'digits:4'],
            'cód'=> ['required', 'string', 'min:10', 'max:20','unique:contratos'],
            'tít_contrato'=> ['required', 'string', 'min:35', 'max:1000'],
            'tipo'=>  ['required', 'string', 'min:5', 'max:100'],
            //'cpc'=>  ['required', 'string', 'min:5', 'max:6','unique:contratos'],
            'clte'=>  ['required', 'string', 'min:3', 'max:400'],
            'tipo_clte'=> ['required', 'string', 'min:7', 'max:30'],
            'inicio'=> [
                'required', 'string', 'date_format:d/m/Y',
                'after_or_equal:' . date('2012-06-26'),
     
            ], 
            'termino'=>  [
                'required', 'string', 'date_format:d/m/Y',
                'after_or_equal:' . date('2012-06-26'),
                'before_or_equal:' . date('2030-06-26'),
            ],
            'monto_sin_iva'=> 'required|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
            'estado'=> ['required', 'string', 'min:7', 'max:20'],
            'p_anticipo'=> 'numeric| required_unless:p_anticipo,=,0||regex:/^[\d]{1,5}(\.[\d]{1,2})?$/',
            'val_anticipo_sin_iva'=> 'numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/|lt:monto_sin_iva', 
            'val_cobrar_sin_iva'=>'numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/|lt:monto_sin_iva',
            'IVA'=> ['required','numeric', 'max:20'],
            'monto_final_con_iva'=> 'gt:monto_sin_iva|numeric|regex:/^[\d]{3,7}(\.[\d]{1,2})?$/',
        ]);

        $user=Auth::user();
        $contrato=$user->contratos()->create([
            'año'=>$request['año'],
            'cód'=>$request['cód'],
            'tít_contrato'=> $request['tít_contrato'],
            'tipo' =>$request['tipo'],
            //'cpc'=>$request['cpc'],
            'clte'=> $request['clte'],
            'tipo_clte'=>$request['tipo_clte'],
            'inicio' =>$this->changeDateFormat($request['inicio']),
            'termino'=> $this->changeDateFormat($request['termino']),
            'monto_sin_iva'=> $request['monto_sin_iva'],
            'estado' =>$request['estado'],
            'p_anticipo'=>$request['p_anticipo'],
            'val_anticipo_sin_iva'=> $request['val_anticipo_sin_iva'],
            'val_cobrar_sin_iva'=> $request['val_cobrar_sin_iva'],
            'IVA' => $request['IVA'],
            'monto_final_con_iva'=> $request['monto_final_con_iva'],
        ]);
        
        $user->contratos()->save($contrato);

        if ($request->has('document'))
        {
            $contrato->storeDocument($request['document'], 'contratos', 'contratos');
        }
        
        return back()->with('status', 'Contrato created successfully');
    }

    
    public function show(Contrato $contrato)
    {
        return view('contrato.show', ['contrato' => $contrato]);
    }


    public function edit(Contrato $contrato)
    {
        return view('contrato.update', ['contrato' => $contrato]);
    }


    public function update(Request $request, Contrato $contrato)
    {

        $request->validate([
            'document' => [ 'mimes:pdf'],
            'año'=> ['required', 'numeric', 'digits:4'],
            'cód'=> ['required', 'string', 'min:10', 'max:20'],
            'tít_contrato'=> ['required', 'string', 'min:100', 'max:1000'],
            'tipo'=>  ['required', 'string', 'min:5', 'max:100'],
            //'cpc'=>  ['required', 'string', 'min:5', 'max:6'],
            'clte'=>  ['required', 'string', 'min:3', 'max:400'],
            'tipo_clte'=> ['required', 'string', 'min:7', 'max:30'],
            'inicio'=> [
                'required', 'string', 'date_format:d/m/Y',
                'after_or_equal:' . date('2012-06-26'),], 
            'termino'=>  [
                'required', 'string', 'date_format:d/m/Y',
                'after_or_equal:' . date('2012-06-26'),
                'before_or_equal:' . date('2030-06-26'),],
            'monto_sin_iva'=> 'required|numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/',
            'estado'=> ['required', 'string', 'min:7', 'max:20'],
            'p_anticipo'=> 'numeric| required_unless:p_anticipo,=,0||regex:/^[\d]{1,5}(\.[\d]{1,2})?$/',
            'val_anticipo_sin_iva'=> 'numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/|lt:monto_sin_iva',
            'val_cobrar_sin_iva'=>'numeric|regex:/^[\d]{0,7}(\.[\d]{1,2})?$/|lt:monto_sin_iva',
            'IVA'=> ['required','numeric', 'max:20'],
            'monto_final_con_iva'=> 'gt:monto_sin_iva|numeric|regex:/^[\d]{3,7}(\.[\d]{1,2})?$/',
        ]);
        
        $contrato->update([
            'año'=>$request['año'],
            'cód'=>$request['cód'],
            'tít_contrato'=> $request['tít_contrato'],
            'tipo' =>$request['tipo'],
            //'cpc'=>$request['cpc'],
            'clte'=> $request['clte'],
            'tipo_clte'=>$request['tipo_clte'],
            'inicio' =>$this->changeDateFormat($request['inicio']),
            'termino'=> $this->changeDateFormat($request['termino']),
            'monto_sin_iva'=> $request['monto_sin_iva'],
            'estado' =>$request['estado'],
            'p_anticipo'=>$request['p_anticipo'],
            'val_anticipo_sin_iva'=> $request['val_anticipo_sin_iva'],
            'val_cobrar_sin_iva'=> $request['val_cobrar_sin_iva'],
            'IVA' => $request['IVA'],
            'monto_final_con_iva'=> $request['monto_final_con_iva'],
        ]);

        if ($request->has('document'))
        {
            $contrato->updateDocument($request['document'], 'contratos', 'contratos');
        }

        return back()->with('status', 'Contrato actualizado exitosamente');
    }


    public function destroy(Contrato $contrato)
    {
        $state = $contrato->state;
        $message = $state ? 'inactivado' : 'activado';
        $contrato->state = !$state;
        $contrato->save();
        return back()->with('status', "Contrato $message exitosamente");
    }
    
    public function changeDateFormat(string $date, string $date_format = 'd/m/Y', string $expected_format = 'Y-m-d')
    {
        return Carbon::createFromFormat($date_format, $date)->format($expected_format);
    }



}
