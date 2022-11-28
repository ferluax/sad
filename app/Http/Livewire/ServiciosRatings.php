<?php

namespace App\Http\Livewire;
use App\Models\Rating;

use Livewire\Component;

class ServiciosRatings extends Component
{
    public $rating;
    public $comment;
    public $currentId;
    public $servicios;
    public $hideForm;

    protected $rules = [
        'rating' => ['required', 'in:1,2,3,4,5'],
        'comment' => 'required',

    ];

    public function render()
    {
        $comments = Rating::where('servicios_id', $this->servicios->id)->where('status', 1)->with('user')->get();
        return view('livewire.servicios-ratings', compact('comments'));
    }

    public function mount()
    {
        if(auth()->user()){
            $rating = Rating::where('user_id', auth()->user()->id)->where('servicios_id', $this->servicios->id)->first();
            if (!empty($rating)) {
                $this->rating  = $rating->rating;
                $this->comment = $rating->comment;
                $this->currentId = $rating->id;
            }
        }
        return view('livewire.servicios-ratings');
    }

    public function delete($id)
    {
        $rating = Rating::where('id', $id)->first();
        if ($rating && ($rating->user_id == auth()->user()->id)) {
            $rating->delete();
        }
        if ($this->currentId) {
            $this->currentId = '';
            $this->rating  = '';
            $this->comment = '';
        }
    }

    public function rate()
    {
        $rating = Rating::where('user_id', auth()->user()->id)->where('servicios_id', $this->servicios->id)->first();
        $this->validate();
        if (!empty($rating)) {
            $rating->user_id = auth()->user()->id;
            $rating->servicios_id = $this->servicios->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->update();
            } catch (\Throwable $th) {
                throw $th;
            }
            session()->flash('message', 'Success!');
        } else {
            $rating = new Rating;
            $rating->user_id = auth()->user()->id;
            $rating->servicios_id = $this->servicios->id;
            $rating->rating = $this->rating;
            $rating->comment = $this->comment;
            $rating->status = 1;
            try {
                $rating->save();
            } catch (\Throwable $th) {
                throw $th;
            }
            $this->hideForm = true;
        }
    }
    
    
    
    // public function render()
    // {
    //     return view('livewire.servicios-ratings');
    // }
}
