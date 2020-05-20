<?php

namespace App\Http\Controllers;

use App\Summernote;
use App\SummernoteImage;
use Illuminate\Http\Request;

class SummernoteController extends Controller
{
    public function Index(){
        $summernotes = Summernote::get();
        return view('index')->withSummernotes($summernotes);
    }

    public function Create(){
        $summernotes = Summernote::get();
        return view('create')->withSummernotes($summernotes);
    }

    public function CreateSave(Request $request){
        $detail=$request->content;
        $dom = new \domdocument();
        $dom->loadHtml('<?xml encoding="UTF-8">'.$detail);
        $images = $dom->getelementsbytagname('img');
        $imgarray = array(); //สร้าง array เก็บรูปจาก summernote
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            list($type, $data) = explode(';', $data);
            list(, $data)= explode(',', $data);
            $data = base64_decode($data);
            $image_name= time().$k.'.png';
            $imgarray[] = URL('')."/images/".$image_name;  //นำรูปมาเก็บใน array
            $path = public_path() .'/images/'. $image_name;
            file_put_contents($path, $data);
            $img->removeattribute('src');
            $img->setattribute('src', URL('')."/images/".$image_name);
        }
        $detail = $dom->savehtml();
        $summernote = new Summernote;
        $summernote->content = $detail;
        $summernote->save();
        foreach($imgarray as $item){  //เพิ่มรายการรูปใน SummernoteImage
            $summernoteimage = new SummernoteImage();
            $summernoteimage->post_id = $summernote->id;
            $summernoteimage->file = $item;
            $summernoteimage->save();
        }
        return redirect()->route('index');
    }

    public function Edit($id){
        $summernote = Summernote::find($id);
        return view('edit')->withSummernote($summernote);
    }

    public function EditSave(Request $request,$id){
        $detail=$request->content;
        $dom = new \domdocument();
        $dom->loadHtml('<?xml encoding="UTF-8">'.$detail);
        $images = $dom->getelementsbytagname('img');
        $comming_array  = Array();   //การแก้ไข สร้า array
        foreach($images as $k => $img){
            $data = $img->getattribute('src');
            if(strpos($data, "data:image") !== false){
                list($type, $data) = explode(';', $data);
                list(, $data)= explode(',', $data);
                $data = base64_decode($data);
                $image_name= time().$k.'.png';
                $path = public_path() .'/images/'. $image_name;
                $comming_array[] = URL('')."/images/".$image_name; //ถ้ามีการเพิ่มรูปมาใหม่ ให้เก็บใน array
                file_put_contents($path, $data);
                $img->removeattribute('src');
                $img->setattribute('src', URL('')."/images/".$image_name);
            }else{
                $comming_array[] =  $data ; 
            }
        }

        $summerimgs = SummernoteImage::where('post_id',$id)->whereNotIn('file',$comming_array)->get(); 
        if ($summerimgs->count() > 0 ){
            foreach ($summerimgs as $summerimg){
             $url = str_replace(URL('').'/' , '' , $summerimg->file);
                @unlink($url);
            }
            $summerimgs = SummernoteImage::where('post_id',$id)->whereNotIn('file',$comming_array)->delete();
        }
        
        $existing_array = SummernoteImage::where('post_id',$id)->pluck('file')->toArray();
        $unique_array = array_diff($comming_array, $existing_array);

        foreach($unique_array as $item){
            $summernoteimage = new SummernoteImage();
            $summernoteimage->post_id = $id;
            $summernoteimage->file = $item;
            $summernoteimage->save();
        }
        $detail = $dom->savehtml();
        $summernote = Summernote::find($id);
        $summernote->update([
            'content' => $detail
        ]);
        return redirect()->route('index');
    }

    public function Delete($id){
        $summerimgs = SummernoteImage::where('post_id',$id)->get();
        if ($summerimgs->count() > 0 ){
            foreach ($summerimgs as $summerimg){
             $url = str_replace(URL('').'/' , '' , $summerimg->file);
                unlink($url);
            }
            $summerimgs = SummernoteImage::where('post_id',$id)->delete();
        }
        Summernote::find($id)->delete();
        return redirect()->route('index');
    }

}
