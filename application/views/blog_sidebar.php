    <div class="col-lg-4 order-2 order-lg-1">
     <div class="sidebar__wrapper">
      <div
      class="sidebar__widget mb-40"
      data-aos="fade-right"
      data-aos-duration="1500"
      data-aos-once="true"
      >
      <div class="sidebar__widget-content">
        <div class="sidebar__search">
         <form action="#">
          <div class="sidebar__search-input-2">
           <input type="text" placeholder="Search Here" />
           <button type="submit">
            <i class="far fa-search"></i>
          </button>
        </div>
      </form>
    </div>
  </div>
</div>
<!-- Recent Post -->
<div
class="sidebar__widget mb-40"
data-aos="fade-right"
data-aos-duration="1500"
data-aos-once="true"
>
<h3 class="sidebar__widget-title">Recent Post</h3>
<div class="sidebar__widget-content">
  <div class="sidebar__post rc__post">
    <?php foreach ($data_blog_all as $dba): ?>
      <div class="rc__post mb-20 d-flex">
<!--         <div class="rc__post-thumb mr-20">
          <a href="<?= base_url(); ?>blog/detail/<?= $dba->slug; ?>"
            ><img
            src="<?= base_url(); ?>template/assets_admin/images/blog/<?= base64_decode($dba->foto); ?>"
            alt="<?= $dba->title; ?>"
            /></a>
          </div> -->
          <div class="rc__post-content">
            <div class="rc__meta">
              <span><?= date_format(date_create($dba->date), "d M ,Y") ?></span>
            </div>
            <h3 class="rc__post-title">
              <a
              href="<?= base_url(); ?>informasi/<?= $dba->slug; ?>"><?= $dba->title; ?></a>
            </h3>
          </div>
        </div>
      <?php endforeach; ?>
    </div>
  </div>
</div>
<!-- End Recent Post -->
<div
class="sidebar__widget mb-40"
data-aos="fade-right"
data-aos-duration="1500"
data-aos-once="true"
>
<h2 class="sidebar__widget-title">service category</h2>
<div class="sidebar__widget-content">
  <ul>
   <li>
    <a href="<?=base_url()?>jasa/perawatan-taman"
      >Jasa Perawatan Taman<i
      class="fa-solid fa-angle-right"
      ></i
      ></a>
    </li>
    <li>
      <a href="<?=base_url()?>jasa/pembuatan-taman"
        >Jasa Pembuatan Taman<i
        class="fa-solid fa-angle-right"
        ></i
        ></a>
      </li>
      <li>
        <a href="<?=base_url()?>jasa/sewa-tanaman"
          >Jasa Sewa Tanaman<i
          class="fa-solid fa-angle-right"
          ></i
          ></a>
        </li>
      </ul>
    </div>
  </div>
  <div
  class="sidebar__contact mb-40 bg-overlay bg-overlay--bottle-green"
  data-aos="fade-right"
  data-aos-duration="1500"
  data-aos-once="true"
  style="
  background-image: url(<?php echo base_url('template/assets/images/webp/service/contact-Bg.webp'); ?>);
  "
  >
  <h3>Hubungi Kami</h3>
  <h2>Konsultasi Sekarang Juga!</h2>
  <a href="<?=base_url()?>kontak" class="cl-btn cl-btn--primary-hover"
    >get a free quote</a
    >
  </div>
</div>
</div>