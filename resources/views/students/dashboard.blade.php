@extends('layouts.app')

@section('content')
    <div class="container">
        <h2 class="bg-info text-center py-3">Active Admin Information</h2>
        
                <table class="table table-striped table-info">
                    <thead class="text-center">
                        <tr>
                            <th>NAME</th>
                            <th>EMAIL</th>
                            <th></th>
                            <th></th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        <tr>
                            <td>{{ strtoupper($LoggedUserInfo['name']) }}</td>
                            <td>{{ $LoggedUserInfo['email'] }}</td>
                            <td><button class="btn btn-primary"><a href="{{ route('student.create') }}" class="text-white">Add Student</a></button></td>
                            <td><button class="btn btn-success"><a href="{{ route('auth.logout') }}" class="text-white">Logout</a></button></td>
                        </tr>
                    </tbody>
                </table>

                <h2 class="bg-info text-center p-1">Student Information</h2>

                <table class="table table-dark ">
                    <thead class="text-center text-primary">
                        <tr>
                            <th>Student Name</th>
                            <th>University Name</th>
                            <th>Student Department</th>
                            <th>Admission Semester</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody class="text-center">
                        @foreach ($students as $student)
                            <tr>
                                <td>{{ $student->student_name }}</td>
                                <td>{{ $student->university }}</td>
                                <td>{{ $student->student_department }}</td>
                                <td>{{ $student->admission_semester }}</td>
                                <td>
                                   <a href="/student/edit/{{ $student->id }}" class="btn btn-primary">Edit</a>
                                   
                                   <form action="/student/destroy/{{ $student->id }}" method="POST">
                                    @csrf
                                       <button class="btn btn-danger">Delete</button>
                                   </form>
                                </td>
                            </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
@endsection