<?php

namespace App\Http\Livewire\Dashboard;

use App\Models\Setting;
use Livewire\Component;

class Settings extends Component
{
    public $settings;

    public $rules = [
        'settings.*.id' => 'required',
        'settings.*.key' => 'required',
        'settings.*.value' => 'required',
    ];

    public function mount()
    {
        $this->refreshSettings();
    }

    public function refreshSettings()
    {
        $this->settings = Setting::orderBy('id', 'desc')->get();
    }

    public function updated($field)
    {
        $index = explode('.', $field)[1] ?? null;

        $this->settings[$index]->save();

        $this->dispatchBrowserEvent('notification-show', [
            'type' => 'success',
            'message' => 'Successfully saved setting.'
        ]);
    }

    public function newSetting()
    {
        $setting = new Setting;
        $setting->key = $this->getUniqueKeyName();
        $setting->save();
        $this->refreshSettings();
    }

    public function getUniqueKeyName(){
        $name = 'key-name';
        $original_name = $name;
        $counter = 1;
        while(Setting::where('key', $name)->exists()){
            $name = $original_name . '-' . $counter;
            $counter++;
        }
        return $name;
    }

    public function delete($index){
        $this->settings[$index]->delete();

        $this->refreshSettings();

        $this->dispatchBrowserEvent('notification-show', [
            'type' => 'success',
            'message' => 'Successfully deleted setting.'
        ]);
    }

    public function render()
    {
        return view('livewire.dashboard.settings')->extends('dashboard.layout');
    }
}
