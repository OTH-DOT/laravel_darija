<?php

namespace App\Http\Controllers;

use App\Http\Requests\PublicationRequest;
use App\Models\publication;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Gate;

class PublicationController extends Controller
{
    // public function __construct()
    // {
    //     $this->middleware('auth')->except('index');
    // }

    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $publications = publication::latest()->paginate();
        
        return view('publication.index', ['publications'=> $publications]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        return view('publication.create');
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(PublicationRequest $request)
    {
        $formFields = $request->validated();
        $formFields['image'] = $this->uploadImage($request);
        $formFields['profile_id'] = Auth::id();
        // if($this->uploadImage($request) == null)  {
        //     $formFields['image'] = 'publication/hello.jpg';
        // }
        publication::create($formFields);

        return to_route('publications.index');
    }

    /**
     * Display the specified resource.
     */
    public function show(publication $publication)
    {
        
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(publication $publication)
    {
        //Authorization :
        //Gates
        //Policies

        // Gate::authorize('update-publication',$publication);

        Gate::authorize('update',$publication);

        // if(!Gate::allows('update-publication',$publication)){
        //     abort(403,"you don't have access to update this publication");
        // }

        // if(Auth::id() !== $publication->profile_id){
        //     abort(403,"you don't have access to update this publication");
        // }

        return view('publication.edit', ['publication' => $publication]);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(PublicationRequest $request, publication $publication)
    {
        Gate::authorize('update-publication',$publication);

        $formFields = $request->validated();
        $formFields['image'] = $this->uploadImage($request);
        if($this->uploadImage($request) == null)  {
            $formFields['image'] = $publication->image;
        }
        $publication->fill($formFields)->save();

        return to_route('publications.index')->with('seccess','la publication a bien ete modifiee');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(publication $publication)
    {
        $publication->delete();
        return to_route('publications.index')->with('success','la publication a ete bien supprimer');
    }

    private function uploadImage(PublicationRequest $request){
        if($request->hasFile('image')) {
            return $request->file('image')->store('publication','public');
        }
    }
}
