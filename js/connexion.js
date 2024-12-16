$(document).ready(()=>
{
    $('#hamburger-menu').click(()=>
    {
        $('#hamburger-menu').toggleClass('active')
        $('.nav-menu').toggleClass('active')
    })

    let navText=["<i class='bx bx-chevron-left'><i>","<i class='bx bx-chevron-right'><i>"]

    })


function ToggleVideo()
{
    const trailer=document.querySelector('.trailer');
    const video=document.querySelector('.video');
    video.pause();
    trailer.classList.toggle('active');
}