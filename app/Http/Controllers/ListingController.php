<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Validation\Rule;

class ListingController extends Controller
{
  //Show All Listing
  public function index()
  {
    return view('listings.index', [
      'listings' => Listing::latest()->filter(request()->query())->paginate(6),
    ]);
  }

  //Show Single Listing
  public function show(Listing $listing)
  {
    return view('listings.show', [
      'listing' => $listing
    ]);
  }

  public function create()
  {
    return view('listings.create');
  }
  public function store(Request $request)
  {
    $formFields = $request->validate([
      'title' => 'required',
      'company' => ['required', Rule::unique('listings', 'company')],
      'location' => 'required',
      'website' => 'required',
      'email' => ['required', 'email'],
      'tags' => 'required',
      'description' => 'required'
    ]);
    if (request()->hasFile('logo')) {
      $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }
    Listing::create($formFields);
    return redirect('/')->with('message', 'Listing Created Successfully');
  }

  public function edit(Listing $listing)
  {
    return view('listings.edit', ['listing' => $listing]);
  }

  public function update(Request $request, Listing $listing)
  {
    $formFields = $request->validate([
      'title' => 'required',
      'company' => 'required',
      'location' => 'required',
      'website' => 'required',
      'email' => ['required', 'email'],
      'tags' => 'required',
      'description' => 'required'
    ]);
    if (request()->hasFile('logo')) {
      $formFields['logo'] = $request->file('logo')->store('logos', 'public');
    }
    $listing->update($formFields);
    return back()->with('message', 'Listing Updated Successfully');
  }
  public function destroy(Listing $listing)
  {
    $listing->delete();
    return redirect('/')->with('message', 'Listing Deleted Successfully');
  }
}
