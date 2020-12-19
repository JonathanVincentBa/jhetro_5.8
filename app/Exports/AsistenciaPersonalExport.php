<?php

namespace App\Exports;

use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\Exportable;
use Illuminate\Contracts\View\View;
use Illuminate\Support\Facades\DB;
use DateTime;

class AsistenciaPersonalExport implements FromView
{
    use Exportable;

    private $fecha_inicio;
    private $fecha_final; 

    public function __construct(string $fecha_final, string $fecha_inicio) 
    {
        $this->fecha_inicio = $fecha_inicio; // asignas el valor inyectado a la propiedad
        $this->fecha_final = $fecha_final; // asignas el valor inyectado a la propiedad 
        
    }

    public function view(): View
    {
        $this->fecha_inicio=new DateTime($this->fecha_inicio);
        $this->fecha_inicio=$this->fecha_inicio->format('Y-m-d H:i:s');
        
        $this->fecha_final=new DateTime($this->fecha_final);
        $this->fecha_final=$this->fecha_final->format('Y-m-d H:i:s');

        $usuarios=DB::select('SELECT users.name, acceso.ip_client, acceso.date as fecha, acceso.condicion as condicion
                            FROM acceso
                            INNER JOIN users
                            ON users.id=acceso.id_user
                            WHERE DATE(acceso.date) BETWEEN "'.$this->fecha_final.'" AND "'.$this->fecha_inicio.'"
                            ORDER BY users.name, acceso.date asc');  
        //dd($usuarios);
        return view('seguridad.empleado.reporteExcel',compact('usuarios'));
    }
}
