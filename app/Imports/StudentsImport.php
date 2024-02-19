<?php
namespace App\Imports;

use App\Models\Student;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;


class StudentsImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
    public function model(array $row)
    {
        return new Student([
            'school_code' => $row['school_code'],
            'class' => $row['class'],
            'section' => $row['section'],
            'roll_no' => $row['roll_no'],
            'name' => $row['name'],
            'parent_name' => $row['parent_name'],
            'mobile_no' => $row['mobile_no'],
            'height' => $row['height'],
            'weight' => $row['weight'],
            'username' => $row['username'],
            'password' => bcrypt($row['password']),
        ]);
    }

    // public function rules(): array
    // {
    //     return [
    //         'SchoolCode' => 'required', // Assuming SchoolCode is a required field
    //         'RollNumber' => [
    //             'required',
    //             Rule::unique('students', 'roll_no')->where(function ($query) {
    //                 return $query->where('school_code', request()->input('SchoolCode'));
    //             }),
    //         ],
    //         // Add other validation rules for other fields as needed
    //     ];
    // }

}
