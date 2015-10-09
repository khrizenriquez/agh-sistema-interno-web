<?php 
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class ResponsibleType extends Model {

    protected $table        = 'responsible_type';
    protected $timestamp    = false;

    public static function getTotal () {
        return ResponsibleType::all()->count();
    }

    public static function getAllResponsibles () {
        $model = ResponsibleType::where('status', '=', 1)
                            ->orderBy('id', 'asc')
                            ->get(['created_at', 'updated_at', 'name', 'id', 'status']);
        return $model;
    }

}
