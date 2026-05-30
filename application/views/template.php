<!doctype html>
<html class="no-js" lang="en">
<head>
   <meta charset="utf-8">
   <meta http-equiv="x-ua-compatible" content="ie=edge">
   <title><?= $title; ?></title>
   <meta name="keywords" content="<?= $keywords; ?>">
   <?php
   if (isset($description) && !empty($description)) {
      $metaDescription = (strlen($description) > 160) ? substr($description, 0, 157) . '...' : $description;
   } else {
      $metaDescription = '';
   }
   ?>
   <meta name="description" content="<?= $metaDescription ?>">
   <meta name="author" content="floria.id">
   <meta property="og:title" content="<?= $title; ?>">
   <meta property="og:description" content="<?= $description; ?>">
   <meta property="og:image" content="https://floria.id/template/assets/img/logo/logo.png">
   <meta property="og:url" content="https://floria.id<?= current_url(); ?>">
   <meta property="og:type" content="website">
   <link rel="canonical" href="https://floria.id/<?= isset($canonical) ? $canonical : '' ?>">
   <meta name="viewport" content="width=device-width, initial-scale=1">
   <link rel="shortcut icon" type="image/png" href="<?= base_url(); ?>template/assets/images/favicon.png">
   <link rel="preconnect" href="https://fonts.googleapis.com">
   <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
   <link rel="stylesheet" href="<?= base_url(); ?>template/assets/css/style.min.css">
   <?php 
   $phone_number = '6285711289770';
   ?>
   <!-- Google tag (gtag.js) -->
   <script async src="https://www.googletagmanager.com/gtag/js?id=AW-16850241173">
   </script>
   <script>
     window.dataLayer = window.dataLayer || [];
     function gtag(){dataLayer.push(arguments);}
     gtag('js', new Date());

     gtag('config', 'AW-16850241173');
   </script>
   <!-- Event snippet for Kunjungan halaman conversion page -->
   <script>
     gtag('event', 'conversion', {
         'send_to': 'AW-16850241173/CEt_CPbbxpgaEJWN6eI-',
         'value': 1.0,
         'currency': 'IDR'
     });
   </script>
</head>
<body>
   <div class="site-wrapper overflow-hidden">
      <div class="preloader ">
         <div class="preloader-inner">
            <span class="loader"></span>
         </div>
      </div>
      <div class="progress-wrap">
         <svg class="progress-circle svg-content" width="100%" height="100%" viewBox="-1 -1 102 102">
            <path d="M50,1 a49,49 0 0,1 0,98 a49,49 0 0,1 0,-98" />
         </svg>
      </div>
      <header>
         <a aria-label="link" href="https://api.whatsapp.com/send?phone=<?= $phone_number ?>&text=Hi%20Floria.id," class="float" target="_blank"><img src="<?= base_url(); ?>template/assets/img/icon/hubungi-wa.webp" class="fa fa-whatsapp my-float" alt="<?=$keywords?>"></a>
       <div class="header header--style-2 header__block">
         <!-- Header Bottom -->
         <div class="header__bottom header__bottom--dark" id="header-sticky">
            <div class="container header__bottom__line">
               <div class="row g-0 align-items-center justify-content-between">
                  <div class="col-xl-2 col-lg-2 col-md-3 col-sm-4 col-6">
                     <div class="logo">
                        <a href="<?=base_url()?>">
                           <img loading="lazy" src="<?= base_url(); ?>template/assets/images/logo/Logo-2.png" alt="logo">
                        </a>
                     </div>
                  </div>
                  <?php 
                  $current_page = $this->uri->segment(1);
                  ?>
                  <div class="col-xl-7 col-lg-9 d-none d-lg-block text-center">
                    <div class="main-menu main-menu--style-2 main-menu--dark">
                      <nav id="mobile-menu">
                        <ul>
                          <li class="<?= $current_page == '' ? 'current-page' : '' ?>">
                            <a href="<?=base_url()?>">Home</a>
                         </li>
                         <li class="<?= $current_page == 'profil' ? 'current-page' : '' ?>">
                            <a href="<?=base_url()?>profil">About Us</a>
                         </li>
                         <li class="<?= $current_page == 'produk' ? 'current-page' : '' ?>">
                            <a href="<?=base_url()?>produk">Product</a>
                         </li>
                         <li class="<?= $current_page == 'jasa' ? 'current-page' : '' ?>">
                            <a href="<?=base_url()?>jasa">Services</a>
                         </li>
                         <li class="<?= $current_page == 'informasi' ? 'current-page' : '' ?>">
                            <a href="<?=base_url()?>informasi">Blog</a>
                         </li>
                         <li class="<?= $current_page == 'kontak' ? 'current-page' : '' ?>">
                            <a href="<?=base_url()?>kontak">Contact Us</a>
                         </li>
                      </ul>
                   </nav>
                </div>
             </div>
             <div class="col-xl-3 col-lg-1 col-md-9 col-sm-8 col-6">
               <div
               class="header__bottom__right header__bottom__right--dark header__widgets d-flex align-items-center justify-content-end">
               <a href="<?=base_url()?>kontak" class="cl-btn cl-btn--secondary cl-btn--header d-none d-xl-flex">get
                  a free
               quote</a>
               <div
               class="header__hamburger ml-50 d-flex align-items-center justify-content-center d-xl-none">
               <button type="button" id="al" aria-label="Search" data-bs-toggle="modal" data-bs-target="#offcanvasmodal"
               class="hamurgetp-btn">
               <span></span>
               <span></span>
               <span></span>
            </button>
         </div>
      </div>
   </div>
