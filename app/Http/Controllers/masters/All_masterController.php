<?php

namespace App\Http\Controllers\masters;

use App\Http\Controllers\Controller;
use App\Models\Activity;
use Illuminate\Http\Request;
use App\Models\masters\City;
use App\Models\masters\Designation;
use App\Models\masters\Grade;
use App\Models\masters\Section;
use App\Models\masters\Prop;
use App\Models\masters\Vendor;
use App\Models\masters\Skill;
use App\Models\masters\TestComponent;
use App\Models\masters\Fitness;
use App\Models\masters\ActivityMaster;
use App\Models\masters\Category;
use App\Models\masters\Curriculum;
use App\Models\masters\ReasonType;

class All_masterController extends Controller
{

    public function index(){
        $city = City::all();
        $designation = Designation::all();
        $grade = Grade::all();
        $section = Section::all();
        $prop = Prop::all();
        $vendor = Vendor::all();
        $TestComponent = TestComponent::all();
        $fitness = Fitness::all();
        $skill = Skill::all();
        $activity = ActivityMaster::all();
        $category = Category::all();
        $curriculum = Curriculum::all();
        $reason = ReasonType::all();
        
        return view('masters.all_master',['city'=>$city, 'designation'=>$designation,
        'grade'=>$grade, 'section'=>$section, 'prop'=>$prop , 'vendor'=>$vendor , 'TestComponent'=>$TestComponent, 'fitness'=>$fitness, 'skills'=>$skill, 'activity'=>$activity, 'category'=>$category, 'curriculum'=>$curriculum, 'reason'=>$reason]);
    }


    public function city_store(Request $request){
        $request ->validate([
            'city_name'=>'required',
        ]);
        $data =[
            'city_name'=>$request->input('city_name'),
        ];

        $city = City::create($data);

        return redirect()->back()->with('success', 'City Added Successfully');
    }
    //destroy
    public function city_destroy($id){
        $city = City::find($id);
        if($city){
            $city->delete();
            return redirect(route('index'))->with('success', 'City Deleted Successfully');
        }else{
            return redirect(route('index'))->with('error', 'City not found');

        }
    }


//update

    public function update_city(Request $request)
     {
        $city_id = $request->input('city_id');
        $city = City::find($city_id);
        $city->city_name = $request->input('city_name');
        $city->update();
        return redirect()->back()->with('success', 'City Updated Successfully');
    }

        // end of city

     public function designation_store(Request $request){
            $request ->validate([
                'designation'=>'required',
            ]);
        
            Designation::create([
                'designation'=>$request->designation,
            ]);

            return redirect()->back()->with('success', 'Designation Added Successfully');
        }

        public function update_designation(Request $request)
        {
            // dd($request->designation_id);
        $designation_id = $request->input('designation_id');
        $designation = Designation::where('id',$designation_id)->first();
        $designation->designation = $request->input('designation');
        $designation->save();
        return redirect()->back()->with('success', 'designation Updated Successfully');
        }

        public function designation_destroy($id){
            $designation = Designation::find($id)->delete();

            return redirect(route('index'))->with('success', 'designation Deleted Successfully');
        }

        // end of designation

        public function grade_store(Request $request){
            $request ->validate([
                'grade'=>'required',
            ]);
        
            Grade::create([
                'grade'=>$request->grade,
            ]);

            return redirect()->back()->with('success', 'Grade Added Successfully');
        }

    public function update_grade(Request $request)
     {
        $grade_id = $request->input('grade_id');
        $grade = Grade::find($grade_id);
        $grade->grade = $request->input('grade');
        $grade->update();
        return redirect()->back()->with('success', 'Grade Updated Successfully');
    }

        public function grade_destroy($id){
            $grade = Grade::find($id)->delete();

            return redirect(route('index'))->with('success', 'Grade Deleted Successfully');
        }

//end of grade

        public function section_store(Request $request){
            $request ->validate([
                'section_name'=>'required',
                'grade_id'=>'required',
            ]);
        
            Section::create([
                'grade_id'=>$request->grade_id,
                'section_name'=>$request->section_name,
            ]);

            return redirect()->back()->with('success', 'Section Added Successfully');
        }

