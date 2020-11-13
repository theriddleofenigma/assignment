<?php

namespace App\Imports;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Maatwebsite\Excel\Concerns\ToCollection;
use Maatwebsite\Excel\Concerns\WithHeadingRow;
use Maatwebsite\Excel\Concerns\WithValidation;

class UsersImport implements ToCollection, WithValidation, WithHeadingRow
{
    public function collection(Collection $rows)
    {
        $now = now();
        $rows = $rows->map(function ($row) use ($now) {
            return $row->only('name', 'email', 'phone', 'dob')
                ->merge([
                    'password' => Hash::make('password'),
                    'created_at' => $now,
                    'updated_at' => $now,
                ]);
        })->toArray();
        DB::table('users')->upsert($rows, ['email'], ['name', 'phone', 'dob', 'updated_at']);
    }

    public function rules(): array
    {
        return [
            'name' => 'required|max:255',
            'email' => 'required|email|max:255',
            'dob' => 'nullable|date_format:Y-m-d',
        ];
    }
}
