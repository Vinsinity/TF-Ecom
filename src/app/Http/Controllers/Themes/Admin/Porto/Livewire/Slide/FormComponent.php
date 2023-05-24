<?php

namespace App\Http\Controllers\Themes\Admin\Porto\Livewire\Slide;

use App\Helpers\Helper;
use App\Models\Slide;
use Carbon\Carbon;
use Livewire\Component;
use Livewire\WithFileUploads;

class FormComponent extends Component
{
    use WithFileUploads;

    public $image;
    public $content;
    public $title;
    public $link;
    public $order;

    protected $rules = [
        'content' => 'string',
        'title' => 'string',
        'link' => 'string',
        'order' => 'string',
        'image' => 'image|max:4096', // 4MB Max
    ];

    public function render()
    {
        return view('slide.form-component');
    }

    public function save()
    {
//        dd($this->validate());
        $data = $this->validate();
        $image = $this->image->store('slides','public');
        $data['image'] = $image;
        $data['offset'] = 0;
//        dd($data);
        Slide::create($data);
        redirect()->route('admin.settings.slide.list')->with('success','success');
    }
}
