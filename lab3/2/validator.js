function swaps(yed){
    // const yed = document.getElementById("one");
    if (yed.src.match("http://10.0.15.21/lab/lab3/images/1.png")){
        // alert("wow");
        yed.src = "http://10.0.15.21/lab/lab3/images/3.png";
    }
    else if(yed.src.match("http://10.0.15.21/lab/lab3/images/2.png")){
        // alert("wow");
        yed.src = "http://10.0.15.21/lab/lab3/images/1.png";
    }else if(yed.src.match("http://10.0.15.21/lab/lab3/images/3.png")){
        // alert("wow");
        yed.src = "http://10.0.15.21/lab/lab3/images/4.png";
    }else if(yed.src.match("http://10.0.15.21/lab/lab3/images/4.png")){
        // alert("wow");
        yed.src = "http://10.0.15.21/lab/lab3/images/2.png";
    }
    // return

}


function swap(){
    const one = document.getElementById("one");
    const two = document.getElementById("two");
    const three = document.getElementById("three");
    const four = document.getElementById("four");

    swaps(one);
    swaps(two);
    swaps(three);
    swaps(four);
    
    return
}