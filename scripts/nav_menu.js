window.onload = function(){
    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    navslide();
    Get_Year();
    //console.log("Adresa este " + sPage + "\n");
    if(sPage == "index.php" || sPage == "")
    {
        Repair_Main_Photo();
        Change_Photo_Main();
        get_Data();
    }
}

window.onscroll = function(){
    KeepFixed();
}

window.onresize = function(){
    var sPath = window.location.pathname;
    var sPage = sPath.substring(sPath.lastIndexOf('/') + 1);
    Repair_Hide_Bar();
    if(sPage == "index.php" || sPage == "")
    {
        Repair_Main_Photo();
        Change_Photo_Main();
    }
}

function Repair_Hide_Bar()
{
    /* Functia va rula atunci cand am activat meniul secret si modificam dimensiunea ecranului */
    const burger = document.querySelector('.burger');
    const nav = document.querySelector('.hide-nav-bar');
    const logo = document.querySelector('.nav-menu');
    const slide1 = document.querySelector('.line1');
    const slide2 = document.querySelector('.line2');
    const slide3 = document.querySelector('.line3');
    const logo_a = logo.getElementsByTagName('A')[0];
    //console.log(window.innerWidth + "\n");
    if(window.innerWidth > 700 && nav.style.display == "block")
    {
        nav.style.display = "none";
        //logo.style.color = "black";
        logo.style.background = "white";
        slide1.style.background = "black";
        slide2.style.background = "black";
        slide3.style.background = "black";
        logo_a.style.color = "black";
    }
}

function KeepFixed()
{
    var head_bar = document.querySelector('.header-wrapper');
    var contact_bar = document.querySelector('.contact-bar');
    var nav_bar = document.querySelector('.nav-menu');
    var hide_bar = document.querySelector('.hide-nav-bar');

    var sticky = head_bar.offsetTop;
    if(window.pageYOffset > sticky + 70)
    {
        nav_bar.classList.add("sticky");

        contact_bar.style.display = "none";
        nav_bar.style.height = "60px"; /* inca nu inteleg de ce se mareste */
        hide_bar.style.position = "fixed";
        hide_bar.style.top = "60px";
    }
    else 
    {
        nav_bar.classList.remove("sticky");

        contact_bar.style.display = "flex";
        hide_bar.style.position = "relative";
        hide_bar.style.top = "0px";
    }
}

const navslide = () =>
    {
        const burger = document.querySelector('.burger');
        const nav = document.querySelector('.hide-nav-bar');
        const logo = document.querySelector('.nav-menu');
        const slide1 = document.querySelector('.line1');
        const slide2 = document.querySelector('.line2');
        const slide3 = document.querySelector('.line3');
        const logo_a = logo.getElementsByTagName('A')[0];
        const text = document.querySelector('.text');

        burger.addEventListener('click', () =>
        {
            if(nav.style.display == "block")
            {
                nav.style.animationName = "hiddencase";
                nav.style.animationDuration = "200ms";
                nav.style.display = "none";
                //logo.style.color = "black";
                logo.style.background = "#f5f5f5";
                slide1.style.background = "black";
                slide2.style.background = "black";
                slide3.style.background = "black";
                logo_a.style.color = "black";
                text.style.color = "black";
            }
            else if(nav.style.display == "none")
            {
                nav.style.animationName = "showcase";
                nav.style.animationDuration = "200ms";
                nav.style.display = "block";
                //logo.style.color = "white";
                logo.style.background = "black";
                slide1.style.background = "white";
                slide2.style.background = "white";
                slide3.style.background = "white";
                logo_a.style.color = "white";
                text.style.color = "white";
            }
            else
            {
                nav.style.animationName = "showcase";
                nav.style.animationDuration = "200ms";
                nav.style.display = "block";
                //logo.style.color = "white";
                logo.style.background = "black";
                slide1.style.background = "white";
                slide2.style.background = "white";
                slide3.style.background = "white";
                logo_a.style.color = "white";
                text.style.color = "white";
            }
        });  
    }


function get_Data()
{
    /* Time */
    /*var timer1 = setInterval(function(){
    var d = new Date();
    var ora = d.getHours();
    var minut = d.getMinutes();
    var secunda = d.getSeconds();
    var time_data = document.querySelector(".main-time");
    if(secunda < 10)
        secunda = "0" + String(secunda);
    if(minut < 10)
        minut = "0" + String(minut);
    if(ora < 10)
        ora = "0" + String(ora);
    time_data.innerHTML = "Current time " + ora + ":" + minut + ":" + secunda; 
    }, 1000);*/

    /* Day */
    var d = new Date();
    var zi = d.getDate();
    var luna = d.getMonth() + 1;
    var an = d.getFullYear();
    var nume;
    switch(luna)
    {
        case 1: nume = "Ianuarie"; break;
        case 2: nume = "Februarie"; break;
        case 3: nume = "Martie"; break;
        case 4: nume = "Aprilie"; break;
        case 5: nume = "Mai"; break;
        case 6: nume = "Iunie"; break;
        case 7: nume = "Iulie"; break;
        case 8: nume = "August"; break;
        case 9: nume = "Septembrie"; break;
        case 10: nume = "Octombrie"; break;
        case 11: nume = "Noiembrie"; break;
        case 12: nume = "Decembrie"; break;
    }

    var time_data = document.querySelector(".main-time");
    var copyright = document.querySelector(".copyright");
    time_data.innerHTML = zi + " " + nume + " " + an + " - ziua in care poti fi cel mai bun!";
}

function Get_Year()
{
    /* Day */
    var d = new Date();
    var zi = d.getDate();
    var luna = d.getMonth() + 1;
    var an = d.getFullYear();
    var nume;
    switch(luna)
    {
        case 1: nume = "Ianuarie"; break;
        case 2: nume = "Februarie"; break;
        case 3: nume = "Martie"; break;
        case 4: nume = "Aprilie"; break;
        case 5: nume = "Mai"; break;
        case 6: nume = "Iunie"; break;
        case 7: nume = "Iulie"; break;
        case 8: nume = "August"; break;
        case 9: nume = "Septembrie"; break;
        case 10: nume = "Octombrie"; break;
        case 11: nume = "Noiembrie"; break;
        case 12: nume = "Decembrie"; break;
    }
    var copyright = document.querySelector(".copyright");
    copyright.innerHTML += " " + an; 
}

/* Modifica dimensiunea imaginii principale */

function Repair_Main_Photo()
{
    var imagine = document.querySelector(".main-container");
    var IMG_Width = imagine.clientWidth;
    if(window.innerWidth > 760)
    {
        var const_Rap = 2.775;
        imagine.style.height = String(Math.round(IMG_Width / const_Rap)) + "px";
    }
    else 
    {
        var const_Rap = 1.508;
        imagine.style.height = String(Math.round(IMG_Width / const_Rap)) + "px";
    }
}

function Change_Photo_Main()
{
    var imagine = document.querySelector(".main-container");
    if(window.innerWidth < 760)
    {
        
        imagine.style.backgroundImage = "url(/mentors/photos/central/p1_bg_mobile.jpg)";
    }
    else
    {
        imagine.style.backgroundImage = "url(/mentors/photos/central/p1_bg.jpg)";
    }
}