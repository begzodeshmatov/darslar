 @extends('layouts.app')

@section('content')
    <main id="main" class="main">

        <div class="pagetitle">
            <h1>Murojaatlar</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="/home">Asosiy</a></li>
                    <li class="breadcrumb-item active">Murojaatlar</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="section">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title">Kitoblar haqida</h5>
                            <a href="/exportBooks" class=" btn btn-primary" style="position: absolute; right: 90px; margin-top: -46px;">Export</a>
                            <a href="#" class=" btn btn-primary" style="position: absolute; right: 190px; margin-top: -46px;" data-bs-toggle="modal"
                            data-bs-target="#bookimport">Import</a> 
                            <!-- import modal -->
                            <div class="modal fade" id="bookimport" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kitoblar Qo'shish
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/import" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">Fayl yuklang:</label>
                                                    <input type="file" class="form-control" name="file">
                                                </div>
                                                <button type="submit" class="btn btn-primary">Qo'shish</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <button
                                class="btn btn--add btn btn-primary position-absolute top-0 end-0 mt-3  translate-middle-x"
                                type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i
                                    class="bi bi-plus"></i></button>
                            <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel"
                                aria-hidden="true">
                                <div class="modal-dialog">
                                    <div class="modal-content">
                                        <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kitoblar Qo'shish
                                            </h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal"
                                                aria-label="Close"></button>
                                        </div>
                                        <div class="modal-body">
                                            <form action="/bookSave" method="POST" enctype="multipart/form-data">
                                                @csrf
                                                <div class="mb-3">
                                                    <label class="form-label">F.I.SH:</label>
                                                    <input type="text" class="form-control" name="name"
                                                        placeholder="F.I.SH" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Manzil:</label>
                                                    <input type="text" class="form-control" name="email"
                                                        placeholder="Manzil" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Kitob nomi:</label>
                                                    <input type="text" class="form-control" name="book_name"
                                                        placeholder="Kitob nomi" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Telefon raqam:</label>
                                                    <input type="number" class="form-control" name="tel_raqam"
                                                        placeholder="Telefon nomer" required>
                                                </div>
                                                <div class="mb-3">
                                                    <label class="form-label">Message:</label>
                                                    <textarea type="text" class="form-control" name="surname"
                                                        placeholder="Message" required></textarea>
                                                </div>
                                                <button class="btn btn-primary">Qo'shish</button>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <!-- Default Table -->
                            <table class="table table-bordered table-striped table-hover">
                                <thead>
                                    <tr align="center">
                                        <th scope="col">№</th>
                                        <th scope="col">F.I.SH</th>
                                        <th scope="col">Manzil</th>
                                        <th scope="col">Kitob nomi</th>
                                        <th scope="col">Tel nomer</th>
                                        <th scope="col">Xabarlar</th>
                                        <th scope="col">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($kitoblar as $kasb)
                                        <tr>
                                            <th scope="row">{{ $count++ }}</th>
                                            <td>{{ $kasb->name }}</td>
                                            <td>{{ $kasb->email }}</td>
                                            <td>{{ $kasb->book_name }}</td>
                                            <td>{{ $kasb->tel_raqam }}</td>
                                            <td>{{ $kasb->surname }}</td>
                                            <td>
                                                <a data-bs-toggle="modal" class="btn btn-primary"
                                                    data-bs-target="#exampleModal{{ $kasb->id }}" href="#"><i
                                                        class='bx bx-pencil'></i></a>
                                                <a data-bs-toggle="modal" class="btn btn-danger"
                                                    data-bs-target="#bookdelete{{ $kasb->id }}" href="#"><i
                                                        class='bx bx-trash'></i></a>

                                                <!-- Modal -->

                                                <div class="modal fade" id="exampleModal{{ $kasb->id }}" tabindex="-1"
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
                                                                <form action="/booksEditSave/{{ $kasb->id }}"
                                                                    method="POST">
                                                                    @csrf
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Ism:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="name" value="{{ $kasb->name }}"
                                                                            placeholder="Name" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Familiya:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="surname" value="{{ $kasb->surname }}"
                                                                            placeholder="Familiya" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Manzil:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="email" value="{{ $kasb->email }}"
                                                                            placeholder="Manzil" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Book name:</label>
                                                                        <input type="text" class="form-control"
                                                                            name="book_name"
                                                                            value="{{ $kasb->book_name }}"
                                                                            placeholder="Book name" required>
                                                                    </div>
                                                                    <div class="mb-3">
                                                                        <label class="form-label">Telefon raqam:</label>
                                                                        <input type="tel" class="form-control"
                                                                            name="tel_raqam"
                                                                            value="{{ $kasb->tel_raqam }}"
                                                                            placeholder="Telefon nomer" required>
                                                                    </div>
                                                                    <button class="btn btn-primary">Tahrirlash</button>
                                                                </form>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>

                                                <!-- Modal -->
                                                <div class="modal fade" id="bookdelete{{ $kasb->id }}"
                                                    data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1"
                                                    aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                                    <div class="modal-dialog">
                                                        <div class="modal-content">
                                                            <div class="modal-header">
                                                                <h1 class="modal-title fs-5" id="exampleModalLabel">
                                                                    O'chirish</h1>
                                                                <button type="button" class="btn-close"
                                                                    data-bs-dismiss="modal" aria-label="Close"></button>
                                                            </div>
                                                            <div class="modal-body">
                                                                <p>Haqiqatdan ham {{ $kasb->name }} ni o'chirmoqchimisiz
                                                                </p>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary"
                                                                    data-bs-dismiss="modal">Yo'q</button>
                                                                <a href="/bookdelete/{{ $kasb->id }}"
                                                                    class="btn btn-primary">Xa</a>
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                    @endforeach


                                </tbody>

                            </table>
                            <!-- End Default Table Example -->
                            {{ $kitoblar->links() }}
                        </div>
                    </div>

                </div>


            </div>
        </section>

    </main><!-- End #main -->
@endsection
