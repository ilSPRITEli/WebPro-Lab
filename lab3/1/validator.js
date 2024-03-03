/** File : validator.js **/
function validateForm() {    
    /* 
       let fname = document.forms["myForm"]["FirstName"].value;
       let fname = document.forms.myForm.FirstName.value;
    */
    let id = document.forms["myForm"]["iden"].value;
    if (id.length < 13 || id.length > 13) {
        alert("ID must be 13 digits");
        return false;
    }

    let fname = document.getElementById("fname").value;
    if (fname.length < 3 ) {
        alert("Firstname must be filled out");
        return false;
    }

    let lname = document.forms["myForm"]["lname"].value;
    if (lname.length < 3 ) {
        alert("Lastname must be filled out");
        return false;
    }

    let address = document.forms["myForm"]["adrs"].value;
    if (address.length < 15 ) {
        alert("Address must be filled out");
        return false;
    }

    let tumbol = document.forms["myForm"]["tmb"].value;
    if (tumbol.length < 2 ) {
        alert("Tumbol must be filled out");
        return false;
    }

    let amphur = document.forms["myForm"]["amp"].value;
    if (amphur.length < 2 ) {
        alert("Amphur must be filled out");
        return false;
    }

    let zip = document.forms["myForm"]["inputZip"].value;
    if (zip.length < 5 || zip.length > 5) {
        alert("Zip must 5 digits");
        return false;
    }


    // let country = document.forms["myForm"]["Country"].value;
    // if (country =="00" ) {
    //     alert("Country must be selected");
    //     return false;
    // }
}

/**
     - การตรวจสอบความยาวของตัวอักษร
     let str = new String( "This is string" );
     document.write("str.length is:" + str.length);
     // str.length is: 14
     - การหาตำแหน่งข้อความในชุดตัวอักษร
     let str = "Hello world, welcome to the universe.";
     let n = str.indexOf("welcome"); 
     // n = 13
*/
