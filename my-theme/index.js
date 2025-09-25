document.addEventListener('DOMContentLoaded', function() {
    let mediaUploader;

    const uploadBtn = document.querySelector('.upload-category-image');
    const removeBtn = document.querySelector('.remove-category-image');
    const imageInput = document.getElementById('category-image-id');
    const imagePreview = document.getElementById('category-image-preview');

    if (uploadBtn) {
        uploadBtn.addEventListener('click', function(e) {
            e.preventDefault();

            if (mediaUploader) {
                mediaUploader.open();
                return;
            }

            mediaUploader = wp.media.frames.file_frame = wp.media({
                title: 'Choose Category Image',
                button: { text: 'Choose Image' },
                multiple: false
            });

            mediaUploader.on('select', function() {
                const attachment = mediaUploader.state().get('selection').first().toJSON();
                imageInput.value = attachment.id;
                imagePreview.src = attachment.url;
            });

            mediaUploader.open();
        });
    }

    if (removeBtn) {
        removeBtn.addEventListener('click', function(e) {
            e.preventDefault();
            imageInput.value = '';
            imagePreview.src = '';
        });
    }
});

jQuery(document).ready(function($){
    $('.main-banner-slider').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        autoplay: true,
        autoplaySpeed: 5000,
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        adaptiveHeight: true,
        fade: false,
        pauseOnHover: true
    });
});

jQuery(document).ready(function($){
    $('.carousel-slider').slick({
        slidesToShow: 4,
        slidesToScroll: 1,
        autoplay: false,
        dots: true,
        arrows: true,
        prevArrow: '<button type="button" class="slick-prev"><i class="fas fa-chevron-left"></i></button>',
        nextArrow: '<button type="button" class="slick-next"><i class="fas fa-chevron-right"></i></button>',
        responsive: [
            {
                breakpoint: 1200,
                settings: { slidesToShow: 3 }
            },
            {
                breakpoint: 992,
                settings: { slidesToShow: 2 }
            },
            {
                breakpoint: 576,
                settings: { slidesToShow: 1 }
            }
        ]
    });
});

jQuery(document).ready(function($){
    $('.ticker-item-wrap').slick({
        vertical: true,          // chạy theo chiều dọc
        slidesToShow: 1,         // hiển thị 1 item
        slidesToScroll: 1,       // scroll 1 item 1 lần
        autoplay: true,          // tự động chạy
        autoplaySpeed: 3000,     // 3 giây/lượt
        arrows: true,            // bật nút prev/next
        dots: false,             // tắt dots
        infinite: true,          // chạy lặp vô hạn
        pauseOnHover: true       // dừng khi hover
    });
});

jQuery(document).ready(function($){
    $('.top-ticker-news .ticker-item-wrap').slick({
        vertical: true,         // chạy theo chiều dọc
        slidesToShow: 1,        // hiển thị 1 item
        slidesToScroll: 1,      // scroll 1 item
        autoplay: true,         // tự động chạy
        autoplaySpeed: 3000,    // 3 giây/lượt
        arrows: false,          // Ẩn prev/next
        dots: false,
        infinite: true,
        pauseOnHover: true,
        speed: 600
    });
});

jQuery(document).ready(function($) {
    var $searchTrigger = $(".search-trigger");
    var $searchForm = $(".search-form-wrap");
    var $closeBtn = $(".search_close_btn");

    $searchTrigger.on("click", function(e) {
        e.preventDefault();
        $searchForm.slideDown();   // hiệu ứng mở
        $searchForm.find(".search-field").focus();
        $closeBtn.show();
        $searchTrigger.hide();
       
    });

    $closeBtn.on("click", function(e) {
        e.preventDefault();
        $searchForm.slideUp();
        $closeBtn.hide();
        $searchTrigger.show();
    });
});

jQuery(document).ready(function($) {
  $(".blaze-switcher-button").on("click", function() {
    $(this).toggleClass("active"); 
    $("body").toggleClass("digital_newspaper_dark_mode");

    if ($("body").hasClass("digital_newspaper_dark_mode")) {
      localStorage.setItem("theme_mode", "dark");
    } else {
      localStorage.setItem("theme_mode", "light");
    }
  });

  // khôi phục trạng thái khi load lại
  if (localStorage.getItem("theme_mode") === "dark") {
    $("body").addClass("digital_newspaper_dark_mode");
    $(".blaze-switcher-button").addClass("active");
  }
});





