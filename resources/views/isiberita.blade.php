@extends('layout.main')

@section('content')

  <main id="main" data-aos="fade-up">

    <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center" style="height: 40vh">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>BERITA TERKINI</h1>
      <h2 class="mt-2">SMA NEGERI 21 BANDUNG</h2>
    </div>
  </section><!-- End Hero -->

    <!-- ======= Breadcrumbs ======= -->
    <section class="breadcrumbs">
      <div class="container">

        <div class="d-flex justify-content-between align-items-center">
          <h2>{{ $berita-> judul }}</h2>
          <ol>
            <li><a href="/">Home</a></li>
            <li><a href="/berita">Berita Terkini</a></li>
            <li>{{ $berita-> judul }}</li>
          </ol>
        </div>

      </div>
    </section><!-- End Breadcrumbs -->
    
    <section class="inner-page">
      <div class="container">
        <p>{!! $berita-> isi !!}</p>
      </div>
    </section>

  </main><!-- End #main -->
  @endsection