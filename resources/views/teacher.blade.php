@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-12">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}
                    <a href="/home" class="btn btn-success">Home</a>
                    <a href="/students" class="btn btn-primary">Student</a>
                    <a href="/kitoblar" class="btn btn-primary">Books</a>
                    <button type="button" style="float:right;" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#exampleModal">Qo'shish</button>
                </div>

                <!-- Modal -->
                <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                <div class="modal-dialog">
                    <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher qo'shish</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                        <div class="modal-body">
                            <form action="/teacherSave" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="mb-3">
                                    <label class="form-label">Name</label>
                                    <input type="text" name="name" class="form-control" placeholder="Ism kirit...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Surname</label>
                                    <input type="text" name="surname" class="form-control" placeholder="Familiya kirit...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Manzil</label>
                                    <input type="text" name="manzil" class="form-control" placeholder="Manzil kirit...">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Image</label>
                                    <input type="file" name="image" class="form-control" accept=".png,.jpg">
                                </div>
                                <div class="mb-3">
                                    <label class="form-label">Telefon raqam</label>
                                    <input type="text" name="tel_raqam" class="form-control" placeholder="Telefon raqam kirit...">
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
                            <th scope="col">Manzil</th>
                            <th scope="col">Image</th>
                            <th scope="col">Telefon raqam</th>
                            <th scope="col">Amallar</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($teachers as $teacher)
                            <tr>
                                <th scope="row">{{$teacher->id}}</th>
                                <td>{{$teacher->name}}</td>
                                <td>{{$teacher->surname}}</td>
                                <td>{{$teacher->manzil}}</td>
                                <td> <img src="/rasmlar/{{$teacher->image}}" width="100" height="100" alt="Rasm chiqmadi"></td>
                                <td>{{$teacher->tel_raqam}}</td>
                                <td>
                                    <a href="#" class="btn btn-success" data-bs-toggle="modal" data-bs-target="#exampleModal{{$teacher->id}}">Edit</a>
                                    <a href="#" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#deleteteacher{{$teacher->id}}">Delete</a>

                                    <!-- Modal -->
                                <div class="modal fade" id="exampleModal{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                    <div class="modal-header">
                                        <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher tahrirlash</h1>
                                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                    </div>
                                    <div class="modal-body">
                                        <form action="/teacherEditSave/{{$teacher->id}}" method="POST" enctype="multipart/form-data">
                                            @csrf
                                            <div class="mb-3">
                                                <label class="form-label">Name</label>
                                                <input type="text" name="name" class="form-control" value="{{$teacher->name}}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Surname</label>
                                                <input type="text" name="surname" class="form-control" value="{{$teacher->surname}}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Manzil</label>
                                                <input type="text" name="manzil" class="form-control" value="{{$teacher->manzil}}">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Image</label>
                                                <input type="file" name="image" class="form-control">
                                            </div>
                                            <div class="mb-3">
                                                <label class="form-label">Telefon raqam</label>
                                                <input type="text" name="tel_raqam" class="form-control" value="{{$teacher->tel_raqam}}">
                                            </div>
                                            <button type="submit" class="btn btn-primary">Tahrirlash</button>
                                        </form>
                                    </div>
                                    </div>
                                </div>
                                </div>
                                <div class="modal fade" id="deleteteacher{{$teacher->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Modal title</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <p>Haqiqatdan ham {{$teacher->name}} ni o'chirmoqchimisiz???</p>
                                        </div>
                                        <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yo'q</button>
                                            <a href="/teacherdelete/{{$teacher->id}}" class="btn btn-primary">Xa</a>
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
