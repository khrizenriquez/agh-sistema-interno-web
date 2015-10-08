<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model {

    protected $table        = 'town';
    protected $timestamp    = false;

    public static function getTotalTowns () {
        return Town::all()->count();
    }

    public static function getAllTowns () {
        $model = Town::join('department', 'town.fk_town_department', '=', 'department.id')
                        ->orderBy('town.id', 'asc')
                        ->get(['town.created_at', 
                                'town.updated_at', 
                                'town.name', 
                                'town.id', 
                                'department.name as departmentName']);
        return $model;
    }

}
