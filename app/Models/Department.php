<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $table    = 'department';
    public $timestamps  = false;

    public static function getTotal () {
        return static::all()->count();
    }

    public static function getAllDepartments () {
        return static::orderBy('id', 'asc')
                    ->get([
                        'created_at', 'updated_at', 'name', 'id', 'status'
                    ]);
    }

    public static function getDepartmentDetail ($departmentId) {
        $department = static::where('id', '=', $departmentId)
                                /*->where('status', '=', 1)*/
                                ->get(['created_at', 'updated_at', 'name', 'id'])
                                ->first();

        return $department;
    }

    public static function updateDepartmentDetail ($departmentId, $name) {
        $department = static::find($departmentId);

        $department->name       = $name;
        $department->updated_at = date('Y-m-d h:i:s');

        $department->update();

        return $department;
    }

    public static function deleteDepartmentDetail ($departmentId) {
        $department = static::find($departmentId);

        $department->status     = 0;
        $department->updated_at = date('Y-m-d h:i:s');

        $department->update();

        return $department;
    }

    public static function activeDepartmentDetail ($departmentId) {
        $department = static::find($departmentId);

        $department->status     = 1;
        $department->updated_at = date('Y-m-d h:i:s');

        $department->update();

        return $department;
    }

    public static function getTownsByDeparment ($departmentId) {
        $departments = static::join('town', 'town.fk_town_department', '=', $departmentId)
                                    //->where('active', '=', '1')
                                    ->get();

        return $departments;
    }
}
