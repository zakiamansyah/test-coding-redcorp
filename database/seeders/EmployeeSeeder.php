<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Employee;

class EmployeeSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $row = [
            [
                'name' => 'Muhammad Zaki Amansyah',
                'dob' => '1999-03-07',
                'status' => 'Lajang',
                'join_date' => '2023-01-01',
            ],
            [
                'name' => 'Handika Pratama',
                'dob' => '1999-04-07',
                'status' => 'Menikah',
                'join_date' => '2023-02-02',
            ]
        ];

        Employee::insert($row);
        $employees = Employee::get();

        foreach ($employees as $employee) {
            $employee->employee_details()->insert([
                'employee_id' => $employee->id,
                'experience' => 'Membuat Aplikasi',
                'job_title' => 'Programmer',
                'job_desc' => 'Membuat Aplikasi Belajar'
            ]);
        }
    }
}
