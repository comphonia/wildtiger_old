$(function () {
    'use strict';

    var body = document.querySelector("body");
    var modal = document.querySelector("#modal");
    var modalOverlay = document.querySelector("#modal-overlay");
    var closeButton = document.querySelector("#close-button");
    var menuItems = document.querySelectorAll(".menu-item");

    // toggleModal();

    function toggleModal() {
        modal.classList.toggle("closed");
        modalOverlay.classList.toggle("closed");
        body.classList.toggle("modal-open");
    }

    closeButton.addEventListener("click", () => toggleModal());

    modalOverlay.addEventListener("click", () => toggleModal());

    for (let i = 0; i < menuItems.length; i++) {
        menuItems[i].addEventListener("click", () => toggleModal());
    }

    //--------------------------# 
    //     Make Sticky Subnav   #
    //--------------------------#
    var thisScroll = 0,
        lastScroll = 0;
    $(window).scroll(function () {
        thisScroll = $(window).scrollTop();
        if ($('subnav').offset().top - thisScroll <= 50 && !$('#stuckNav').length && thisScroll > lastScroll) {
            var newNav = $('subnav').clone();
            newNav.attr('id', 'stuckNav');
            $('#sub-NavbarWrapper').append(newNav);
        } else if ($('subnav').offset().top - $(window).scrollTop() > 50 && thisScroll < lastScroll) {
            $('#stuckNav').remove();
        }
        lastScroll = thisScroll;
    });

    //--------------------------# 
    // Sticky Subnav scrollspy   #
    //--------------------------#
    var section = document.querySelectorAll(".section");
    var sections = {};
    var i = 0;

    Array.prototype.forEach.call(section, function (e) {
        sections[e.id] = e.offsetTop;
    });

    window.onscroll = function () {
        var scrollPosition = document.documentElement.scrollTop || document.body.scrollTop;
        for (i in sections) {
            if (sections[i] <= scrollPosition +200) {
                try {
                    document.querySelectorAll('.nav-active')[1].classList.remove('nav-active')
                    document.querySelectorAll('a[href*=' + i + ']')[1].classList.add('nav-active');
                } catch (e) {}
            }
        }
    };
    


})
