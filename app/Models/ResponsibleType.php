<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponsibleType extends Model {

    protected $table    = 'responsible_type';
    public $timestamps  = false;

    public static function createResponsibleType ($name, $status) {
        $responsible = new ResponsibleType();

        $date = date('Y-m-d H:i:s');

        $responsible->name               = $name;
        $responsible->status             = $status;
        $responsible->created_at         = $date;
        $responsible->updated_at         = $date;

        $responsible->save();

        return $responsible;
    }

    public static function getTotal () {
        return ResponsibleType::all()->count();
    }

    public static function getAllResponsibles () {
        return ResponsibleType::orderBy('id', 'asc')
                                ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
    }

    public static function deleteResponsibleType ($id) {
        $responsible = static::find($id);

        $responsible->status     = 0;
        $responsible->updated_at = date('Y-m-d H:i:s');

        $responsible->update();

        return $responsible;
    }

    public static function updateResponsibleType ($id, $name, $status) {
        $responsible = static::find($id);

        $responsible->name               = $name;
        $responsible->status             = $status;
        $responsible->updated_at         = date('Y-m-d H:i:s');

        $responsible->update();

        return $responsible;
    }

}
