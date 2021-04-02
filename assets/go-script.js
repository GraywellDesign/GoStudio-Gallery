(function($) {


    /* ==================>Review Slider<================== */
    /* ==================>Vanilla JS<================== */

    /* variables */
    const revItem = document.querySelectorAll('.list-review');
    const principalContainer = document.querySelector('#list-review-ul');

    let count = 0;
    let newDivContain;

    /* Creating elements and classList */
    newDivContain = document.createElement('div');
    newDivContain.classList.add('list-review-container')


    /* Insert items in a div container */
    revItem.forEach(element => {
        newDivContain.appendChild(element);
        count++;
        if (count == 3) {
            principalContainer.appendChild(newDivContain);
            count = 0;
            newDivContain = document.createElement('div');
            newDivContain.classList.add('list-review-container');
        }
    });

    /*  building the slider */
    const prevArrrow = document.querySelector('#prev-slide-arrow-rev');
    const nextArrow = document.querySelector('#next-slide-arrow-rev');
    const containList = document.querySelectorAll('.list-review-container');


    let firstChildItem = principalContainer.firstElementChild;
    let totalItemsRev = containList.length;
    let slidePosition = 0;

    firstChildItem.classList.remove('list-review-container')
    firstChildItem.classList.add('show-item')

    principalContainer.style.width = 100 * totalItemsRev + '%';




    /* event listeners for arrows  */
    listeners();

    function listeners() {

        document.addEventListener('DOMContentLoaded', function() {

        })
        prevArrrow.addEventListener('click', function() {
            prevSlide()
        });
        nextArrow.addEventListener('click', function() {
            nextSlide()
        });

    }

    function prevSlide() {
        if (slidePosition === 0) {
            slidePosition = totalItemsRev - 1;
        } else {
            slidePosition--;
            console.log(`mostrar`,
                slidePosition)
        }
        updateSliderPos2(slidePosition)
        console.log(slidePosition)
    }

    function nextSlide() {
        if (slidePosition === totalItemsRev - 1) {
            slidePosition = 0;
        } else {
            slidePosition++
        }
        console.log(slidePosition)
        updateSliderPos(slidePosition)
    }

    function updateSliderPos(slidePosition) {
        for (let slide of containList) {
            slide.classList.remove('show-item');
            slide.classList.add('list-review-container');
        }
        console.log(` dentro del update ${slidePosition}`)
        containList[slidePosition].classList.add('show-item')
    }

    function updateSliderPos2(slidePosition) {
        for (let slide of containList) {
            slide.classList.remove('show-item');
            slide.classList.add('list-review-container');
        }
        console.log(` dentro del update ${slidePosition}`)
        containList[slidePosition].classList.add('show-item')
    }
    /* ==================>Gallery Slider<================== */
    /* ==================>jQuery<================== */

    var categoriesLength = $('ul > #list-categories-li').length;
    var slideGallery = -1;

    /* categories filter */
    $('#list-categories-li > a').on('click', function(e) {
        $('#list-categories-li > a').removeClass('active');
        $(this).addClass('active');
        e.preventDefault();

        var categorySelected = $(this);
        var categoryParent = categorySelected.parent().index();
        slideGallery = categoryParent;

        var category = $(this).data('category');
        $.ajax({
            url: admin_url.ajax_url,
            data: {
                action: 'go_filter_projects',
                category: category
            },
            type: 'post',
            success: function(result) {
                $('#container-post').html(result);
            },
            error: function(result) {
                console.warn(result);
            }
        });

    });

    /* gallery slider arrow next*/
    $('#next-slide-arrow-gallery').on('click', function() {
        if (slideGallery >= categoriesLength - 1) {
            {
                slideGallery = 0
            }
        } else {
            slideGallery++;
        }
        var currentList = $('ul > #list-categories-li:eq(' + slideGallery + ') ');
        var currentChild = currentList.children().click();
        console.log(currentChild)

    })

    /* gallery slider arrow prev*/
    $('#prev-slide-arrow-gallery').on('click', function() {
        if (slideGallery <= 0) {
            {
                slideGallery = categoriesLength - 1
            }
        } else {
            slideGallery--;
        }
        var currentList = $('ul > #list-categories-li:eq(' + slideGallery + ') ');
        var currentChild = currentList.children().click();
        console.log(currentChild)

    });

    /* Modal Windows whit pos information  */
    $(document).on('click', '#container-gallery > article', function() {
        console.log($('article'));
        $('modal-project').removeClass('hidden-modal');
        var postId = $(this).data('id');
        console.log(postId)
        $.ajax({
            url: admin_url.ajax_url,
            data: {
                action: 'go_modal_project',
                postId: postId
            },
            type: 'post',
            success: function(result) {
                console.log(result)
                $('#modal-project').html(result);

            },
            error: function(result) {
                console.warn(result);
            }
        });
    });

    /* Close button modal window */
    $(document).on('click', '#btn-close-modal', function() {
        var select = $('#btn-close-modal').parent();
        var select2 = select.parent();
        select2.addClass('hidden-modal')
        console.log(select2)
    })

})(jQuery);