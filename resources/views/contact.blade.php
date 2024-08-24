@extends('layouts.welcomeapp')

@section('content')
<div class="untree_co-hero overlay" style="background-image: url('images/img-school-2-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Biz bilan bog`lanish</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                <p>Kitob ol - spark yut <br> Mavlono:  <strong>" Begzod "</strong> qalamiga mansub. </p>
              </div>

              <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="#boglanish" class="btn btn-secondary">Bog`lanish</a></p>

            </div>


          </div>

        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->




  <div class="untree_co-section" id="boglanish">
    <div class="container">

      <div class="row mb-5">
        <div class="col-lg-4 mb-5 order-2 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
          <div class="contact-info">

            <div class="address mt-4">
              <i class="icon-room"></i>
              <h4 class="mb-2">Manzil:</h4>
              <p>Jizzax viloyati, Baxmal tumani, Navbahor MFY, Do'smat qishlog'i, 173-uy. Zayniddin Muhammadiyevlar xonadoni.</p>
            </div>

            <div class="open-hours mt-4">
              <i class="icon-clock-o"></i>
              <h4 class="mb-2">Ish vaqtlari: </h4>
              <p>
                Seshanba, payshanba, shanba va yakshanba
                <br> kunlari soat 14:00 dan 18:00 gacha.
              </p>
            </div>

            <div class="email mt-4">
              <i class="icon-envelope"></i>
              <h4 class="mb-2">Email:</h4>
              <p>@Reader_f_r_v_r_lib_an <br>@uzcoder96@gmail.com</p>
            </div>

            <div class="phone mt-4">
              <i class="icon-phone"></i>
              <h4 class="mb-2">Tel:</h4>
              <p>+998 88 523 97 99 <br>+998(97) 2606909</p>
            </div>

          </div>
        </div>
        <div class="col-lg-7 mr-auto order-1" data-aos="fade-up" data-aos-delay="200">
          <form action="/bookSave" method="POST">
            @csrf
            <div class="row">
              <div class="col-6 mb-3">
                <input type="text" class="form-control" name="name" placeholder="F.I.O">
              </div>
              <div class="col-6 mb-3 input-group">
                <span class="input-group-text border-1 bg-light" id="basic-addon1">+998</span>
                <input type="text" class="form-control" name="tel_raqam"  placeholder="(97)2606909" aria-label="Username" aria-describedby="basic-addon1">
                </div>
              <div class="col-6 mb-3">
                <input type="email" class="form-control" name="email" placeholder="Manzilingiz">
              </div>
              <div class="col-6 mb-3">
                <input type="text" class="form-control" name="book_name" placeholder="Kitob nomi">
              </div>
              <div class="col-12 mb-5">
                <textarea name="surname" id="" cols="30" rows="7" class="form-control" placeholder="Xabarlar"></textarea>
              </div>

              <div class="col-12">
                <input type="submit" value="Yuborish" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>

      
    </div>
  </div> <!-- /.untree_co-section -->
@endsection