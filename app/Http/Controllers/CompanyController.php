<?php

namespace App\Http\Controllers;

use App\Models\Company;
use Illuminate\Http\RedirectResponse;
use Illuminate\Http\Request;
use Illuminate\View\View;

class CompanyController extends Controller
{
    public function index(): View
    {
        $companies = Company::all();

        return view("companies.index", compact("companies"));
    }

    public function create(): View
    {
        return view("companies.create");
    }

    public function store(Request $request): RedirectResponse
    {
        Company::create($request->validated());

        return to_route("companies.index");
    }

    public function edit(Company $company)
    {
        return view("companies.edit", compact("company"));
    }

    public function update(Request $request, Company $company): RedirectResponse
    {
        $company->update($request->validated());

        return to_route("companies.index");
    }

    public function destroyu(Company $company): RedirectResponse
    {
        $company->delete();
        return to_route("companies.index");
    }
}
