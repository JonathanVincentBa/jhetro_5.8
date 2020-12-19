<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use App\Exports\AsistenciaPersonalExport;
use App\Exports\AsistenciaPersonalUnicoExport;

class ControlPersonalController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }
    
    public function index(Request $request)
    {
        if ($request) 
        {
            $usuarios=DB::table('users')
                ->where('estado','=','1')
    			->paginate(7);
            return view('empleados.index', ["usuarios" => $usuarios]);
        }
    }
    public function todosEmpleados(Request $request)
    {
        
        //Reporte Asistencia de Personal
        $fecha_inicio = $request->get('fecha_inicio');
        $fecha_final  = $request->get('fecha_final');

        
        return Excel::download(new AsistenciaPersonalExport($fecha_inicio,$fecha_final), 'Asistencia-Personal.xlsx');
    }

    public function porEmpleado(Request $request)
    {
        $fecha_inicio = $request->get('fecha_inicio_1');
        $fecha_final  = $request->get('fecha_final_1');
        $nombre = $request->get('name');
        
        //dd($fecha_inicio,$fecha_final,$nombre);
        return Excel::download(new AsistenciaPersonalUnicoExport($fecha_inicio,$fecha_final,$nombre), 'Asistencia-Personal-Unico.xlsx');
    }
}