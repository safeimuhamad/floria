<div class="cl-project-block">
   <div class="cl-project-block__shape-1" data-aos="fade-left" data-aos-duration="1500" data-aos-once="true">
      <img loading="lazy" src="<?= base_url(); ?>template/assets/images/png/home-3/counter-project-right-shape.png" alt="<?=$keywords?>">
   </div>
   <div class="container">
      <div class="section-title-block section-title-block--style-2">
         <div class="row gy-20 align-items-center justify-content-center" data-aos="fade-up"
         data-aos-duration="1500" data-aos-once="true">
         <!-- Project Content -->
         <div class="col-lg-7 col-md-10 col-sm-10 col-xs-10">
            <div class="section-title-block__left text-center text-lg-start">
               <h2 class="section-title-block__opacity-heading section-title-block__opacity-heading--style-4">Tanaman Hias Kami</h2>
               <h2 class="section-title-block__subtitle">
                  <img loading="lazy" src="<?= base_url(); ?>template/assets/images/png/home-2/project-subtitle.png" alt="<?=$keywords?>">
                  <span>Tanaman Hias Kami</span>
               </h2>
               <h3 class="section-title-block__heading">Tanaman Hias <span class="section-title-block__highlight-text">Kami</span></h3>
            </div>
         </div>
         <!-- End Project Content -->
         <!-- Project Middle Shape -->
         <div class="col-lg-2 col-12 col-md-10">
            <div class="section-title-block__middle-shape">
               <img loading="lazy" src="<?= base_url(); ?>template/assets/images/png/home-3/project-heading-shape.png" alt="<?=$keywords?>">
            </div>
         </div>
         <!-- End Project Middle Shape -->
         <!-- Project Slider Arrows -->
         <div class="col-lg-3 col-12 col-md-10">
            <div class="project-slider-arrow">
               <span class="project-slider-arrow__left-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                  width="26" height="8" viewBox="0 0 26 8" fill="none">
                  <path
                  d="M0.646446 4.35355C0.451185 4.15829 0.451185 3.84171 0.646446 3.64645L3.82843 0.464466C4.02369 0.269204 4.34027 0.269204 4.53553 0.464466C4.7308 0.659728 4.7308 0.976311 4.53553 1.17157L1.70711 4L4.53553 6.82843C4.7308 7.02369 4.7308 7.34027 4.53553 7.53553C4.34027 7.7308 4.02369 7.7308 3.82843 7.53553L0.646446 4.35355ZM26 4.5H1V3.5H26V4.5Z"
                  fill="#009961" />
               </svg></span>
               <span class="project-slider-arrow__next-arrow"><svg xmlns="http://www.w3.org/2000/svg"
                  width="26" height="8" viewBox="0 0 26 8" fill="none">
                  <path
                  d="M25.3536 4.35355C25.5488 4.15829 25.5488 3.84171 25.3536 3.64645L22.1716 0.464466C21.9763 0.269204 21.6597 0.269204 21.4645 0.464466C21.2692 0.659728 21.2692 0.976311 21.4645 1.17157L24.2929 4L21.4645 6.82843C21.2692 7.02369 21.2692 7.34027 21.4645 7.53553C21.6597 7.7308 21.9763 7.7308 22.1716 7.53553L25.3536 4.35355ZM0 4.5H25V3.5H0V4.5Z"
                  fill="white" />
               </svg></span>
            </div>
         </div>
         <!-- End Project Slider Arrows -->
      </div>
   </div>
   <div class="project-wrapper project-wrapper--style-2">
      <div class="row gy-30 gx-30 justify-content-center project-slider-wrapper" data-aos="fade-left"
      data-aos-duration="1500" data-aos-once="true">
      <!-- Single Project -->
      <?php foreach ($tanaman as $data_portofolio): ?>
      <div class="col-xs-10 col-sm-6 col-md-6 col-lg-4 col-xl-4">
         <div class="project-wrapper__single-card">
            <img loading="lazy" src="<?= base_url(); ?>template/assets_admin/images/user/<?= base64_decode($data_portofolio['foto']) ?>" alt="<?= $data_portofolio['product_name'] ?>">
            <div class="project-wrapper__single-card__hover-content">
               <h3 class="project-wrapper__single-card__hover-content-title">
                  <?= $data_portofolio['category']; ?>
               </h3>
               <p><?= (isset($jasa) && $jasa !== "") ? $jasa . " " : ""; ?> <?= $data_portofolio['product_name'] ?></p>
               <!-- <a href="#" class="cl-btn cl-btn--primary">More Project<i
                  class="fa-solid fa-arrow-up"></i></a> -->
               </div>
         </div>
      </div>
      <?php endforeach; ?>
         <!-- End Single Project  -->
   </div>
</div>
</div>
</div>