@extends('layout.main')

@section('content')
  
  <main id="main" data-aos="fade-up">
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 40vh">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>BERITA TERKINI</h1>
      <h2 class="mt-2">SMA NEGERI 21 BANDUNG</h2>
      <p>SMAN TERBAIK DIKOTA BANDUNG</p>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>Berita Terkini</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li>Berita Terkini</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->

    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="row">

          @foreach ($berita as $data)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <a href="{{'/berita/'.$data -> url_slug}}">
            <div class="member">
              <div class="member-img">
                <img src="img/information/{{ $data->sampul }}" class="img-fluid" alt="" style="width: 100%; height: 300px; object-fit: cover">
              </div>
              <div class="member-info">
                <h4>{{ $data -> judul }}</h4>
                <div class="row">
                  <div class="col col-lg-8 col-md-6 ">
                      <i class="bi-calendar-event-line"></i>
                      <p>{{ $data -> created_at }}</p>
                  </div>
                  <div class="col col-lg-4 col-md-6 align-text-right">
                      <i class="right-icons ri-user-line"></i>
                      <p>Admin</p>
                  </div>
                </div>
                <span class="limit-chars">{{ strip_tags($data -> isi) }}</span>
              </div>
            </div>
          </a>
          </div>
          @endforeach
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
  @endsection