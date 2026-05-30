<style>
    .pagination .page-numbers.current {
      background-color: #1bb27b !important;
      color: #fff !important;
      border-radius: 4px;
      padding: 6px 12px;
      font-weight: bold;
  }

</style>

<!-- ========= Offcanvas Area start =========== -->
<link rel="preload" as="image" href="<?= base_url(); ?>template/assets/images/webp/home-1-hero-shape-bottom.webp">
<div class="body-overlay"></div>
<!-- ========= Offcanvas Area End =========== -->

<!-- ========= Breadcrumb Area Start =========== -->
<section class="breadcrumb include-bg breadcrumb__overlay">
  <div class="container">
    <div class="breadcrumb__content p-relative z-index-1" data-aos="fade-right" data-aos-duration="1500" data-aos-once="true">
      <h1 class="breadcrumb__title">Jual Tanaman Hias Terbaik</h1>
      <div class="breadcrumb__list">
        <span><a href="<?=base_url()?>">Home</a></span>
        <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
        <span>Jual</span>
        <span class="dvdr"><i class="fa-regular fa-angle-right"></i></span>
        <span>Tanaman Hias</span>
    </div>
</div>
</div>
<div class="breadcrumb__bottom-shape">
    <img src="<?= base_url(); ?>template/assets/images/webp/home-1-hero-shape-bottom.webp" alt="<?= htmlspecialchars($keywords); ?>" />
</div>
</section>
<!-- ========= Breadcrumb Area End =========== -->
<?php 
$phone_number = '6285711289770';
?>
<div class="cl-products">
  <div class="container">
    <div class="row gy-36 gx-36 justify-content-center">
        <h2>Tanaman Hias</h2>
        <div id="productpage" class="row gy-36 gx-36"></div>
        <!-- Pagination -->
        <div class="pagination d-flex justify-content-center"
        data-aos="fade-up"
        data-aos-duration="1500"
        data-aos-once="true">
        <ul class="d-flex justify-content-center align-items-center" id="pagination-wrapper">
        </ul>
    </div>
    <!-- End Pagination -->
</div>
</div>
</div>
<script src="<?= base_url(); ?>template/assets/js/vendor/jquery.min.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        setData();
    });

    // Fungsi bantu ambil parameter dari URL
    function getUrlParameter(name) {
        name = name.replace(/[\[]/, '\\[').replace(/[\]]/, '\\]');
        var regex = new RegExp('[\\?&]' + name + '=([^&#]*)');
        var results = regex.exec(window.location.href);
        return results === null ? null : decodeURIComponent(results[1].replace(/\+/g, ' '));
    }

    function setData() {
        $.ajax({
            type: "GET",
            url: "<?php echo site_url('product/get_data_product_tanaman_hias'); ?>",
            dataType: "JSON",
            cache: false,
            success: function (data) {
                $('#productpage').empty();
                var tableData = data;
                var urlPage = parseInt(getUrlParameter('page')) || 1;

                var state = {
                    'querySet': tableData,
                    'page': urlPage,
                    'rows': 12,
                    'window': 5,
                };

                buildTable();

                function pagination(querySet, page, rows) {
                    var trimStart = (page - 1) * rows;
                    var trimEnd = trimStart + rows;
                    var trimmedData = querySet.slice(trimStart, trimEnd);
                    var pages = Math.ceil(querySet.length / rows);
                    return {
                        'querySet': trimmedData,
                        'pages': pages,
                    };
                }

                function pageButtons(pages) {
                    var wrapper = document.getElementById('pagination-wrapper');
                    wrapper.innerHTML = ``;

                    var maxLeft = (state.page - Math.floor(state.window / 2));
                    var maxRight = (state.page + Math.floor(state.window / 2));

                    if (maxLeft < 1) {
                        maxLeft = 1;
                        maxRight = state.window;
                    }

                    if (maxRight > pages) {
                        maxLeft = pages - (state.window - 1);
                        if (maxLeft < 1) {
                            maxLeft = 1;
                        }
                        maxRight = pages;
                    }

                    for (var page = maxLeft; page <= maxRight; page++) {
                        if (page == state.page) {
                            wrapper.innerHTML += `<li class="paged" value="${page}"><span class="page-numbers current">${page}</span></li>`;
                        } else {
                            wrapper.innerHTML += `<li class="paged" value="${page}"><a href="?page=${page}" class="page-numbers">${page}</a></li>`;
                        }
                    }

                    // First
                    if (state.page != 1) {
                        wrapper.innerHTML = `<li class="paged" value="1"><a href="?page=1" class="page-numbers">First</a></li>` + wrapper.innerHTML;
                    } else {
                        wrapper.innerHTML = `<li class="paged disabled" value="1"><span class="page-numbers">First</span></li>` + wrapper.innerHTML;
                    }

                    // Last
                    if (state.page != pages && pages != 0) {
                        wrapper.innerHTML += `<li class="paged" value="${pages}"><a href="?page=${pages}" class="page-numbers">Last</a></li>`;
                    } else {
                        wrapper.innerHTML += `<li class="paged disabled" value="${pages}"><span class="page-numbers">Last</span></li>`;
                    }

                    if (pages == 1) {
                        wrapper.innerHTML = ``;
                    }

                    // Event klik
                    $(document).off('click', '.paged').on('click', '.paged', function (e) {
                        e.preventDefault();
                        $('#productpage').empty();
                        state.page = Number($(this).val());
                        const newUrl = window.location.protocol + "//" + window.location.host + window.location.pathname + '?page=' + state.page;
                        window.history.pushState({ path: newUrl }, '', newUrl);
                        buildTable();
                        window.scrollTo({ top: 0, behavior: 'smooth' });
                    });
                }

                function buildTable() {
                    var div = $('#productpage');
                    var data = pagination(state.querySet, state.page, state.rows);
                    var myList = data.querySet;

                    for (var i = 0; i < myList.length; i++) {
                        var product = `<div class="col-12 col-xs-10 col-sm-6 col-md-4 col-lg-3 col-xl-3">
                        <div class="product ablog-2 mb-30 wow fadeInUp" data-wow-delay=".3s">
                        <div class="ablog__img">
                        <a href="#">
                        <img style="max-height: 300px; width: auto;" src="<?= base_url(); ?>template/assets_admin/images/user/${atob(myList[i].foto)}" class="img-fluid" alt="${myList[i].product_name}">
                        </a>
                        </div>

                        <!-- Tambahkan kelas custom untuk centering -->
                        <div class="ablog__text ablog__text2 text-center">
                        <div class="blog__date blog__date2">
                        <span class="text-white">${myList[i].type}</span>
                        </div>
                        <div>
                        <a href="#">
                        ${myList[i].product_name}
                        </a>
                        </div>
                        <span class="text-sucess fw-bold mt-2">
                        Rp ${parseInt(myList[i].sell_price).toLocaleString('id-ID')}
                        </span>
                        </div>
                        </div>
                        </div>
                        `;
                        div.append(product);
                    }
                    pageButtons(data.pages);
                }
            },
            error: function (request) {
                console.error("Gagal ambil data:", request.responseText);
            }
        });
}
</script>

