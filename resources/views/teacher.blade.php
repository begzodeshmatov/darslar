@extends('layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kasblarga o'qitish</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Asosiy</a></li>
                    <li class="breadcrumb-item active">Kasbga o'qitish</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kasblar haqida</h5>
                            <button
                                class="btn btn--add btn btn-primary position-absolute top-0 end-0 mt-3  translate-middle-x"
                                type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-plus"></i></button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kasbga o'qitish Qo'shish
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Name</label>
                                                    <input type="text" name="name" class="form-control"
                                                        placeholder="Ism kirit...">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Surname</label>
                                                    <input type="text" name="surname" class="form-control"
                                                        placeholder="Familiya kirit...">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Manzil</label>
                                                    <input type="text" name="manzil" class="form-control"
                                                        placeholder="Manzil kirit...">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Image</label>
                                                    <input type="file" name="image" class="form-control"
                                                        accept=".png,.jpg">
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Telefon raqam</label>
                                                    <input type="text" name="tel_raqam" class="form-control"
                                                        placeholder="Telefon raqam kirit...">
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
                                    @foreach ($teachers as $teacher)
                                        <tr>
                                            <th scope="row">wg</th>
                                            <td>wgewgerw</td>
                                            <td>ewgewg</td>
                                            <td>ewgewg</td>

                                            <td>erge</td>
                                            <td>
                                                <a href="#" class="btn btn-success" data-bs-toggle="modal"
                                                    data-bs-target="#exampleModal{{ $teacher->id }}">Edit</a>
                                                <a href="#" class="btn btn-danger" data-bs-toggle="modal"
                                                    data-bs-target="#deleteteacher{{ $teacher->id }}">Delete</a>

                                                <!-- Modal -->
                                                <div class="modal fade" id="exampleModal{{ $teacher->id }}" tabindex="-1"
                                                    aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Teacher
                                                                    tahrirlash</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <form action="/teacherEditSave/{{ $teacher->id }}"
                                                                    method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Name</label>
                                                                        <input type="text" name="name"
                                                                            class="form-control"
                                                                            value="{{ $teacher->name }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Surname</label>
                                                                        <input type="text" name="surname"
                                                                            class="form-control"
                                                                            value="{{ $teacher->surname }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Manzil</label>
                                                                        <input type="text" name="manzil"
                                                                            class="form-control"
                                                                            value="{{ $teacher->manzil }}">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Image</label>
                                                                        <input type="file" name="image"
                                                                            class="form-control">
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Telefon raqam</label>
                                                                        <input type="text" name="tel_raqam"
                                                                            class="form-control"
                                                                            value="{{ $teacher->tel_raqam }}">
                                                                    </div>
                                                                    <button type="submit"
                                                                        class="btn btn-primary">Tahrirlash</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="modal fade" id="deleteteacher{{ $teacher->id }}"
                                                    tabindex="-1" aria-labelledby="exampleModalLabel"
                                                    aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">Modal
                                                                    title</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Haqiqatdan ham {{ $teacher->name }} ni
                                                                    o'chirmoqchimisiz???</p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Yo'q</button>
                                                                <a href="/teacherdelete/{{ $teacher->id }}"
                                                                    class="btn btn-primary">Xa</a>
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
