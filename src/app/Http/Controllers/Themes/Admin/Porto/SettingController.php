<?php

namespace App\Http\Controllers\Themes\Admin\Porto;

use App\Http\Controllers\Controller;
use App\Http\Requests\Admin\Setting\Cargo\StoreRequest;
use App\Http\Requests\Admin\Setting\Seo\StoreOrUpdateRequest;
use App\Models\Cargo;
use App\Models\CompanySetting;
use App\Models\SiteSeoSetting;
use App\Models\Slide;
use Request;

class SettingController extends Controller
{
    public function seo()
    {
        $settings = SiteSeoSetting::first();
        return view('setting.seo.setting',compact('settings'));
    }

    public function seoPost(StoreOrUpdateRequest $request)
    {
        $seo = SiteSeoSetting::first();
        if ($seo) {
            $update = $seo->update($request->all());
            if($update) {
                return redirect()->back()->with('success', 'Site seo setting added success');
            }else{
                return redirect()->back()->withErrors('Site seo setting added unsuccessful');
            }
        }else{
            $setting = SiteSeoSetting::create($request->all());
            if($setting){
                return redirect(route('admin.settings.seo'))->with('success',' Site seo setting added success');
            }else{
                return redirect(route('admin.settings.seo'))->withErrors('Site seo setting added unsuccessful');
            }
        }
    }

    public function company()
    {
        $settings = CompanySetting::first();
        return view('setting.company.setting',compact('settings'));
    }

    public function cargo()
    {
        $cargos = Cargo::all();
        return view('setting.cargo.list', compact('cargos'));
    }

    public function cargoAdd()
    {
        return view('setting.cargo.add');
    }

    public function cargoPost(StoreRequest $request)
    {
        $cargo = Cargo::create($request->validated());
        if($cargo) {
            return redirect()->route('admin.settings.cargo.list')->with('success','Added');
        }else{
            return redirect()->route('admin.settings.cargo.list')->with('error','Not dded');
        }
    }

    public function slideList()
    {
        $slides = Slide::all();
        return view('setting.slides.list',compact('slides'));
    }

    public function slideAddForm()
    {
        return view('setting.slides.add');
    }
}
