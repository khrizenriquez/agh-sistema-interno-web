<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $table        = 'department';
    protected $timestamp    = false;

    public static function getTotalDepartments () {
        return Department::all()->count();
    }

    public static function getAllDepartments () {
        $model = Department::orderBy('id', 'asc')
                            ->get(['created_at', 'updated_at', 'name', 'id']);
        return $model;
    }

    public static function getTownsByDeparment ($departmentId) {
        $departments = Department::join('town', 'town.fk_town_department', '=', $departmentId)
                                    //->where('active', '=', '1')
                                    ->get();

        return $departments;
    }
}
