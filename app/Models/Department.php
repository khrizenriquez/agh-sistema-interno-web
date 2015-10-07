<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model {

    protected $table = 'department';

    public static function getTotalDepartments () {
        return Department::all()->count();
    }

    public static function getAllDepartments () {
        return Department::all();
    }

    public static function getTowns ($departmentId) {
        $departments = Department::join('town', 'town.fk_town_department', '=', $departmentId)
                                    //->where('active', '=', '1')
                                    ->get();

        return $departments;
    }
}
