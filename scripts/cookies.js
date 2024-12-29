function setCookie(cname, cvalue, exseconds) {
    const d = new Date();
    d.setTime(d.getTime() + (exseconds * 1000));
    let expires = "expires=" + d.toUTCString();
    document.cookie = cname + "=" + cvalue + ";" + expires + ";path=/";
}

function getCookie(cname) {
    let name = cname + "=";
    let decodedCookie = decodeURIComponent(document.cookie);
    let ca = decodedCookie.split(';');
    //alert('documentCookie: ' + decodedCookie);
    for (let i = 0; i < ca.length; i++) {
        let c = ca[i].split('=');
        if (c.length >= 2) {
            if (c[0].trim() === cname.trim()) {
                // console.log('c[0]:' + c[0]);
                // console.log('c[1]:' + c[1]);
                return c[1];
            }
        }
    }
    return null;
}

function deleteCookie(nombre) {
    document.cookie = nombre + "=; path=/; expires=Thu, 01 Jan 1970 00:00:00 UTC;";
}

export {setCookie, getCookie,deleteCookie};