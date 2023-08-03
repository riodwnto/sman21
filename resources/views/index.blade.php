@extends('layout.main')

@section('content')
  <!-- ======= Hero Section ======= -->
  <section id="hero" class="d-flex align-items-center">
    <div class="container" data-aos="zoom-out" data-aos-delay="100">
      <h1>SMA NEGERI 21 BANDUNG</span></h1>
      <h2 class="mt-2">Selamat Datang di Website Resmi SMA Negeri 21 Bandung</h2>
      <h3 class="mt-1">Salikur Hebat, Salikur Juara</h3>
    </div>
    <div class="d-flex position-absolute bottom-0 start-50 translate-middle-x mb-5">
      <a href="#counts" class="btn-get-started scrollto btn btn-outline-dark"><i class="bi bi-arrow-down"></i></a>
    </div>
  </section><!-- End Hero -->

  <main id="main">

    <!-- ======= Counts Section ======= -->
    <section id="counts" class="counts">
      <div class="container" data-aos="fade-up">
        
        <div class="section-title">
          <h2>Informasi Umum</h2>
          <h3>SMA NEGERI <span>21 BANDUNG</span></h3>
          <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. Sapiente beatae corrupti placeat quas doloremque iusto, consequuntur ad voluptates. Impedit architecto autem fugit temporibus debitis eius ea excepturi esse distinctio. Fuga.</p> 
        </div>

        <div class="row">

          <div class="col-lg-3 col-md-6">
            <div class="count-box">
              <i class="bi bi-people"></i>
              <span data-purecounter-start="0" data-purecounter-end="1000" data-purecounter-duration="1" data-purecounter-="-" class="purecounter"></span>
              <p>Peserta Didik</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-md-0">
            <div class="count-box">
              <i class="bi bi-person-check"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $guru_count }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Tenaga Pendidik</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-person-workspace"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $tu_count }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Tata Usaha</p>
            </div>
          </div>

          <div class="col-lg-3 col-md-6 mt-5 mt-lg-0">
            <div class="count-box">
              <i class="bi bi-universal-access"></i>
              <span data-purecounter-start="0" data-purecounter-end="{{ $ekskul_count }}" data-purecounter-duration="1" class="purecounter"></span>
              <p>Ekstrakulikuler</p>
            </div>
          </div>

        </div>

      </div>
    </section><!-- End Counts Section -->

    <!-- ======= Testimonials Section ======= -->
    <section id="testimonials" class="testimonials">
      <div class="container" data-aos="zoom-in">
        <div class="testimonial-item">
          <img src="assets/img/dani.jpg" class="testimonial-img" alt="">
          <h3>Dani Wardani, S.Pd., M.M.Pd</h3>
          <h4>Kepala SMA Negeri 21 Bandung</h4>
          <p>
            <i class="bx bxs-quote-alt-left quote-icon-left"></i>
            Assalamualaikum Wr. Wb.<br>
            Masa Pandemi seperti ini merupakan masa – masa sulit dimana Berkerja, Belajar, dan Beribadahpun di Rumah, Tak terkecuali Bersilahturahmi, Namun hal – hal berikut tidak menjadikan kita untuk bersantai, apalagi sampai melalaikan Protokol Kesehatan, Justru jadikan momentum ini untuk lebih meningkatkan Kepatuhan dan Kewaspadaan kita terhadap Virus Corona.<br>Semoga kita selalu diberikan kesehatan.
            <i class="bx bxs-quote-alt-right quote-icon-right"></i>
          </p>
        </div>
      </div>
    </section><!-- End Testimonials Section -->
    
    <!-- ======= Team Section ======= -->
    <section id="team" class="team section-bg">
      <div class="container" data-aos="fade-up">

        <div class="section-title">
          <h2>Berita</h2>
          <h3>Berita <span>Terkini</span></h3>
          <p>Ut possimus qui ut temporibus culpa velit eveniet modi omnis est adipisci expedita at voluptas atque vitae autem.</p>
        </div>

        <div class="row">
          @foreach ($berita as $data)
          <div class="col-lg-3 col-md-6 d-flex align-items-stretch" data-aos="fade-up" data-aos-delay="100">
            <a href="{{'berita/'.$data -> url_slug}}">
            <div class="member">
              <div class="member-img">
                <img src="img/information/{{ $data->sampul }}" class="img-fluid" alt="" style="width: 100%; height: 300px; object-fit: cover">
              </div>
              <div class="member-info">
                <h4>{{ $data -> judul }}</h4>
                <div class="row">
                  <div class="col col-lg-8 col-md-6 ">
                      <p>{{ $data -> created_at }}</p>
                  </div>
                  <div class="col col-lg-4 col-md-6 ">
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

        <div class="d-flex justify-content-center">
          <a href="berita" class="btn btn-outline-dark">Berita Lainnya</a>
        </div>

      </div>
    </section><!-- End Team Section -->

  </main><!-- End #main -->
@endsection