        public function update_section(Request $request)
        {
        $section_id = $request->input('section_id');
        $section = Section::find($section_id);
        $section->grade_id = $request->input('grade_id');
        $section->section_name = $request->input('section_name');
        $section->update();
        return redirect()->back()->with('success', 'Section Updated Successfully');
        }

        public function section_destroy($id){
            $section = Section::find($id)->delete();

            return redirect(route('index'))->with('success', 'Section Deleted Successfully');
        }
//end of section

        public function prop_store(Request $request){
            $request ->validate([
                'prop_name'=>'required',
            ]);
        
            Prop::create([

                'prop_name'=>$request->prop_name,
            ]);

            return redirect()->back()->with('success', 'Prop Added Successfully');
        }

        public function update_prop(Request $request)
        {
        $prop_id = $request->input('prop_id');
        $prop = Prop::find($prop_id);
        $prop->prop_name = $request->input('prop_name');
        $prop->update();
        return redirect()->back()->with('success', 'Prop Updated Successfully');
        }

        public function prop_destroy($id){
            $prop = Prop::find($id)->delete();

            return redirect(route('index'))->with('success', 'Prop Deleted Successfully');
        }

//end of prop



public function category_store(Request $request){
    $request ->validate([
        'category'=>'required',
    ]);

    Category::create([

        'category'=>$request->category,
    ]);

    return redirect()->back()->with('success', 'Category Added Successfully');
}

public function update_category(Request $request)
{
$category_id = $request->input('category_id');
$category = Category::find($category_id);
$category->category = $request->input('category');
$category->update();
return redirect()->back()->with('success', 'Category Updated Successfully');
}

public function category_destroy($id){
    $category = Category::find($id)->delete();

    return redirect(route('index'))->with('success', 'Category Deleted Successfully');
}

// end of category 

public function curriculum_store(Request $request){
    $request ->validate([
        'curriculum'=>'required',
        'grade_id'=>'required',
    ]);

    Curriculum::create([

        'name'=>$request->curriculum,
        'grade_id'=>$request->grade_id,
    ]);

    return redirect()->back()->with('success', 'Curriculum Added Successfully');
}

public function update_curriculum(Request $request)
{
$curriculum_id = $request->input('curriculum_id');
$curriculum = Curriculum::find($curriculum_id);
$curriculum->name = $request->input('curriculum');
$curriculum->grade_id = $request->input('grade_id');
$curriculum->update();
return redirect()->back()->with('success', 'Curriculum Updated Successfully');
}

public function curriculum_destroy($id){
    $curriculum = Curriculum::find($id)->delete();

    return redirect(route('index'))->with('success', 'Curriculum Deleted Successfully');
}


//end of curriculum

        public function vendor_store(Request $request){
            $request ->validate([
                'vendor_name'=>'required',
            ]);
            Vendor::create([

                'vendor_name'=>$request->vendor_name,
                'mobile'=>$request->mobile,
                'city_id'=>$request->city_id,
                'email'=>$request->email,
            ]);

            return redirect()->back()->with('success', 'vendor Added Successfully');
        }

        public function update_vendor(Request $request)
        {
        $vendor_id = $request->input('vendor_id');
        $vendor = Vendor::find($vendor_id);
        $vendor->vendor_name = $request->input('vendor_name');
        $vendor->mobile = $request->input('mobile');
        $vendor->city_id = $request->input('city_id');
        $vendor->email = $request->input('email');
        $vendor->save();
        return redirect()->back()->with('success', 'Vendor Updated Successfully');
        }

        public function vendor_destroy($id){
            $vendor = Vendor::find($id)->delete();

            return redirect(route('index'))->with('success', 'Vendor Deleted Successfully');
        }
    
        //end of vondor

        public function test_component_store(Request $request){
            $request ->validate([
                'name_of_test_components'=>'required',
                // 'test_id'=>'required',
            ]);
        
            TestComponent::create([
                // 'test_id'=>$request->test_id,
                'name_of_test_components'=>$request->name_of_test_components,
            ]);

            return redirect()->back()->with('success', 'TestComponent Added Successfully');
        }

