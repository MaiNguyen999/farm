<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Slider;

class SliderController extends Controller
{
    //
    public function addslider(){
        return view('admin.addslider');
    }
    public function saveslider(Request $request){

        $this->validate($request,['description_one' => 'required',
                                  'description_two' => 'required',
                                  'slider_image' => 'image|nullable|max:1999']);
        if($request->hasFile('slider_image')){
            // 1: get filename with ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();

            // 2: get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3: get just extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image 

            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);
        } else {
            $fileNameToStore = 'noimage.jpg';
        } 
        $slider = new Slider();

        $slider->description1 = $request->input('description_one');
        $slider->description2 = $request->input('description_two');
        $slider->slider_image = $fileNameToStore;
        $slider->status = $request->has('product_status') ? 1 : 0;
        
        $slider->save();
        return redirect('/addslider')->with('status','The Slider has been saved successfully');
    }

    public function sliders(){
        $sliders = Slider::get();
        return view('admin.sliders')->with('sliders', $sliders);
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('admin.editslider')->with('slider', $slider);
    }
    public function updateslider(Request $request){
        $this->validate($request,['description_one' => 'required',
                                  'description_two' => 'required',
                                  'slider_image' => 'image|nullable|max:1999']);

        $slider =  Slider::find($request->input('id'));

        $slider->description1 = $request->input('description_one');
        $slider->description2 = $request->input('description_two');
        if($request->hasFile('slider_image')){
            // 1: get filename with ext
            $fileNameWithExt = $request->file('slider_image')->getClientOriginalName();
    
            // 2: get just filename 
            $fileName = pathinfo($fileNameWithExt, PATHINFO_FILENAME);

            // 3: get just extension
            $extension = $request->file('slider_image')->getClientOriginalExtension();

            // 4: file name to store
            $fileNameToStore = $fileName.'_'.time().'.'.$extension;

            // upload image 

            $path = $request->file('slider_image')->storeAs('public/slider_image', $fileNameToStore);
            
            if($slider->slider_image != 'noimage.jpg'){
                Storage::delete('public/slider_image/'.$slider->slider_image);
            }
            $slider->slider_image = $fileNameToStore;
        }
        $slider->status = $request->has('product_status') ? 1 : 0;
        
        $slider->update();
        return redirect('/sliders')->with('status','The Slider has been updated successfully');
    }
    public function delete($id){
        $slider = Slider::find($id);
        if($slider->slider_image != 'noimage.jpg'){
            Storage::delete('public/slider_image/'.$slider->slider_image);
        }
        $slider->delete();
        return redirect('/sliders')->with('status','The Slider has been deleted successfully');
    }
    public function activate($id){
        $slider = Slider::find($id);
        $slider->status = 1;
        $slider->update();
        return redirect('/sliders')->with('status','The slider status has been activated successfully');
    }
    public function deactivate($id){
        $slider = Slider::find($id);
        $slider->status = 0;
        $slider->update();
        return redirect('/sliders')->with('status','The slider status has been deactivate successfully');
    }
}
