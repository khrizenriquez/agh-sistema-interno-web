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
        return static::select('created_at', 'updated_at', 'name', 'id', 'status')
                    ->orderBy('name', 'ASC')
                    ->get();
    }

    public static function getPaginateDepartments ($skip = NULL, $take = NULL, $orderBy = 'name ASC') {
        $order = explode(' ', $orderBy);

        return static::select('created_at', 'updated_at', 'name', 'id', 'status')
                    ->orderBy($order[0], $order[1])
                    ->skip($skip)
                    ->take($take)
                    ->get();
    }

    public static function getAllDepartmentsCount () {
        return static::all()->count();
    }

    public static function createDepartment ($name, $status, $userId) {
        $department = new Department();

        $date = GeneralValues::getActualDate();

        $department->name               = $name;
        $department->status             = $status;
        $department->created_at         = $date;
        $department->updated_at         = $date;
        $department->fk_user_who_create = $userId;

        $department->save();

        return $department;
    }

    public static function getDepartmentDetail ($departmentId) {
        $department = static::where('id', '=', $departmentId)
                                /*->where('status', '=', 1)*/
                                ->get(['created_at', 'updated_at', 'name', 'id'])
                                ->first();

        return $department;
    }

    public static function updateDepartmentDetail ($departmentId, $name, $status) {
        $department = static::find($departmentId);

        $department->name       = $name;
        $department->status     = $status;
        $department->updated_at = GeneralValues::getActualDate();

        $department->update();

        return $department;
    }

    public static function deleteDepartmentDetail ($departmentId) {
        $department = static::find($departmentId);

        $department->status     = 0;
        $department->updated_at = GeneralValues::getActualDate();

        $department->update();

        return $department;
    }

    public static function activeDepartmentDetail ($departmentId) {
        $department = static::find($departmentId);

        $department->status     = 1;
        $department->updated_at = GeneralValues::getActualDate();

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
