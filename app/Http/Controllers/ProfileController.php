<?php

namespace App\Http\Controllers;

use App\Http\Requests\ProfileRequest;
use App\Models\Profile;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\Facades\Hash;


class ProfileController extends Controller
{

    public function index() 
    {
        $profiles = Profile::paginate(10);
        return view('profile.index', ['profiles' => $profiles]);
    }

    public function show(Profile $profile)
    {
        // $id = $request->id;
        // $profile = Profile::findOrFail($id);

        $publications = $profile->publications;

        if(Cache::has('profile'.$profile->id)) {
            Cache::get('profile'.$profile->id);
        }else {
            Cache::put('profile'.$profile->id,$profile,30);
        }

        // Cache::remember('profile'.$profile->id,10,function {

        // });
        
        return view('profile.show', ['profile' => $profile, 'publications' => $publications]);
    }

    public function create() {
        return view('profile.create');
    }

    public function store(ProfileRequest $request) {
        // $name = $request->name;
        // $email = $request->email;
        // $password = $request->password;
        // $bio = $request->bio; 

        //validation
        // $formFields = $request->validate([
        //     'name' => 'required|between:3,20',
        //     'email' => 'email|unique:profiles|required',
        //     'password' => 'required|confirmed',
        //     'bio' => 'required', 
        // ]);

        $formFields = $request->validated();

        $formFields['password'] = Hash::make($request->password);

        $formFields['image'] = $this->uploadImage($request);

        if($this->uploadImage($request) == null)  {
            $formFields['image'] = 'profile/hello.jpg';
        }


        //Insertion
        Profile::create($formFields);

        //redirections

        //redirect()
        //redirect()->route(...) => to_route(...)
        //redirect()->action(...)
        //back()->withInput()

        return redirect()->route('profile.index')->with('success', 'votre copmte est bien cree.');
    }

    public function destroy(Profile $profile)
    {
        $profile->delete();
        return to_route('profile.index')->with('success','le profile a ete bien supprimer');
    }

    public function edit(Profile $profile)
    {
        return view('profile.edit', ['profile' => $profile]);
    }

    public function update(ProfileRequest $request, Profile $profile)
    {
        $formFields = $request->validated();

        $formFields['password'] = Hash::make($request->password);


        $formFields['image'] = $this->uploadImage($request);

        if($this->uploadImage($request) == null)  {
            $formFields['image'] = $profile->image;
        }

        $profile->fill($formFields)->save();
        
        return to_route('profile.show', ['profile' => $profile])->with('seccess','votre compte est bien modifiee');
    }

    private function uploadImage(ProfileRequest $request){
        if($request->hasFile('image')) {
            return $request->file('image')->store('profile','public');
        }
    }
}
