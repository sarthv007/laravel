<?php
namespace App\Exports;
use App\Student;
use Maatwebsite\Excel\Concerns\FromCollection;
class StudentExport implements FromCollection
{
  public function collection()
  {
    return Student::all();
  }
}