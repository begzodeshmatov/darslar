@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="/teacher" class="btn btn-danger">Teacher</a>
                    <a href="/students" class="btn btn-primary">Student</a>
                    <a href="/library" class="btn btn-primary">Library</a>
                    <a href="/home" class="btn btn-primary">Home</a>
                    <button style="float:right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Qo'shish</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">User qo'shish</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/userSave" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Ismingizni kiriting.." required>
                            </div>
                            <div class="mb-3">
                                <label>Password</label>
                                <input type="password" name="password" class="form-control" id="" placeholder="Parolingizni kiriting.." required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="" placeholder="Emailingizni kiriting.." required>
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
                            <th scope="col">Password</th>
                            <th scope="col">Email</th>
                            <th scope="col">Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($users as $user)
                        <tr>
                            <th scope="row">{{$user->id}}</th>
                            <td>{{$user->name}}</td>
                            <td>{{$user->password}}</td>
                            <td>{{$user->email}}</td>
                            <td>
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$user->id}}"><i class='bx bx-pencil'></i></a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{$user->id}}"><i class='bx bx-trash'></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Edit</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/userEditSave/{{$user->id}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{$user->name}}" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label>Password</label>
                                                <input type="password" name="password" value="{{$user->password}}" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{$user->email}}" class="form-control" id="">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tahrirlash</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->


                        <div class="modal fade" id="deleteUser{{$user->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">O'chirish</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> Haqiqatdan ham {{$user->name}} ni o'chirmoqchimisiz??</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yo'q</button>
                                <a href="/userdelete/{{$user->id}}" class="btn btn-primary">Xa</a>
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
