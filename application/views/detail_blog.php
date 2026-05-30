<!-- ========= Offcanvas Area start =========== -->
<div class="body-overlay"></div>
<!-- ========= Offcanvas Area End =========== -->
<!-- ========= Breadcrumb Area Start =========== -->
<section class="breadcrumb include-bg breadcrumb__overlay">
 <div class="container">
  <div
  class="breadcrumb__content p-relative z-index-1"
  data-aos="fade-right"
  data-aos-duration="1500"
  data-aos-once="true"
  >
  <h1 class="breadcrumb__title"><?= $data_blog->title; ?></h1>
  <div class="breadcrumb__list">
    <span><a href="<?=base_url()?>">Home</a></span>
    <span class="dvdr">
     <i class="fa-regular fa-angle-right"></i>
     <i class="fa-regular fa-angle-right"></i>
  </span>
  <span>Blogs</span>
  <span class="dvdr">
     <i class="fa-regular fa-angle-right"></i>
     <i class="fa-regular fa-angle-right"></i>
  </span>
  <span><?= $data_blog->title; ?></span>
</div>
</div>
</div>
<div class="breadcrumb__bottom-shape">
  <img
  src="<?= base_url(); ?>template/assets/images/png/home-1/home-1-hero-shape-bottom.png"
  alt="<?=$keywords?>" loading="lazy"
  />
</div>
</section>
<!-- ========= Breadcrumb Area End =========== -->
<!-- =========  Postbox Area Start =========== -->
<section class="postbox__area">
 <div class="container">
   <div class="row justify-content-center">
     <!-- left sidebar -->
     <?php 
     $this->load->view('blog_sidebar');
     ?>
     <!-- Right sidebar -->
     <div class="col-lg-8 order-lg-2">
       <div class="postbox__wrapper pr-20">
         <article class="postbox__item format-image transition-3">
           <div
           class="postbox__thumb w-img"
           data-aos="fade-up"
           data-aos-duration="1500"
           data-aos-once="true"
           >
           <img
           src="<?= base_url(); ?>template/assets_admin/images/blog/<?= base64_decode($data_blog->foto); ?>"
           alt="<?=$keywords?>" loading="lazy"
           />
        </div>
        <div
        class="postbox__content"
        data-aos="fade-up"
        data-aos-duration="1500"
        data-aos-once="true"
        >
        <div class="postbox__meta">
         <span class="postbox__user-name"
         ><a href="#"><i class="fa-regular fa-user"></i>Administrator</a></span
         >
         <span class="date"
         ><i class="fa-regular fa-clock"> <?= date_format(date_create($data_blog->date), "d M Y") ?></i>
      </span>
      <span class="comment"
      ><a href="#"
      ><i class="fal fa-comments"></i> 0 Comments</a
      ></span
      >
      <span class="postbox__viewers"
      ><i class="fa-regular fa-eye"></i>1,526 views</span
      >
   </div>
   <h2 class="postbox__title"><?= $data_blog->title; ?>
</h2>
<div class="postbox__text">
   <?= $data_blog->content; ?>
</div>
</div>
<h3 class="postbox__title"><?php if (isset($baca_juga) && !empty($baca_juga->title)): ?><b>Baca Juga:</b> <u><a
   href="<?= base_url('informasi/' . $baca_juga->slug) ?>"><?= $baca_juga->title ?></a></u>
<?php endif; ?>
</h3>
</div>
</article>
</div>
</div>
</div>
</div>
</section>
<!-- =========  Postbox Area End =========== -->
</div>
<script type="application/ld+json">
<?php
$json_ld = [
    "@context" => "https://schema.org",
    "@type" => "Article",
    "headline" => isset($data_blog->title) && !empty($data_blog->title) ? $data_blog->title : "Judul Tidak Tersedia",
    "author" => [
        "@type" => "Person",
        "name" => "Administrator"
    ],
    "publisher" => [
        "@type" => "Organization",
        "name" => "Floria.id",
        "logo" => [
            "@type" => "ImageObject",
            "url" => base_url('template/assets_admin/images/blog/') . (!empty($data_blog->foto) ? base64_decode($data_blog->foto) : "default.jpg")
        ]
    ],
    "datePublished" => isset($data_blog->date) && !empty($data_blog->date) ? date('c', strtotime($data_blog->date)) : "0000-00-00T00:00:00Z",
    "dateModified" => isset($data_blog->date) && !empty($data_blog->date) ? date('c', strtotime($data_blog->date)) : "0000-00-00T00:00:00Z",
    "mainEntityOfPage" => [
        "@type" => "WebPage",
        "@id" => current_url()
    ]
];

echo json_encode($json_ld, JSON_UNESCAPED_SLASHES | JSON_UNESCAPED_UNICODE | JSON_PRETTY_PRINT);
?>
</script>