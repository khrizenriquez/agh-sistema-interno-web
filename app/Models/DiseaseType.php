<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model {

    protected $table    = 'disease_type';
    public $timestamps  = false;

    public static function getTotal () {
        return static::all()->count();
    }

    public static function createDiseaseType ($name, $status, $userId) {
        $disease = new DiseaseType();

        $date = date('Y-m-d H:i:s');

        $disease->name                  = $name;
        $disease->status                = $status;
        $disease->created_at            = $date;
        $disease->updated_at            = $date;
        $disease->fk_user_who_create    = $userId;

        $disease->save();

        return $disease;
    }

    public static function getAllDiseaseType () {
        $model = static::orderBy('id', 'asc')
                            ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
        return $model;
    }

    public static function getPaginateDiseaseType ($skip = NULL, $take = NULL, $orderBy = 'name ASC') {
        $sortSplit = explode(' ', $orderBy);
        return static::select('created_at', 'updated_at', 'name', 'id', 'status')
                        ->orderBy($sortSplit[0], $sortSplit[1])
                        ->skip($skip)
                        ->take($take)
                        ->get();
    }

    public static function deleteDiseaseType ($id) {
        $disease = static::find($id);

        $disease->status     = 0;
        $disease->updated_at = date('Y-m-d H:i:s');

        $disease->update();

        return $disease;
    }

    public static function updateDisease ($id, $name, $status) {
        $disease = static::find($id);

        $disease->name          = $name;
        $disease->status        = $status;
        $disease->updated_at    = date('Y-m-d H:i:s');

        $disease->update();

        return $disease;
    }

}