</div>
</div>
</div>
</div>
</header>
<div class="offcanvas__area">
   <div class="modal fade" id="offcanvasmodal" tabindex="-1" aria-labelledby="offcanvasmodal" aria-hidden="true">
      <div class="modal-dialog">
         <div class="modal-content">
            <div class="offcanvas__wrapper">
               <div class="offcanvas__content">
                  <div class="offcanvas__top mb-20 d-flex justify-content-between align-items-center">
                     <div class="offcanvas__logo logo">
                        <a href="<?=base_url()?>">
                           <img loading="lazy" src="<?= base_url(); ?>template/assets/images/logo/logo.png" alt="logo">
                        </a>
                     </div>
                     <div class="offcanvas__close">
                        <button class="offcanvas__close-btn" data-bs-toggle="modal"
                        data-bs-target="#offcanvasmodal">
                        <i class="fal fa-times"></i>
                     </button>
                  </div>
               </div>
               <div class="mobile-menu fix"></div>
               <div class="offcanvas__text d-none d-lg-block">
               </div>
               <div class="offcanvas__map d-none d-lg-block mb-15">
                  <iframe
                  src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d50538.87686841975!2d-105.8840802!3d37.6567312!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x8715d4023af5b84b%3A0xf54d8cfc70c2f644!2sMosca%2C%20CO%2081146%2C%20USA!5e0!3m2!1sen!2sbd!4v1710188172636!5m2!1sen!2sbd"
                  width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy"
                  referrerpolicy="no-referrer-when-downgrade"></iframe>
               </div>
               <div class="offcanvas__contact mt-30 mb-20">
                  <h4>Contact Info</h4>
                  <ul>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-map-marker-alt"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a target="_blank" href="#">18 Office Park, Jl. TB Simatupang No.18, Ps. Minggu, Jakarta</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="far fa-phone"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="tel:02189090882">021 8909 0882</a>
                        </div>
                     </li>
                     <li class="d-flex align-items-center">
                        <div class="offcanvas__contact-icon mr-15">
                           <i class="fal fa-envelope"></i>
                        </div>
                        <div class="offcanvas__contact-text">
                           <a href="mailto:info@floria.id">info@floria.id</a>
                        </div>
                     </li>
                  </ul>
               </div>
               <div class="offcanvas__social">
                  <ul>
                     <li><a href="https://www.facebook.com/profile.php?id=61572469612937" target="_blank"><i class="fab fa-facebook-f"></i></a></li>
                     <li><a href="https://www.instagram.com/infofloria.id/" target="_blank"><i class="fab fa-instagram"></i></a></li>
                     <li><a href="https://id.pinterest.com/infofloriaid/" target="_blank"><i class="fab fa-pinterest"></i></a></li>
                     <li><a href="https://www.linkedin.com/in/infofloria-id-6727a0347/" target="_blank"><i class="fab fa-linkedin"></i></a></li>
                  </ul>
               </div>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<?= $contents; ?>