    public function update_test_component(Request $request)
     {
        $testcomponent_id = $request->input('testcomponent_id');
        $test = TestComponent::find($testcomponent_id);
        // $test->test_id = $request->input('test_id');
        $test->name_of_test_components = $request->input('name_of_test_components');
        $test->update();
        return redirect()->back()->with('success', 'TestComponent Updated Successfully');
    }

        public function test_component_destroy($id){
            $test = TestComponent::find($id)->delete();

            return redirect(route('index'))->with('success', 'TestComponent Deleted Successfully');
        }

        //end of test

        public function activity_store(Request $request){
            // dd($request->all());
            $request ->validate([
                'activity'=>'required',
                'category'=>'required',
                'grade_id'=>'required',
            ]);
        
            ActivityMaster::create([
                'activity'=>$request->activity,
                'category_id'=>$request->category,
                'grade_id'=>$request->grade_id,
            ]);

            return redirect()->back()->with('success', 'Activity Added Successfully');
        }

    public function update_activity(Request $request)
     {
        $activity_id = $request->input('activity_id');
        $activity = ActivityMaster::find($activity_id);
        $activity->activity = $request->input('activity');
        $activity->category_id = $request->input('category');
        $activity->grade_id = $request->input('grade_id');
        $activity->update();
        return redirect()->back()->with('success', 'Activity Updated Successfully');
    }

        public function activity_destroy($id){
            $activity = ActivityMaster::find($id)->delete();

            return redirect(route('index'))->with('success', 'Activity Deleted Successfully');
        }

        //end of fitness

        
        public function skill_store(Request $request){
            $request ->validate([
                'skill'=>'required',
                'grade_id'=>'required',
            ]);
        
            Skill::create([
            
                'skill'=>$request->skill,
                'grade_id'=>$request->grade_id,
            ]);

            return redirect()->back()->with('success', 'Skill Added Successfully');
        }

    public function update_skill(Request $request)
     {
        $skill_id = $request->input('skill_id');
        $skill = Skill::find($skill_id);
        $skill->skill = $request->input('skill');
        $skill->grade_id = $request->input('grade_id');
        $skill->update();
        return redirect()->back()->with('success', 'Skill Updated Successfully');
    }

        public function skill_destroy($id){
            $skill = Skill::find($id)->delete();

            return redirect(route('index'))->with('success', 'Skill Deleted Successfully');
        }

        //end of skill

        //activity
        public function fitness_store(Request $request){
            $request ->validate([
                'test_battery'=>'required',
                'test_id'=>'required',
                'grade_id'=>'required',
            ]);
        
            Fitness::create([
                'test_id'=>$request->test_id,
                'test_battery'=>$request->test_battery,
                'grade_id'=>$request->grade_id,
            ]);

            return redirect()->back()->with('success', 'Fitness Added Successfully');
        }

    public function update_fitness(Request $request)
     {
        $fitness_id = $request->input('fitness_id');
        $fitness = Fitness::find($fitness_id);
        $fitness->test_id = $request->input('test_id');
        $fitness->test_battery = $request->input('test_battery');
        $fitness->grade_id = $request->input('grade_id');
        $fitness->update();
        return redirect()->back()->with('success', 'Fitness Updated Successfully');
    }

        public function fitness_destroy($id){
            $fitness = Fitness::find($id)->delete();

            return redirect(route('index'))->with('success', 'Fitness Deleted Successfully');
        }

        //end activity

        //reason type


        public function reason_type_store(Request $request){
// dd($request->all());
            $request ->validate([
                'reason_name'=>'required',
            ]);
        
            ReasonType::create([
                'reason_name'=>$request->reason_name,
            ]);

            return redirect()->back()->with('success', 'Reason Added Successfully');
        }

    public function update_reason_type(Request $request)
     {
        // dd($request->all());
        $reason_type_id = $request->input('reason_id');
        $reason_type = ReasonType::find($reason_type_id);
        $reason_type->reason_name = $request->reason_name;
       
        $reason_type->update();
        return redirect()->back()->with('success', 'Reason Updated Successfully');
    }

        public function reason_type_destroy($id){
            $reason_type = ReasonType::find($id)->delete();

            return redirect(route('index'))->with('success', 'Reason Deleted Successfully');
        }

        //end of reason type

}
