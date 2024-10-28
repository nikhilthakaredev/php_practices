jQuery(document).ready(function($) {
    var currentIndex = -1;
    var galleryItems = $('.gallery-thumbnail');

    function showImage(index) {
        var item = galleryItems.eq(index);
        var src = item.attr('src');
        var title = item.data('title');
        var category = item.data('category');

        $('.modal-image').attr('src', src);
        $('.image-title').text(title);
        $('.image-category').text(category);
        $('.image-modal').fadeIn();
        currentIndex = index;
    }

    function closeModal() {
        $('.image-modal').fadeOut();
    }

    $('.gallery-thumbnail').on('click', function() {
        var index = galleryItems.index($(this));
        showImage(index);
    });

    $('.close-button').on('click', function() {
        closeModal();
    });

    $('.prev-button').on('click', function() {
        if (currentIndex > 0) {
            showImage(currentIndex - 1);
        }
    });

    $('.next-button').on('click', function() {
        if (currentIndex < galleryItems.length - 1) {
            showImage(currentIndex + 1);
        }
    });

    $('.zoom-in-button').on('click', function() {
        var currentWidth = $('.modal-image').width();
        $('.modal-image').css('width', currentWidth * 1.2);
    });

    $('.zoom-out-button').on('click', function() {
        var currentWidth = $('.modal-image').width();
        $('.modal-image').css('width', currentWidth / 1.2);
    });

    $(document).on('keydown', function(e) {
        if (e.key === "Escape") {
            closeModal();
        }
    });
});