<footer class="footer footer--style-2">
 <div
 class="footer__area footer__area--style-2 footer__area--dark-mode bg-overlay overlay-opacity-95"
 style="
 background-image: url(<?php echo base_url('template/assets/images/webp/home-1-services-bg.webp'); ?>);
 "
 >
 <div class="footer__area__contact cl-icon-box cl-icon-box--dark">
   <div class="container">
      <div class="row g-0 justify-content-center align-content-stretch flex-wrap" data-aos="fade-up"
      data-aos-duration="1500" data-aos-once="true">
      <!-- Single Footer Icon -->
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
         <div class="cl-icon-box__single d-inline-flex h-100">
            <div class="cl-icon-box__icon">
               <img loading="lazy" src="<?= base_url(); ?>template/assets/images/png/home-2/map.png" alt="<?=$keywords?>">
            </div>
            <div class="cl-icon-box__content">
               <p class="cl-icon-box__label">Whatsapp</p>
               <a aria-label="link" href="https://api.whatsapp.com/send?phone=6285711289770&text=Hi%20Floria.id," target="_blank" class="cl-icon-box__heading">0857 1128 9770</a>
            </div>
         </div>
      </div>
      <div class="col-12 col-sm-6 col-md-4 col-lg-4">
         <div class="cl-icon-box__single d-flex h-100">
            <div class="cl-icon-box__icon">
               <img loading="lazy" src="<?= base_url(); ?>template/assets/images/png/home-2/phone.png" alt="<?=$keywords?>">
            </div>
            <div class="cl-icon-box__content">
               <p class="cl-icon-box__label">Phone:</p>
               <a href="tel:+62 21 8909 0882" class="cl-icon-box__heading">021 8909 0882</a>
            </div>
         </div>
      </div>
      <div class="col-12 col-md-4 col-lg-4">
         <div class="cl-icon-box__single d-flex h-100">
            <div class="cl-icon-box__icon">
               <img loading="lazy" src="<?= base_url(); ?>template/assets/images/png/home-2/mail.png" alt="<?=$keywords?>">
            </div>
            <div class="cl-icon-box__content">
               <p class="cl-icon-box__label">Email:</p>
               <a href="mailto:boindyinfo@gmail.com"
               class="cl-icon-box__heading">info@floria.id</a>
            </div>
         </div>
      </div>
   </div>
