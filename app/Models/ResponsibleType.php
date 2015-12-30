<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponsibleType extends Model {

    protected $table    = 'responsible_type';
    public $timestamps  = false;

    public static function createResponsibleType ($name, $status) {
        $responsible = new ResponsibleType();

        $date = GeneralValues::getActualDate();

        $responsible->name               = $name;
        $responsible->status             = $status;
        $responsible->created_at         = $date;
        $responsible->updated_at         = $date;

        $responsible->save();

        return $responsible;
    }

    public static function getTotal () {
        return static::all()->count();
    }

    public static function getAllResponsibles () {
        return static::orderBy('id', 'asc')
                                ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
    }

    public static function getPaginateResponsibles ($skip = NULL, $take = NULL, $orderBy = 'name ASC') {
        $sortSplit = explode(' ', $orderBy);
        return static::select('created_at', 'updated_at', 'name', 'id', 'status')
                                ->orderBy($sortSplit[0], $sortSplit[1])
                                ->skip($skip)
                                ->take($take)
                                ->get();
    }

    public static function deleteResponsibleType ($id) {
        $responsible = static::find($id);

        $responsible->status     = 0;
        $responsible->updated_at = GeneralValues::getActualDate();

        $responsible->update();

        return $responsible;
    }

    public static function updateResponsibleType ($id, $name, $status) {
        $responsible = static::find($id);

        $responsible->name               = $name;
        $responsible->status             = $status;
        $responsible->updated_at         = GeneralValues::getActualDate();

        $responsible->update();

        return $responsible;
    }

}
