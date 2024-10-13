<?php

namespace App\Http\Controllers;

use App\Models\Branch;
use App\Models\Email;
use App\Models\Phone;
use Illuminate\Http\Request;

class BranchController extends Controller
{
    public function index() {
        $branches =Branch::with(['phones','emails'])->get();
        return view('admin.branches.index',compact('branches'));
    }

    public function create()  {
        return view('admin.branches.create');
    }

    public function store(Request $request)
{
    // Validate input
    $request->validate([
        'name' => 'required|string|max:255',
        'address' => 'required|string|max:255',
        'phones.*' => 'required|string|max:20',
        'emails.*' => 'required|email',
    ]);

    // Create the branch
    $branch = Branch::create($request->only(['name', 'address']));

    // Store the phone numbers
    foreach ($request->phones as $phone) {
        Phone::create(['branch_id' => $branch->id, 'phone_number' => $phone]);
    }

    // Store the emails
    foreach ($request->emails as $email) {
        Email::create(['branch_id' => $branch->id, 'email_address' => $email]);
    }

    return redirect()->route('admin.branches.index');
}

    public function edit(Branch $branch){
        return view('admin.branches.edit',compact('branch'));
    }

    public function update(Request $request, Branch $branch) {
        $branch->update($request->only(['name','address']));

        //Update Phones and Emails
        $branch->phones()->delete();
        $branch->emails()->delete();

        foreach ($request->phones as $phone) {
            Phone::create(['branch_id'=>$branch->id, 'phone_number'=>$phone]);
        }
        foreach ($request->emails as $email) {
            Email::create(['branch_id'=>$branch->id, 'email_address'=>$email]);
        }
        return redirect()->route('admin.branches.index');
    }

    public function destroy(Branch $branch)  {
        $branch->delete();
        return redirect()->back();
    }
}
