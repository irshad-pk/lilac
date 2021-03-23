<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Designation;
use App\Models\Department;

class staffController extends Controller
{
    public function search(Request $request)
    {
        $Search_results=[];
        $Search_Users = User::where('Name', 'like', $request->search_text.'%')->get();
        $Designation_results = Designation::where('Name', 'like', $request->search_text.'%')->get();
        $Department_results = Department::where('Name', 'like', $request->search_text.'%')->get();

        foreach($Search_Users as $Search_User)
        {
        array_push($Search_results,$Search_User);
        }

        foreach ($Designation_results as $Designation_result)
        {
            foreach($Designation_result->Users as $User)
            {
                if(! $this->UserExist($Search_results,$User->id))
                {
                    array_push($Search_results,$User);
                }
            }            
        }

        foreach ($Department_results as $Department_result)
        {
            foreach($Department_result->Users as $User)
            {
                if(! $this->UserExist($Search_results,$User->id))
                {
                    array_push($Search_results,$User);
                }
            }            
        }
        asort($Search_results);
        return view("search", compact('Search_results'));
    }

    private function UserExist($Users,$UserID)
    {
        foreach($Users as $User)
        {
            if($User->id==$UserID)
            {
                return true;
            }
        }
        return false;
    }
    
}
