<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponsibleType extends Model {

    protected $table        = 'responsible_type';
    protected $timestamp    = false;

    public static function createResponsibleType ($name, $status) {
        $town = new ResponsibleType();

        $date = date('Y-m-d H:i:s');

        $town->name               = $name;
        $town->status             = $status;
        $town->created_at         = $date;
        $town->updated_at         = $date;

        $town->save();

        return $town;
    }

    public static function getTotal () {
        return ResponsibleType::all()->count();
    }

    public static function getAllResponsibles () {
        $model = ResponsibleType::where('status', '=', 1)
                            ->orderBy('id', 'asc')
                            ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
        return $model;
    }

    public static function deleteResponsibleType ($id) {
        $department = static::find($id);

        $department->status     = 0;
        $department->updated_at = date('Y-m-d H:i:s');

        $department->update();

        return $department;
    }

    public static function updateResponsibleType ($id, $name, $status) {
        $department = static::find($id);

        $department->name               = $name;
        $department->status             = $status;
        $department->updated_at         = date('Y-m-d H:i:s');

        $department->update();

        return $department;
    }

}
