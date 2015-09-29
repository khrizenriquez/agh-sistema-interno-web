<?php

namespace App\Http\Controllers;

use App\Models\User;

class PageController extends Controller {

    public static $dias = ["Domingo", 
                            "Lunes", 
                            "Martes", 
                            "Miercoles", 
                            "Jueves", 
                            "Viernes", 
                            "Sábado"];

    public static $meses = ["Enero", 
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

}
