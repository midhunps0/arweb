<?php
namespace App\View\Composers;

use App\Models\Department;
use Illuminate\View\View;

class DepartmentComposer
{
    public function compose(View $view )
    {
        $departments = Department::all();
        $view->with('departments_data', $departments);
    }
}
