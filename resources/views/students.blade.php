@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="/home" class="btn btn-success">Home</a>
                    <a href="/teacher" class="btn btn-danger">Teacheer</a>
                    <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Qo'shish</button>
                </div>
                <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
            <div class="modal-header">
                <h1 class="modal-title fs-5" id="exampleModalLabel">Student qo'shish</h1>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form action="/studentSave" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">Name</label>
                        <input type="text" name="name" id="" class="form-control" placeholder="Ismingizni kiriting...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Surname</label>
                        <input type="text" name="surname" id="" class="form-control" placeholder="Familiyangizni kiriting...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Age</label>
                        <input type="text" name="age" id="" class="form-control" placeholder="Yoshingizni kiriting...">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Email</label>
                        <input type="email" name="email" id="" class="form-control" placeholder="Emailingizni kiriting...">
                    </div>
                    <button type="submit" class="btn btn-primary">Saqlash</button>
                </form>
            </div>
            </div>
        </div>
        </div>
                <table class="table">
                    <thead>
                        <tr>
                            <th scope="col">#</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Age</th>
                            <th scope="col">Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($students as $student)
                        <tr>
                            <th scope="row">{{$student->id}}</th>
                            <td>{{$student->name}}</td>
                            <td>{{$student->surname}}</td>
                            <td>{{$student->email}}</td>
                            <td>{{$student->age}}</td>
                            
                            <td>
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$student->id}}">Edit</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deletestudent{{$student->id}}"><i class='bx bx-trash'></i></a>
                                <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Student tahrirlash</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/studentEditSave/{{$student->id}}" method="POST">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control" value="{{$student->name}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Surname</label>
                                                    <input type="text" name="surname" class="form-control" value="{{$student->surname}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Age</label>
                                                    <input type="text" name="age" class="form-control" value="{{$student->age}}">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Email</label>
                                                    <input type="email" name="email" class="form-control" value="{{$student->email}}">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Tahrirlash</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                </div>

                                <!-- Modal -->
                                <div class="modal fade" id="deletestudent{{$student->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">O'chirish</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <p>Haqiqatdan ham {{$student->name}} ni o'chirmoqchimisiz??</p>
                                    </div>
                                    <div class="modal-footer">
                                        <button type="submit" class="btn btn-secondary" data-bs-dismiss="modal">Yo'q</button>
                                        <a href="/studentdelete/{{$student->id}}" class="btn btn-primary">Xa</a>
                                    </div>
                                    </div>
                                </div>
                                </div>
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
@endsection
