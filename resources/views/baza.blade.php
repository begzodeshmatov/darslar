@extends('layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Kitoblar</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Asosiy</a></li>
                    <li class="breadcrumb-item active">Kitoblar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->
        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card px-3 py-0">
                        <div class="card-body">
                            <h5 class="card-title">Kitoblar haqida</h5>
                            <a href="/export" class=" btn btn-primary btn--add translate-middle-x position-absolute top-0 end-50 mt-3">Export</a>
                            <button
                                class="btn btn--add btn btn-primary position-absolute top-0 end-0 mt-3  translate-middle-x"
                                type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-plus"></i></button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kitoblar qo'shish</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/bazaSave" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <fieldset>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Kitob nomini
                                                            kiriting</label>
                                                        <input type="text" id="disabledTextInput" name="name"
                                                            class="form-control" placeholder="Name">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Muallifni
                                                            kiriting</label>
                                                        <input type="text" id="disabledTextInput" name="muallif"
                                                            class="form-control" placeholder="Muallif">
                                                    </div>
                                                    <div class="mb-3">
                                                        <label for="disabledTextInput" class="form-label">Image </label>
                                                        <input type="file" id="disabledTextInput" name="image"
                                                            class="form-control">
                                                    </div>
                                                    <button type="submit" class="btn btn-primary">Saqlash</button>
                                                </fieldset>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div><!-- End Page Title -->

                        <table class="table table-bordered table-striped table-hover">
                            <thead>
                                <tr>
                                    <th scope="col">#</th>
                                    <th scope="col">Name</th>
                                    <th scope="col">Muallif</th>
                                    <th scope="col">Image</th>
                                    <th scope="col">Amallar</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($baza as $b)
                                    <tr>
                                        <th scope="row">{{ $count++ }}</th>
                                        <td>{{ $b->name }}</td>
                                        <td>{{ $b->muallif }}</td>
                                        <td>
                                            <img src="images/{{ $b->image }}" alt="" width="50"
                                                height="50">
                                        </td>
                                        <td>
                                            <!-- Delete tugmasi -->
                                            <a href="#" style="font-size:20px;color:black;" data-bs-toggle="modal"
                                                data-bs-target="#deleteModalBaza{{ $b->id }}">
                                                <i class='bx bx-trash'></i>
                                            </a>
                                            <!-- Edit tugmasi -->
                                            <a href="#" data-bs-toggle="modal"
                                                data-bs-target="#editModalBaza{{ $b->id }}">
                                                <i class='bx bxs-edit-alt' style='color:#050cf9;font-size:20px;'></i>
                                            </a>



                                            <!-- Delete tasdiqlash oynasi (modal) -->

                                            <div class="modal fade" id="deleteModalBaza{{ $b->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h5 class="modal-title" id="exampleModalLabel">O'chirishni
                                                                tasdiqlash
                                                            </h5>
                                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                                aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            {{ $b->name }} foydalanuvchisini o'chirishni xohlaysizmi?
                                                        </div>
                                                        <div class="modal-footer">
                                                            <button type="button" class="btn btn-secondary"
                                                                data-bs-dismiss="modal">Bekor
                                                                qilish</button>
                                                            <a href="/bazaDelete/{{ $b->id }}"
                                                                class="btn btn-danger">O'chirish</a>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="modal fade" id="editModalBaza{{ $b->id }}" tabindex="-1"
                                                aria-labelledby="exampleModalLabel" aria-hidden="true">
                                                <div class="modal-dialog">
                                                    <div class="modal-content">
                                                        <div class="modal-header">
                                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kitoblar
                                                                tahrirlash
                                                            </h1>
                                                            <button type="button" class="btn-close"
                                                                data-bs-dismiss="modal" aria-label="Close"></button>
                                                        </div>
                                                        <div class="modal-body">
                                                            <form action="/bazaEdit/{{ $b->id }}" method="POST"
                                                                enctype="multipart/form-data">
                                                                @csrf
                                                                <div class="mb-3">
                                                                    <label>Name</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $b->name }}" name="name"
                                                                        id="">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Muallif</label>
                                                                    <input type="text" class="form-control"
                                                                        value="{{ $b->muallif }}" name="muallif"
                                                                        id="">
                                                                </div>
                                                                <div class="mb-3">
                                                                    <label>Image</label>
                                                                    <input type="file" class="form-control"
                                                                        value="{{ $b->image }}" name="image"
                                                                        id="">
                                                                </div>

                                                                <button type="submit"
                                                                    class="btn btn-primary">Tahrirlash</button>
                                                            </form>
                                                        </div>

                                                    </div>
                                                </div>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                        <!-- Sahifalash linklari -->
                        {{ $baza->links() }}
                    </div>



        </section>

    </main><!-- End #main -->
@endsection
