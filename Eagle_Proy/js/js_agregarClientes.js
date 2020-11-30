const navSlide = () => {
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.nav-links');
    const navLinks = document.querySelectorAll('.nav-links li');

    burger.addEventListener('click', () => {
        //toggle nav
        nav.classList.toggle('nav-active');
        //animated links
        navLinks.forEach((link, index)=>{

            if(link.style.animation) {
                link.style.animation = '';
            }else{
                link.style.animation = `navLinkFade 0.5s ease forwards ${index / 7 + 0.5}s`;
            }            
        });
        //burger animation
        burger.classList.toggle('toggle');
    });

}

navSlide();


$('.boton_nuevaEmpresa').click(function(){
    $('.formulario').animate({
        height:"toggle",
        'padding-top':'toggle',
        'padding-bottom': 'toggle',
        opacity: 'toggle'
    }, "slow")    
});

