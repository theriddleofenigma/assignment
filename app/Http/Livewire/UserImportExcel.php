<?php

namespace App\Http\Livewire;

use App\Imports\UsersImport;
use Livewire\Component;
use Livewire\WithFileUploads;
use Maatwebsite\Excel\Facades\Excel;
use Maatwebsite\Excel\Validators\ValidationException;

class UserImportExcel extends Component
{
    use WithFileUploads;

    public $messageColor = '';
    public $message = '';
    public $file;
    public $validationErrors = [];

    protected $rules = [
        'file' => 'required|mimes:xlsx',
    ];

    protected $messages = [
        'file.required' => 'Please upload an excel file to start the import.',
        'file.mimes' => 'The uploaded file must be a file of type: xlsx.',
    ];

    public function updated()
    {
        $this->resetMessages();
        $this->validate();
    }

    public function import()
    {
        $this->resetMessages();
        $this->validate();
        try {
            Excel::import(new UsersImport(), $this->file);
            $this->message = 'Your data has been successfully Imported!';
            $this->messageColor = 'green';
            $this->file = '';
            $this->dispatchBrowserEvent('reset-file-input');
        } catch (ValidationException $e) {
            $failures = $e->failures();

            foreach ($failures as $failure) {
                $this->validationErrors = [
                    'row' => $failure->row(),
                    'attribute' => $failure->attribute(),
                    'errors' => $failure->errors(),
                    'values' => $failure->values(),
                ];
            }
            $this->message = 'Validation error occurred while importing!';
            $this->messageColor = 'red';
        }
    }

    private function resetMessages()
    {
        $this->validationErrors = [];
        $this->message = '';
    }
}