<script type="application/ld+json">
    {
      "@context": "https://schema.org",
      "@type": "Product",
      "name": "Tanaman Hias Indoor & Outdoor - Segarkan Ruangan Anda",
      "description": "Temukan berbagai pilihan tanaman hias berkualitas untuk indoor maupun outdoor. Cocok untuk dekorasi rumah, kantor, atau taman. Dapatkan tanaman sehat dan segar langsung dari ahlinya hanya di Floria.id.",
      "image": "https://floria.id/template/assets_admin/images/user/sedap-malam-5615.webp",
      "sku": "TH-001",
      "brand": {
        "@type": "Brand",
        "name": "Floria"
    },
    "manufacturer": {
        "@type": "Organization",
        "name": "Floria.id",
        "url": "https://floria.id/jual/tanaman-hias",
        "logo": "https://floria.id/template/assets/images/logo/Logo-2.png"
    },
    "offers": {
        "@type": "AggregateOffer",
        "name": "Paket Tanaman Hias",
        "priceCurrency": "IDR",
        "lowPrice": 25000,
        "highPrice": 250000,
        "offerCount": "4",
        "availability": "https://schema.org/InStock",
        "url": "https://floria.id/jual/tanaman-hias"
    },
    "aggregateRating": {
        "@type": "AggregateRating",
        "ratingValue": "4.8",
        "bestRating": "5",
        "reviewCount": "2387"
    },
    "review": [
        {
          "@type": "Review",
          "author": "Andini Putri",
          "datePublished": "2024-04-15",
          "reviewRating": {
            "@type": "Rating",
            "ratingValue": "5",
            "bestRating": "5"
        },
        "description": "Tanamannya sangat segar dan rapi. Cocok untuk ruang tamu saya!"
    },
    {
      "@type": "Review",
      "author": "Rizky Hadi",
      "datePublished": "2024-03-02",
      "reviewRating": {
        "@type": "Rating",
        "ratingValue": "4.7",
        "bestRating": "5"
    },
    "description": "Harga bersaing dan pengiriman cepat. Sangat puas!"
}
],
    "hasOfferCatalog": {
        "@type": "OfferCatalog",
        "name": "Pilihan Tanaman Hias",
        "itemListElement": [
          {
            "@type": "Offer",
            "name": "Monstera Deliciosa",
            "priceCurrency": "IDR",
            "price": "125000"
        },
        {
            "@type": "Offer",
            "name": "Sansevieria (Lidah Mertua)",
            "priceCurrency": "IDR",
            "price": "45000"
        },
        {
            "@type": "Offer",
            "name": "Calathea Orbifolia",
            "priceCurrency": "IDR",
            "price": "95000"
        },
        {
            "@type": "Offer",
            "name": "Peace Lily",
            "priceCurrency": "IDR",
            "price": "85000"
        }
    ]
    }
}
</script>
