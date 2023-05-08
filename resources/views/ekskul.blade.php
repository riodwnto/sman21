@extends('layout.main')

@section('content')

  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 40vh">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>EKSTRAKULIKULER</h1>
      <h2 class="mt-2">SMA NEGERI 21 BANDUNG</h2>
    </div>
  </section><!-- End Hero -->

  <main id="main">

  <!-- ======= About Section ======= -->
  <section id="team" class="team section-bg">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Ekstrakulikuler</h2>
        <h3>SMA NEGERI <span>21 BANDUNG</span></h3>
      </div>

      <div class="row">
        @foreach ($ekskul as $data)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <div class="member">
              <div class="member-img">
                <img src="img/{{ $data->foto }}" class="img-fluid" alt="" style="width: 100%; height: 300px; object-fit: cover">
              </div>
              <div class="member-info">
                <h4>{{ $data->judul }}</h4>
              </div>
            </div>
          </div>
        @endforeach
      </div>
  </div>
</section><!-- End About Section -->

</main><!-- End #main -->
@endsection