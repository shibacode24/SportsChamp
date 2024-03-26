<?php

namespace App\Imports;

use App\Models\Assessment;
use Maatwebsite\Excel\Concerns\ToModel;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Illuminate\Validation\Rule;


class AssessmentImport implements ToModel, WithHeadingRow
{
    /**
     * @param array $row
     *
     * @return \Illuminate\Database\Eloquent\Model|null
     */
     private $gradeId;
    private $sectionId;
    private $empId;
    private $ExcelId;
 

    public function __construct($gradeId, $sectionId, $empId, $ExcelId)
    {
        $this->gradeId = $gradeId;
        $this->sectionId = $sectionId;
        $this->empId = $empId;
        $this->ExcelId = $ExcelId;
    }

    public function model(array $row)
    {
        return new Assessment([
            'excel_id' => $this->ExcelId,
            'grade_id' => $this->gradeId,
            'section_id' => $this->sectionId,
            'emp_id' => $this->empId,
            'roll_no' => $row['roll_no'],
            'name' => $row['name'],
            'category' => $row['category'],
            'roll_no' => $row['roll_no'],
            'test_name' => $row['test_name'],
            'score' => $row['score'],
            'assessment_month' => $row['assessment_month'],
            'remark' => $row['remark'],
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
