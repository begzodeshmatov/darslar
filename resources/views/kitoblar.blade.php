@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="/home" class="btn btn-danger">Home</a>
                    <a href="/teacher" class="btn btn-primary">Teacher</a>
                    <a href="/students" class="btn btn-primary">Student</a>
                    <button style="float:right;" type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Qo'shish</button>
                </div>
                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Books</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="/bookSave" method="POST">
                            @csrf
                            <div class="mb-3">
                                <label>Name</label>
                                <input type="text" name="name" class="form-control" id="" placeholder="Ismingizni kiriting.." required>
                            </div>
                            <div class="mb-3">
                                <label>Surname</label>
                                <input type="text" name="surname" class="form-control" id="" placeholder="Familiyangizni kiriting.." required>
                            </div>
                            <div class="mb-3">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" id="" placeholder="Emailingizni kiriting.." required>
                            </div>
                            <div class="mb-3">
                                <label>Books</label>
                                <input type="text" name="book_name" class="form-control" id="" placeholder="Kitob nomini kiriting.." required>
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
                            <th scope="col">Id</th>
                            <th scope="col">Name</th>
                            <th scope="col">Surname</th>
                            <th scope="col">Email</th>
                            <th scope="col">Book name</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($kitoblar as $kitob)
                        <tr>
                            <th scope="row">{{$kitob->id}}</th>
                            <td>{{$kitob->name}}</td>
                            <td>{{$kitob->surname}}</td>
                            <td>{{$kitob->email}}</td>
                            <td>{{$kitob->book_name}}</td>
                            <td>
                                <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$kitob->id}}">Edit</a>
                                <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteUser{{$kitob->id}}"><i class='bx bx-trash'></i></a>
                        <!-- Modal -->
                        <div class="modal fade" id="exampleModal{{$kitob->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                            <div class="modal-dialog">
                                <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">User Edit</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/booksEditSave/{{$kitob->id}}" method="POST">
                                            @csrf
                                            <div class="mb-3">
                                                <label>Name</label>
                                                <input type="text" name="name" value="{{$kitob->name}}" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label>Surname</label>
                                                <input type="text" name="surname" value="{{$kitob->surname}}" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label>Email</label>
                                                <input type="email" name="email" value="{{$kitob->email}}" class="form-control" id="">
                                            </div>
                                            <div class="mb-3">
                                                <label>Book name</label>
                                                <input type="text" name="book_name" value="{{$kitob->surname}}" class="form-control" id="">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tahrirlash</button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Modal -->


                        <div class="modal fade" id="deleteUser{{$kitob->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                        <div class="modal-dialog">
                            <div class="modal-content">
                            <div class="modal-header">
                                <h1 class="modal-title fs-5" id="exampleModalLabel">O'chirish</h1>
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                                <p> Haqiqatdan ham {{$kitob->name}} ni o'chirmoqchimisiz??</p>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yo'q</button>
                                <a href="/bookdelete/{{$kitob->id}}" class="btn btn-primary">Xa</a>
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
