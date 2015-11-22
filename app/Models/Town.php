<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Town extends Model {

    protected $table    = 'town';
    public $timestamps  = false;

    public static function createTown ($name, $status, $userId, $departmentId) {
        $town = new Town();

        $date = date('Y-m-d H:i:s');

        $town->name               = $name;
        $town->status             = $status;
        $town->created_at         = $date;
        $town->updated_at         = $date;
        $town->fk_user_who_create = $userId;
        $town->fk_town_department = $departmentId;

        $town->save();

        return $town;
    }

    public static function getTotal () {
        return Town::all()->count();
    }

    public static function getAllTowns ($sort) {
        $sortSplit = explode(' ', $sort);
        $model = Town::join('department', 'town.fk_town_department', '=', 'department.id')
                        ->orderBy($sortSplit[0], $sortSplit[1])
                        ->get(['town.created_at', 
                                'town.updated_at', 
                                'town.name as townName', 
                                'town.status', 
                                'town.id', 
                                'department.id as departmentId', 
                                'department.name as departmentName']);
        return $model;
    }

    public static function deleteTownDetail ($id) {
        $department = static::find($id);

        $department->status     = 0;
        $department->updated_at = date('Y-m-d H:i:s');

        $department->update();

        return $department;
    }

    public static function updateTownDetail ($id, $name, $departmentId, $status) {
        $department = static::find($id);

        $department->name               = $name;
        $department->status             = $status;
        $department->fk_town_department = $departmentId;
        $department->updated_at         = date('Y-m-d H:i:s');

        $department->update();

        return $department;
    }

}
