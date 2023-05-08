@extends('layout.main')

@section('content')

<!-- ======= Hero Section ======= -->
<section id="hero" class="d-flex align-items-center" style="height: 40vh">
  <div class="container" data-aos="zoom-out" data-aos-delay="100">
    <h1>KONTAK</h1>
    <h2 class="mt-2">SMA NEGERI 21 BANDUNG</h2>
  </div>
</section><!-- End Hero -->

<main id="main">

  <!-- ======= Contact Section ======= -->
  <section id="contact" class="contact">
    <div class="container" data-aos="fade-up">

      <div class="section-title">
        <h2>Kontak</h2>
        <h3><span>Kontak Kami</span></h3>
      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">
        <div class="col-lg-6">
          <div class="info-box mb-4">
            <i class="bx bx-map"></i>
            <h3>Alamat Sekolah</h3>
            <p>Jl. Manjahlega No.30, Margasari, Kec. Buahbatu, Kota Bandung, Jawa Barat 40286</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-envelope"></i>
            <h3>Email</h3>
            <p>sman21bdg@yahoo.co.id</p>
          </div>
        </div>

        <div class="col-lg-3 col-md-6">
          <div class="info-box  mb-4">
            <i class="bx bx-phone-call"></i>
            <h3>Telefon</h3>
            <p>(022) 7565909</p>
          </div>
        </div>

      </div>

      <div class="row" data-aos="fade-up" data-aos-delay="100">

        <div class="col-lg-6 ">
          <iframe class="mb-4 mb-lg-0" src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d15841.775776528775!2d107.6712909!3d-6.9568431!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0xeba41fbacd734650!2sSMA%20Negeri%2021%20Bandung!5e0!3m2!1sen!2sid!4v1668838675064!5m2!1sen!2sid" width="600" frameborder="0" style="border:0; width: 100%; height: 384px;" allowfullscreen></iframe>
        </div>

        <div class="col-lg-6">
          <form action="forms/contact.php" method="post" role="form" class="php-email-form">
            <div class="row">
              <div class="col form-group">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" required>
              </div>
              <div class="col form-group">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" required>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" required>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" placeholder="Message" required></textarea>
            </div>
            <div class="my-3">
              <div class="loading">Loading</div>
              <div class="error-message"></div>
              <div class="sent-message">Your message has been sent. Thank you!</div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>

    </div>
  </section><!-- End Contact Section -->

</main><!-- End #main -->  
@endsection