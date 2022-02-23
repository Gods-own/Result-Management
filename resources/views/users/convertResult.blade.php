@extends('layouts.app');

@section('content')
    <div>
        <table>
            <thead>
                <tr>
                    <th>Subject</th>
                    <th>Test 1</th>
                    <th>Test 2</th>
                    <th>Exam</th>
                    <th>Total</th>
                    <th>Grade</th>
                    <th>Teacher's Signature & Remark</th>
                </tr>
            </thead>
            <tbody>
            @foreach($results as $result)
                <tr>
                    <td>{{ $result->subject->subject }}</td>
                    <td>{{ $result->test1->test1 }}</td>
                    <td>{{ $result->test2->test2 }}</td>
                    <td>{{ $result->exam->exam }}</td>
                    <td>{{ $result->total}}</td>
                    <td>{{ $result->grade }}</td>
                    <td> </td>
                </tr>
            @endforeach
            </tbody>
        </table>
    </div>
@endsection
