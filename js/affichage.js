let charparchar = document.getElementById('MicroClub');




function afficher(i, k) {
    var myTimeout = setTimeout(function() {
        charparchar.innerHTML = ""
    }, i = i + k);

    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "M"
    }, i = i + k);

    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Mi"
    }, i = i + k);
    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Mic"
    }, i = i + k);

    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Micr"
    }, i = i + k);
    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Micro <br/>"
    }, i = i + k);

    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Micro <br/> C"
    }, i = i + k);
    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Micro <br/>Cl"
    }, i = i + k);
    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Micro <br/>Clu"
    }, i = i + k);
    myTimeout = setTimeout(function() {
        charparchar.innerHTML = "Micro <br/>Club"
    }, i = i + k);
    return i;
}

j = 0;
for (let i = 0; i < 10000; i++) {
    j = afficher(j, 500);


}

