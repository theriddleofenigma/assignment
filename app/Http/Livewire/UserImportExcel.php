<?php

namespace App\Http\Livewire;

use App\Imports\UsersImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;

class UserImportExcel extends Component
{
    use WithFileUploads;

    public $message = '';
    public $file;

    protected $rules = [
        'file' => 'required|mimes:xlsx',
    ];

    protected $messages = [
        'file.required' => 'Please upload an excel file to start the import.',
        'file.mimes' => 'The uploaded file must be a file of type: xlsx.',
    ];

    public function updated()
    {
        $this->validate();
    }

    public function import()
    {
        $this->validate();
        Excel::import(new UsersImport(), $this->file);
    }
}
