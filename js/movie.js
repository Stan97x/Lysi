$(document).ready(()=>
{
    $('#hamburger-menu').click(()=>
    {
        $('#hamburger-menu').toggleClass('active')
        $('.nav-menu').toggleClass('active')
    })

    let navText=["<i class='bx bx-chevron-left'><i>","<i class='bx bx-chevron-right'><i>"]

    $('#hero-carousel').owlCarousel(
        {
            items:4,
            dots:false,
            loop:true,
            nav:true,
            navText:navText,
            autoplay:true,
            autoplayHoverPause:true
        })
    
        $('#top-movies-slide').owlCarousel({
            items: 2,
            dots: false,
            loop: true,
            autoplay: true,
            autoplayHoverPause: true,
            responsive: {
                400: {
                    items: 3
                },
                800: {
                    items: 4
                },
                1600: {
                    items: 6
                }
            }
        })
    
        $('.movies-slide').owlCarousel({
            items: 4,
            dots: false,
            nav:true,
            autoplay:true,  
            navText: navText,
            margin: 15,
            responsive: {
                500: {
                    items: 2
                },
                1280: {
                    items: 4
                },
                1600: {
                    items: 6
                }
            }
        })
})


function ToggleVideo()
{
    const trailer=document.querySelector('.trailer');
    const video=document.querySelector('.video');
    video.pause();
    trailer.classList.toggle('active');
}