if (document.cookie.match(/((^| ))check_popup=([^;]+)/) == null) {
    const popup = document.createElement("div");
    const cookie = document.createElement("div");
    const msg = document.createElement('div');
    const choice = document.createElement('div');
    const yes = document.createElement('div');
    const no = document.createElement('div');
    popup.className = "popup";
    cookie.className = "cookie";
    choice.className = "choice";
    msg.className = "msg";
    msg.innerHTML = "Autorisez-vous l'utilisation des cookies?";
    yes.className = "yescookie";
    yes.innerHTML = "Yes";
    no.className = "nocookie";
    no.innerHTML = "No";
    cookie.appendChild(msg);
    cookie.appendChild(choice);
    choice.appendChild(yes);
    choice.appendChild(no);
    popup.appendChild(cookie);
    document.body.appendChild(popup);
    document.querySelector('.main_wrapper').style.pointerEvents = "none";
    document.getElementById('footer').style.pointerEvents = "none";
    document.getElementById('header').style.pointerEvents = "none";
    document.body.style.overflow = "clip";

    yes.addEventListener("click", acceptCookie);
    no.addEventListener("click", refuseCookie);
}

function acceptCookie() {
    document.cookie = "check_popup=1";
    document.querySelector(".popup").remove();
    document.querySelector('.main_wrapper').style.pointerEvents = "";
    document.body.style.overflow = "";
    document.getElementById('footer').style.pointerEvents = "";
    document.getElementById('header').style.pointerEvents = "";
}

function refuseCookie() {
    document.cookie = "check_popup=0";
    document.querySelector(".popup").remove();
    document.querySelector('.main_wrapper').style.pointerEvents = "";
    document.body.style.overflow = "";
    document.getElementById('footer').style.pointerEvents = "";
    document.getElementById('header').style.pointerEvents = "";
}