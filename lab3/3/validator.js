function expand(){
    one = document.getElementById("y1").animate([
        // key frames
        {width: '10%'},
        { width: '60%' }
      ], {
        // sync options
        duration: 300,
        iterations: 1
      });
      document.getElementById("y1").style.width = "60%";


    two = document.getElementById("y2").animate([
        // key frames
        {width: '10%'},
        { width: '90%' }
      ], {
        // sync options
        duration: 300,
        iterations: 1
      });
      document.getElementById("y2").style.width = "90%";


    three = document.getElementById("y3").animate([
        // key frames
        {width: '10%'},
        { width: '50%' }
      ], {
        // sync options
        duration: 300,
        iterations: 1
      });
      document.getElementById("y3").style.width = "50%";


    four = document.getElementById("y4").animate([
        // key frames
        {width: '10%'},
        { width: '80%' }
      ], {
        // sync options
        duration: 300,
        iterations: 1
      });
      document.getElementById("y4").style.width = "80%";


    five = document.getElementById("y5").animate([
        // key frames
        {width: '10%'},
        { width: '75%' }
      ], {
        // sync options
        duration: 300,
        iterations: 1
      });
      document.getElementById("y5").style.width = "75%";

}
