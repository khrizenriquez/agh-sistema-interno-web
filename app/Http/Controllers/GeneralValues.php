<?php namespace App\Http\Controllers;

class GeneralValues extends Controller {
    public static $days     = ["Domingo", 
                                "Lunes", 
                                "Martes", 
                                "Miercoles", 
                                "Jueves", 
                                "Viernes", 
                                "Sábado"];
    public static $months   = ["Enero", 
                                "Febrero", 
                                "Marzo", 
                                "Abril", 
                                "Mayo", 
                                "Junio", 
                                "Julio", 
                                "Agosto", 
                                "Septiembre", 
                                "Octubre", 
                                "Noviembre", 
                                "Diciembre"];

    public static function getActualDate () {
        return date('Y-m-d H:i:s');
    }

}
