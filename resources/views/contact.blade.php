@extends('layouts.welcomeapp')

@section('content')
<div class="untree_co-hero overlay" style="background-image: url('images/img-school-2-min.jpg');">
    <div class="container">
      <div class="row align-items-center justify-content-center">
        <div class="col-12">
          <div class="row justify-content-center ">
            <div class="col-lg-6 text-center ">
              <h1 class="mb-4 heading text-white" data-aos="fade-up" data-aos-delay="100">Contact Us</h1>
              <div class="mb-5 text-white desc mx-auto" data-aos="fade-up" data-aos-delay="200">
                <p>Another free template by <a href="https://untree.co/" target="_blank" class="link-highlight">Untree.co</a>. Far far away, behind the word mountains, far from the countries Vokalia and Consonantia, there live.</p>
              </div>

              <p class="mb-0" data-aos="fade-up" data-aos-delay="300"><a href="#" class="btn btn-secondary">Explore courses</a></p>

            </div>


          </div>

        </div>

      </div> <!-- /.row -->
    </div> <!-- /.container -->

  </div> <!-- /.untree_co-hero -->




  <div class="untree_co-section">
    <div class="container">

      <div class="row mb-5">
        <div class="col-lg-4 mb-5 order-2 mb-lg-0" data-aos="fade-up" data-aos-delay="100">
          <div class="contact-info">

            <div class="address mt-4">
              <i class="icon-room"></i>
              <h4 class="mb-2">Location:</h4>
              <p>43 Raymouth Rd. Baltemoer, London 3910</p>
            </div>

            <div class="open-hours mt-4">
              <i class="icon-clock-o"></i>
              <h4 class="mb-2">Open Hours:</h4>
              <p>
                Sunday-Friday:<br>
                11:00 AM - 2300 PM
              </p>
            </div>

            <div class="email mt-4">
              <i class="icon-envelope"></i>
              <h4 class="mb-2">Email:</h4>
              <p>info@Untree.co</p>
            </div>

            <div class="phone mt-4">
              <i class="icon-phone"></i>
              <h4 class="mb-2">Call:</h4>
              <p>+1 1234 55488 55</p>
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
                <input type="email" class="form-control" name="email" placeholder="Your Email">
              </div>
              <div class="col-6 mb-3">
                <input type="text" class="form-control" name="book_name" placeholder="Book_name">
              </div>
              <div class="col-12 mb-3">
                <textarea name="surname" id="" cols="30" rows="7" class="form-control" placeholder="Message"></textarea>
              </div>

              <div class="col-12">
                <input type="submit" value="Send Message" class="btn btn-primary">
              </div>
            </div>
          </form>
        </div>
      </div>

      
    </div>
  </div> <!-- /.untree_co-section -->
@endsection