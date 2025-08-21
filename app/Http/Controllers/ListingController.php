<?php

namespace App\Http\Controllers;

use App\Models\Listing;
use Faker\Provider\ar_EG\Company;
use Illuminate\Container\Attributes\Tag;
use Illuminate\Http\Request;
use Illuminate\Validation\Rule;
use PDO;
use PhpParser\Node\Expr\List_;
use Symfony\Contracts\Service\Attribute\Required;

class ListingController extends Controller
{  

public function index(){
    //the whole listing view
//    dd(request());
  return view('listings.index',[
         'listings' => Listing::latest()->filter(request(['tag','search']))->get()
       ]);
}
//for single list view
public function show(Listing $listing){
    return view('listings.show',['listing'=>$listing]);
}

//view for create form
public function create(){
 return view('listings.create');
}

//store gigs/jobs
public function store(Request $request){
// dd($request->all());
$formFields = $request->validate([
    'title'=>'required',
    'company'=>['required',Rule::unique('listings','Company')],
    'location'=>'required',
    'website'=>'required',
    'email'=>['required',Rule::email()],
    'tags'=>'required',
    'description'=>'required'
    
]);

Listing::create($formFields) ;
return redirect('/')->with('message','Listing created Succefully');
}
}
