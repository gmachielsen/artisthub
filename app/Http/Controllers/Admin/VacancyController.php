<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
Use App\Vacancy;

class VacancyController extends Controller
{
    public function index()
    {
        $vacancies = Vacancy::whenSearch(request()->search)->paginate(2);

        return view('dashboard.vacancies.index', compact('vacancies'));
    }

    public function create()
    {
        return view('dashboard.vacancies.create');
    }

    public function store(Request $request)
    {
        $this->validate($request,[
            'jobtitle'=>'required|min:2',
        ]);

        Vacancy::create([
            'jobtitle' => request('jobtitle'),
            'slug' => str_slug(request('jobtitle')),
            'jobdescription' => request('jobdescription'),
            'type' => request('type'),
            'hours' => request('hours'),
        ]);
        
        session()->flash('success', 'Vacancy saved succesfully');
        return redirect()->back(); 
    }

    public function edit($id)
    {
        $vacancy = Vacancy::find($id);

        return view('dashboard.vacancies.edit', compact('vacancy'));
    }

    public function update(Request $request, $id)
    {
        $this->validate($request,[
            'jobtitle'=>'required|min:2',
        ]);

        $vacancies = Vacancy::find($id);
        $vacancies->jobtitle = request('jobtitle');
        $vacancies->slug = str_slug(request('jobtitle'));
        $vacancies->jobdescription = request('jobdescription');
        $vacancies->type = request('type');
        $vacancies->hours = request('hours');


        $vacancies->save();
        session()->flash('success', 'Vacancy updated succesfully');
        return redirect()->back(); 
    }

    public function delete($id)
    {
        $vacancy = Vacancy::find($id);
        $vacancy->delete();
        session()->flash('success', 'Vacancy deleted successfully');
        return redirect()->route('admin.vacancies.index');
    }
}
