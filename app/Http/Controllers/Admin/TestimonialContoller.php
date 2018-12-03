<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\Testimonial;
use Session;

class TestimonialContoller extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $testimonials=Testimonial::all();
        return view('admin.testimonials.index')->withTestimonials($testimonials);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('admin.testimonials.create');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
      $this->validate($request, [
        'author' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'quote' => 'required'
      ]);

      $testimonial=new Testimonial();
      $testimonial->author=$request->author;
      $testimonial->position=$request->position;
      $testimonial->quote=$request->quote;

      $testimonial->save();

      Session::flash('success','Tesimonial has been succesfully added.');
      return redirect()->route('testimonials.index');
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $testimonial=Testimonial::findOrFail($id);
        return view('admin.testimonials.edit')->withTestimonial($testimonial);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
      $this->validate($request, [
        'author' => 'required|string|max:255',
        'position' => 'required|string|max:255',
        'quote' => 'required'
      ]);

      $testimonial=Testimonial::findOrFail($id);
      $testimonial->author=$request->author;
      $testimonial->position=$request->position;
      $testimonial->quote=$request->quote;

      $testimonial->save();

      Session::flash('success','Tesimonial has been succesfully updated.');
      return redirect()->route('testimonials.index');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
      $testimonial=Testimonial::findOrFail($id);
      $testimonial->delete();

      Session::flash('success','You have succesfully deleted testimonial.');
      return redirect()->route('testimonials.index');
    }
}
