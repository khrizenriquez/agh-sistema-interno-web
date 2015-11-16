<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $table        = 'department';
    protected $timestamp    = false;

    public static function getTotal () {
        return Department::all()->count();
    }

    public static function getAllDepartments () {
        $model = Department::/*where('status', '=', 1)
                            ->*/orderBy('id', 'asc')
                            ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
        return $model;
    }

    public static function getDepartmentDetail ($departmentId) {
        $department = Department::where('id', '=', $departmentId)
                                /*->where('status', '=', 1)*/
                                ->get(['created_at', 'updated_at', 'name', 'id'])
                                ->first();

        return $department;
    }

    public static function updateDepartmentDetail ($departmentId, $name) {
        $department = Department::find($departmentId);

        $department->name       = $name;
        $department->updated_at = date('Y-m-d h:i:s');

        $department->update();

        return $department;
    }

    public static function deleteDepartmentDetail ($departmentId) {
        $department = Department::find($departmentId);

        $department->status     = 0;
        $department->updated_at = date('Y-m-d h:i:s');

        $department->update();

        return $department;
    }

    public static function activeDepartmentDetail ($departmentId) {
        $department = Department::find($departmentId);

        $department->status     = 1;
        $department->updated_at = date('Y-m-d h:i:s');

        $department->update();

        return $department;
    }

    public static function getTownsByDeparment ($departmentId) {
        $departments = Department::join('town', 'town.fk_town_department', '=', $departmentId)
                                    //->where('active', '=', '1')
                                    ->get();

        return $departments;
    }
}
