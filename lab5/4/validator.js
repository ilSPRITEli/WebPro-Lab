
let y = 0;

let s = checkLocal();
let dat;
let x;
if (s <= 1){
    dat = [];
    x = 0;
}else{
    dat = JSON.parse(window.localStorage.getItem("dat"));
    x = window.localStorage.getItem("x");
    document.addEventListener("DOMContentLoaded", function () {
        showLocalData();
    });
}
// localStorage.clear();


function validateForm() {
    function showAlert(message) {
        alert(message);
        return false;
    }

    const getValue = (elementId) => document.getElementById(elementId).value;

    const id = getValue("iden");
    if (id.length !== 13) {
        return showAlert("ID must be 13 digits");
    }

    const fname = getValue("fname");
    if (fname.length < 3) {
        return showAlert("Firstname must be filled out");
    }

    const lname = getValue("lname");
    if (lname.length < 3) {
        return showAlert("Lastname must be filled out");
    }

    const address = getValue("adrs");
    if (address.length < 15) {
        return showAlert("Address must be filled out");
    }

    const tumbol = getValue("tmb");
    if (tumbol.length < 2) {
        return showAlert("Tumbol must be filled out");
    }

    const amphur = getValue("amp");
    if (amphur.length < 2) {
        return showAlert("Amphur must be filled out");
    }

    const zip = getValue("zip");
    if (zip.length !== 5) {
        return showAlert("Zip must be 5 digits");
    }

    const title = $('input[name="title"]:checked').val();
    const province = $('#prv').val();

    SaveDatInForm(id, title, fname, lname, address, tumbol, amphur, province, zip);
}


function SaveDatInForm(id, title, fname, lname, address, tumbol, aumphur, province, zip) {
    var p = checkLocal();
    if (p <= 1){
        dat = [];
        x = 0;
    }

    let wow2 = {"id":id, "title":title, "fname":fname, "lname":lname, "address":address, "tumbol":tumbol, "aumphur":aumphur, "province":province, "zip":zip};
    dat.push(wow2);
    window.localStorage.setItem("dat", JSON.stringify(dat));
    // console.log(dat);

    x++;
    window.localStorage.setItem("x", x);

}

function showLocalData() {
    var p = checkLocal();
    if (p <= 1){
        alert("No data in local storage");
    }

    let table = document.getElementById("myTable");
    
    let yeet = JSON.parse(window.localStorage.getItem("dat"));
    for(i = y ; i < yeet.length ; i++) {
        let row = document.createElement("tr");

        createCell(row, yeet[i].id);
        createCell(row, yeet[i].title);
        createCell(row, `${yeet[i].fname} ${yeet[i].lname}`);
        createCell(row, `${yeet[i].address} ${yeet[i].tumbol} ${yeet[i].aumphur}`);
        createCell(row, yeet[i].province);
        createCell(row, yeet[i].zip);

        table.appendChild(row);
        y++;
    }


}

function createCell(row, value) {
    let cell = document.createElement("td");
    cell.innerHTML = value;
    cell.className = "tu";
    row.appendChild(cell);
}

function checkLocal(){
    let z = localStorage.length;
    console.log(z);
    return z;
}
