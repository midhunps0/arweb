<?php
namespace App\View\Composers;

use App\Models\Department;
use App\Models\Facility;
use Illuminate\View\View;

class DepartmentComposer
{
    public function compose(View $view )
    {
        $departments = Department::all();
        $facilities = Facility::all();
        $view->with([
            'departments_data' => $departments,
            'facilities_data' => $facilities
        ]);
    }
}
