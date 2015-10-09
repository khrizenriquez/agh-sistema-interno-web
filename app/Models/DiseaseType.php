<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class DiseaseType extends Model {

    protected $table        = 'disease_type';
    protected $timestamp    = false;

    public static function getTotal () {
        return DiseaseType::all()->count();
    }

    public static function getAllDiseases () {
        $model = DiseaseType::where('status', '=', 1)
                            ->orderBy('id', 'asc')
                            ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
        return $model;
    }

}
