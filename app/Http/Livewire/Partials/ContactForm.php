<?php

namespace App\Http\Livewire\Partials;

use Livewire\Component;

class ContactForm extends Component
{
  public $first_name,$last_name, $email, $message, $subject, $phone,$from,$address;

  public function updated($field)
  {
    $this->validateOnly($field, [
      'email' => 'required|email',
      'first_name' => 'required',
      'last_name' => 'required',
      'phone' => 'required',
      'address' => 'required',
      'message' => 'required'
    ]);
  }

  public function render()
  {
    return view('livewire.partials.contact-form');
  }


  public function insertContact()
  {
    $this->validate([
        'email' => 'required|email',
        'first_name' => 'required',
        'last_name' => 'required',
        'phone' => 'required',
        'address' => 'required',
        'message' => 'required'
    ]);
    $newRequest = new \App\Message();
    $newRequest->first_name = $this->first_name;
    $newRequest->last_name = $this->last_name;
    $newRequest->email = $this->email;
    $newRequest->from = $this->from;
    $newRequest->phone = $this->phone;
    $newRequest->address = $this->address;
    $newRequest->message = $this->message;

    $newRequest->save();

    $this->reset();

    session()->flash('success', 'Thanks for contacting us');


//        Mail::to($this->email)->send(new \App\Mail\UserMessage($data));
  }
}
