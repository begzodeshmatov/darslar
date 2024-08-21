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
          <button class="btn btn--add btn btn-primary position-absolute top-0 end-0 mt-3  translate-middle-x" type="button" data-bs-toggle="modal" data-bs-target="#exampleModal"><i class="bi bi-plus"></i></button>
          <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
                 <div class="modal-dialog">
                    <div class="modal-content">
                        <div class="modal-header">
                            <h1 class="modal-title fs-5" id="exampleModalLabel">Kasbga o'qitish Qo'shish</h1>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                        </div>
                            <div class="modal-body">
                                <form action="/kasbSave" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    <div class="mb-3">
                                        <label class="form-label">F.I.O</label>
                                        <input type="text" class="form-control" name="name" placeholder="F.I.O" required>
                                    </div>

                                    <div class="mb-3">
                                        <label class="form-label">Stipendiya</label>
                                        <input type="text" class="form-control" name="stipendiya" placeholder="Stipendiya" required>
                                    </div>
                                    <!-- <div class="mb-3">
                                        <label class="form-label">Type</label>
                                        <input type="text" class="form-control" name="type" placeholder="Type" required>
                                    </div> -->
                                    <div class="mb-3">
                                        <label class="form-label">Muddat</label>
                                        <input type="text" class="form-control" name="muddat"required>
                                    </div>
                                    <div class="mb-3">
                                        <label class="form-label">Telefon raqam</label>
                                        <input type="tel" class="form-control" name="tel_raqam" placeholder="Telefon nomer" required>
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
              <tr>
                <th scope="col">№</th>
                <th scope="col">F.I.O</th>
                <th scope="col">Stipendiya</th>
                <th scope="col">Muddat</th>
                <th scope="col">Telefon raqam</th>
                <th scope="col">Amallar</th>
              </tr>
            </thead>
            <tbody>
               @foreach($library as $kasb)
              <tr>
                <th scope="row">{{$kasb->id}}</th>
                <td>{{$kasb->name}}</td>
                <td>{{$kasb->stipendiya}}</td>
                <td>{{$kasb->muddat}}</td>
                <td>{{$kasb->tel_raqam}}</td>
                <td>
                  <a  data-bs-toggle="modal" class="btn btn-primary" data-bs-target="#exampleModal{{$kasb->id}}" href="#"><i class='bx bx-pencil'></i></a>
                  <a  data-bs-toggle="modal" class="btn btn-danger" data-bs-target="#deleteKasb{{$kasb->id}}" href="#"><i class='bx bx-trash' ></i></a>

  <!-- Modal -->

<div class="modal fade" id="exampleModal{{$kasb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h1 class="modal-title fs-5" id="exampleModalLabel">Murojaat Edit</h1>
        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
      </div>
      <div class="modal-body">
      <form action="/kasbEditSave/{{$kasb->id}}" method="POST">
                    @csrf
                    <div class="mb-3">
                        <label class="form-label">F.I.O</label>
                        <input type="text" class="form-control" name="name" value="{{$kasb->name}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Telefon raqami</label>
                        <input type="text" class="form-control" name="tel_raqam" value="{{$kasb->tel_raqam}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Stipendiya</label>
                        <input type="text" class="form-control" name="stipendiya" value="{{$kasb->stipendiya}}">
                    </div>
                    <div class="mb-3">
                        <label class="form-label">Muddat</label>
                        <input type="text" class="form-control" name="muddat" value="{{$kasb->muddat}}">
                    </div>
                    <button class="btn btn-primary">Tahrirlash</button>
                </form>
      </div>
    </div>
  </div>
</div>

  <!-- Modal -->
  <div class="modal fade" id="deleteKasb{{$kasb->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
              <div class="modal-header">
                  <h1 class="modal-title fs-5" id="exampleModalLabel">O'chirish</h1>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
              <div class="modal-body">
                  <p>Haqiqatdan ham {{$kasb->name}} ni o'chirmoqchimisiz</p>
              </div>
              <div class="modal-footer">
                  <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Yo'q</button>
                  <a href="/deletekasb/{{$kasb->id}}" class="btn btn-primary">Xa</a>
              </div>
            </div>
        </div>
  </div>


      @endforeach


            </tbody>

          </table>
          <!-- End Default Table Example -->
        </div>
      </div>

    </div>


  </div>
</section>

</main><!-- End #main -->

@endsection