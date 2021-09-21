@extends('layouts.app')
@section('content')
    <h1 class="bg-primary text-center">Add Students</h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <form action="/student/update/{{ $student->id }}" method="POST">

                  @if (Session::get('fail'))
                      <div class="alert alert-danger">
                          {{ Session::get('fail') }}
                      </div>
                  @endif
                    @csrf
                    <div class="form-group">
                        <label for="student_name">Enter student Name</label>
                        <input type="text" id="student_name" class="form-control" name="student_name" value="{{ $student->student_name }}">
                        <span class="text-danger">
                            @error('student_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="university">Enter University Name</label>
                        <input type="text" id="university" class="form-control" name="university" placeholder="Enter University Name" value="{{ $student->university }}">
                        <span class="text-danger">
                            @error('student_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="student_department">Enter student Department</label>
                        <input type="text" id="student_department" class="form-control" name="student_department" placeholder="Enter student Department" value="{{ $student->student_department }}">
                        <span class="text-danger">
                            @error('student_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <div class="form-group">
                        <label for="admission_semester">Enter Admission Semester</label>
                        <input type="text" id="admission_semester" class="form-control" name="admission_semester" placeholder="Enter Admission Semester" value="{{ $student->admission_semester }}">
                        <span class="text-danger">
                            @error('student_name')
                                {{ $message }}
                            @enderror
                        </span>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </form>
            </div>
        </div>
    </div>

@endsection