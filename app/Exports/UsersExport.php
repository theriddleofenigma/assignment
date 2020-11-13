<?php

namespace App\Exports;


use App\Models\User;
use Illuminate\Database\Eloquent\Collection;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class UsersExport implements FromCollection, WithHeadings
{
    /**
     * @return User[]|Collection
     */
    public function collection()
    {
        return User::get(['name', 'email', 'phone', 'dob']);
    }

    public function headings(): array
    {
        return ['Name', 'Email', 'Phone', 'DOB'];
    }
}
