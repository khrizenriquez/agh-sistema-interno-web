<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Patient extends Model {

    protected $table    = 'patient';
    public $timestamps  = false;

    public function createPatient ($patientCode, $name, $lastname, $gender, $birthdate, 
        $inhibitors, $jointDisease, $physiotherapy, $sickRelatives, $admissionDate) {
        $date = GeneralValues::getActualDate();
        $patient = new Patient();

        $patient->patientCode       = $patientCode;
        $patient->name              = $name;
        $patient->lastname          = $lastname;
        $patient->gender            = $gender;
        $patient->birthdate         = $birthdate;
        $patient->inhibitors        = $inhibitors;
        $patient->joint_disease     = $jointDisease;
        $patient->physiotherapy     = $physiotherapy;
        $patient->sick_relatives    = $sickRelatives;
        $patient->admission_date    = $admissionDate;
        $patient->created_at        = $date;
        $patient->updated_at        = $date;

        $patient->save();

        return $patient;
    }

    public static function getPaginatePatients ($skip = NULL, $take = NULL, $orderBy = 'name ASC') {
        return static::all();
    }

    public static function getTotal () {
        return static::all()->count();
    }

}
