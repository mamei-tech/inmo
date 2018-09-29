$(document).ready(function () {
    window.bioCurrentPage = 0;

    window.bioScrollTo = function bioScrollTo(page, widht) {
        $('.bio > p')[0].scrollTo((page) * (widht), 0);
        window.bioCurrentPage = page;
        builtPagination();
    };

    function builtPagination() {
        $('.pagination-pc').empty();
        $('.pagination-mobile').empty();

        var widht = $('.bio > p').width();

        if (window.innerWidth > 960) {
            widht = widht + 30;
        }

        var scrollWidht = $('.bio > p')[0].scrollWidth;

        var totalPages = Math.ceil(scrollWidht / widht);

        //Pagination PC
        $('.pagination-pc').append('<button class="btn" onclick="bioScrollTo(' + Math.max(window.bioCurrentPage - 1, 0) + ', ' + widht + ')"><< ' + window.messages.previous + '</button>');
        var start = Math.max(window.bioCurrentPage - 1, 0)

        if (window.bioCurrentPage > 1 && totalPages > 5) {
            $('.pagination-pc').append('<button class="btn btn-no-hover">...</button>');
        }

        for (let i = Math.min(start, totalPages - Math.min(totalPages, 5)); i <= start + 4 && i < totalPages; i++) {
            $('.pagination-pc').append('<button class="btn ' +(i == window.bioCurrentPage ? "active" : "")+ '" onclick="bioScrollTo(' + i + ', ' + widht + ')">' + (i + 1) + '</button>');
        }

        if (window.bioCurrentPage + 4 < totalPages) {
            if (!(window.bioCurrentPage == 0 && window.bioCurrentPage + 5 == totalPages))
                $('.pagination-pc').append('<button class="btn btn-no-hover">...</button>');
        }
        $('.pagination-pc').append('<button class="btn" onclick="bioScrollTo(' + Math.min(window.bioCurrentPage + 1, totalPages - 1) + ', ' + widht + ')">' + window.messages.next + ' >></button>');


        //Pagination Movil
        $('.pagination-mobile').append('<button class="btn" onclick="bioScrollTo(' + Math.max(window.bioCurrentPage - 1, 0) + ', ' + widht + ')"><< ' + window.messages.previous + '</button>');
        var start = Math.max(window.bioCurrentPage - 1, 0)

        if (window.bioCurrentPage > 1 && totalPages > 3) {
            $('.pagination-mobile').append('<button class="btn btn-no-hover">...</button>');
        }

        for (let i = Math.min(start, totalPages - Math.min(totalPages, 3)); i <= start + 2 && i < totalPages; i++) {
            $('.pagination-mobile').append('<button class="btn ' +(i == window.bioCurrentPage ? "active" : "")+ '" onclick="bioScrollTo(' + i + ', ' + widht + ')">' + (i + 1) + '</button>');
        }

        if (window.bioCurrentPage + 2 < totalPages) {
            if (!(window.bioCurrentPage == 0 && window.bioCurrentPage + 3 == totalPages))
                $('.pagination-mobile').append('<button class="btn btn-no-hover">...</button>');
        }


        $('.pagination-mobile').append('<button class="btn" onclick="bioScrollTo(' + Math.min(window.bioCurrentPage + 1, totalPages - 1) + ', ' + widht + ')">' + window.messages.next + ' >></button>');
    };


    $(window).resize(function () {
        window.bioScrollTo(0, 0);
    });


    builtPagination();
});