</div>
</div>
<div class="footer__top">
   <div class="container">
      <div class="row justify-content-center">
         <!-- Single Widgets -->
         <div class="col-10 col-sm-6 col-lg-4 col-xl-4">
            <div class="footer__widget footer__widget--style-2 footer__widget--about" data-aos="fade-up"
            data-aos-duration="1500" data-aos-once="true">
            <div class="logo">
               <a href="<?=base_url()?>">
                  <img loading="lazy" src="<?= base_url(); ?>template/assets/images/logo/Logo-2.png" alt="logo">
               </a>
            </div>
            <p class="footer__widget__text">Perusahaan yang berdedikasi dalam menghadirkan keindahan alam ke dalam kehidupan melalui pembuatan, perawatan taman, dan penyewaan tanaman.</p>
            <h3 class="footer__widget__title">Alamat:</h3>
            <ul class="footer__widget__menu footer__widget__menu--style-2">
               <li>Head Office</li>
               <li>18 Office Park, Jl. TB Simatupang No.18, Ps. Minggu, Jakarta</li>
               <li>Workshop Bekasi</li>
               <li>Jl. Mandor Demong, Blok GD69, Mustikasari, Kec. Mustika Jaya, Kota Bks, Jawa Barat 17157</li>
               <li>Workshop Tangerang</li>
               <li>Cluster Persada Jayanti, Blok K No.21, Jayanti, Tangerang, Banten</li>
               <li>Workshop Serang</li>
               <li>Perumahan Graha Rinjani Blok B3 no 12, Kiara Walantaka, Kota Serang, Banten</li>
            </ul>
            <ul class="footer__widget__social-links footer__widget__social-links--style-2 d-flex align-items-center">
               <li>
                  <a href="https://www.facebook.com/profile.php?id=61572469612937" aria-label="facebook" target="_blank">
                     <i class="fa-brands fa-facebook-f"></i>
                  </a>
               </li>
               <li>
                  <a href="https://www.instagram.com/infofloria.id/" aria-label="instagram" target="_blank">
                     <i class="fa-brands fa-instagram"></i>
                  </a>
               </li>
               <li>
                  <a href="https://www.linkedin.com/in/infofloria-id-6727a0347/" aria-label="linkedin" target="_blank">
                     <i class="fa-brands fa-linkedin-in"></i>
                  </a>
               </li>
               <li>
                  <a href="https://id.pinterest.com/infofloriaid/" aria-label="pinterest" target="_blank">
                     <i class="fa-brands fa-pinterest-p"></i>
                  </a>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-10 col-sm-6 col-lg-2 col-xl-2">
         <div class="footer__widget" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
            <h3 class="footer__widget__title">Information</h3>
            <ul class="footer__widget__menu footer__widget__menu--style-3">
               <li>
                  <a href="<?=base_url()?>">Home</a>
               </li>
               <li>
                  <a href="<?=base_url()?>profil">About Us</a>
               </li>
               <li>
                  <a href="<?=base_url()?>informasi">Blog</a>
               </li>
               <li>
                  <a href="<?=base_url()?>produk">Product</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa">Our Service</a>
               </li>
               <li>
                  <a href="<?=base_url()?>kontak">Contact Us</a>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-10 col-sm-6 col-lg-2 col-xl-3">
         <div class="footer__widget" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
            <h3 class="footer__widget__title">Main Services</h3>
            <ul class="footer__widget__menu footer__widget__menu--style-2">
               <li>
                  <a href="<?=base_url()?>jasa/pembuatan-taman">Jasa Pembuatan Taman</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/perawatan-taman">Jasa Perawatan Taman</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/sewa-tanaman">Sewa Tanaman Hias</a>
               </li>

               <li>
                  <a href="<?=base_url()?>jasa/potong-rumput">Jasa Potong Rumput</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tebang-pohon">Jasa Tebang Pohon</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/pupuk">Jual Pupuk</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/media-tanam">Jual Media Tanam</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/kayu-bakar">Jual Kayu Bakar</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/gazebo-kayu-dan-bambu">Jual Gazebo Kayu & Bambu</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/tanaman-hias">Jual Tanaman Hias</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/buket-bunga">Jual Buket Bunga</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jual/karangan-bunga">Jual Karangan Bunga</a>
               </li>
            </ul>
         </div>
      </div>
      <div class="col-10 col-sm-6 col-lg-4 col-xl-3">
         <div class="footer__widget" data-aos="fade-up" data-aos-duration="1500" data-aos-once="true">
            <h3 class="footer__widget__title">Quick Link</h3>
            <ul class="footer__widget__menu footer__widget__menu--style-2">
               <li>
                  <a href="<?=base_url()?>jasa/tukang-taman-bekasi">Tukang Taman Bekasi</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tukang-taman-depok">Tukang Taman Depok</a>
               </li>

               <li>
                  <a href="<?=base_url()?>jasa/tukang-taman-bogor">Tukang Taman Bogor</a>
               </li>

               <li>
                  <a href="<?=base_url()?>jasa/tukang-taman-tangerang">Tukang Taman Tangerang</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tukang-taman-serang">Tukang Taman Serang</a>
               </li>

               <li>
                  <a href="<?=base_url()?>jasa/tukang-taman-jakarta">Tukang Taman Jakarta</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tebang-pohon-jakarta">Jasa Tebang Pohon Jakarta</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tebang-pohon-bekasi">Jasa Tebang Pohon Bekasi</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tebang-pohon-bogor">Jasa Tebang Pohon Bogor</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tebang-pohon-depok">Jasa Tebang Pohon Depok</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/tebang-pohon-tangerang">Jasa Tebang Pohon Tangerang</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/potong-rumput-jakarta">Jasa Potong Rumput Jakarta</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/potong-rumput-bekasi">Jasa Potong Rumput Bekasi</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/potong-rumput-depok">Jasa Potong Rumput Depok</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/potong-rumput-bogor">Jasa Potong Rumput Bogor</a>
               </li>
               <li>
                  <a href="<?=base_url()?>jasa/potong-rumput-tangerang">Jasa Potong Rumput Tangerang</a>
               </li>
            </ul>
         </div>
      </div>
   </div>
</div>
</div>
</div>
<div class="footer__copyright bg-overlay overlay-opacity-95">
   <div class="container">
      <div class="footer__copyright__content d-flex">
         <p class="footer__copyright__year">Copyright © 2010 - 2024 <span><a href="#">Floria.id</a></span>. All Rights
         Reserved</p>
         <ul class="footer__copyright__menu footer__copyright__menu--right">
            <li>
               <a href="#">Terms & Conditions</a>
            </li>
            <li>
               <a href="#">Privacy Policy</a>
            </li>
            <li>
               <a href="#">Sitemap</a>
            </li>
         </ul>
      </div>
   </div>
</div>
</footer>
</div>
<script src="<?= base_url(); ?>template/assets/js/vendor/jquery.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/vendor/waypoints.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/bootstrap-bundle.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/meanmenu.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/slick.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/aos.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/magnific-popup.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/parallax.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/backtotop.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/nice-select.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/counterup.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/wow.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/isotope-pkgd.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/imagesloaded-pkgd.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/ajax-form.js" defer></script>
<script src="<?= base_url(); ?>template/assets/js/main.js" defer></script>
</body>
</html>