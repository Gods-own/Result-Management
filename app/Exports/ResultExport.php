<?php

namespace App\Exports;


// use App\Models\Session;
// use App\Models\Result;
// use App\Models\Term;
use Maatwebsite\Excel\Concerns\WithMapping;
// use Maatwebsite\Excel\Concerns\FromView;
use Maatwebsite\Excel\Concerns\FromCollection;
use Maatwebsite\Excel\Concerns\WithHeadings;

class ResultExport implements FromCollection, WithHeadings, withMapping
{
    public $view;
    public $data;
    public $name;
    public $term_term;
    public $session_session;

    public function __construct($view, $data, $name, $term_term, $session_session)
    {
        $this->view = $view;
        $this->data = $data;
        $this->name = $name;
        $this->term_term = $term_term;
        $this->session = $session_session;
    }

    public function headings(): array
    {

        return [[$this->name. ' ' .$this->term_term. ' term result for' .$this->session_session ], [
            'Subject',
            'Test1',
            'Test2',
            'Exam',
            'Total',
            'Grade',
        ]];
    }

    public function map($data): array
    {
        return [
            $data->subject->subject,
            $data->test1->test1,
            $data->test2->test2,
            $data->exam->exam,
            $data->total,
            $data->grade,
        ];
    }

    public function collection()
    {

        return $this->data;
    }
}
