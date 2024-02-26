function showLoading(){
    document.getElementById("dialog-box").style.display = "none";
 document.getElementById("overlay").style.display = "flex";
 document.getElementById("dialog").style.display = "block";
 document.getElementById("subway-loader").style.display = "block";

//  document.getElementById("subway-loader").style.display = "block"

}

function showsucess(){
  document.getElementById("overlay").style.display = "flex";
  document.getElementById("dialog").style.display = "block";
    var dialog_icon= document.getElementById("dialog_icon");
    dialog_icon.innerHTML="&#10003;"
    dialog_icon.style.color = "#0f0";
    document.getElementById("subway-loader").style.display = "none";
    document.getElementById("dialog-box").style.display = "block";
    document.getElementById("dialog_button").style.backgroundColor = "#0f0";
    
}
function showfaild(){

   document.getElementById("overlay").style.display = "flex";
 document.getElementById("dialog").style.display = "block";
    var dialog_icon= document.getElementById("dialog_icon");
    document.getElementById("subway-loader").style.display = "none";
    document.getElementById("dialog-box").style.display = "block";
    dialog_icon.innerHTML="&#10060;"
    dialog_icon.style.color = "red";
    document.getElementById("dialog_button").style.backgroundColor = "red";
    //dialog_button 
    //&#10003;

}
window.addEventListener("click", function(event) {
    var overlay = document.getElementById("overlay");
   var dialog =document.getElementById("dialog");
  var subway_loader =document.getElementById("subway-loader");
//   var btn=document.getElementById("dialog_button");
  if (event.target == overlay && subway_loader.style.display == "none") {
    overlay.style.display = "none";
    dialog.style.display = "none";
  }
//   if(event.target===btn){
//     hide_dialog();
//   }
});
function hide_dialog(){
    document.getElementById("overlay").style.display = "none";
    document.getElementById("dialog").style.display = "none";
};

// $(document).on('keydown','#overlay',function(event){
//   if($("#dialog").css('display') == "block")
//      hide_dialog();
//   })
// document.getElementById("dialog-box").addEventListener("keydown", function(event) {
//   // var overlay = document.getElementById("overlay");
// //  var dialog =document.getElementById("dialog");
// // //   var btn=document.getElementById("dialog_button");
// // if (event.code==="Enter" && dialog.style.display == "block") {
// //   hide_dialog();
// // }
// hide_dialog();
// });
// $(document).find('#dialog-box').on('keypress',function(event){
//   if(document.getElementById("dialog").style.display == "block")
//      hide_dialog();
// })

//make vibration
function makevibration(){
  if('vibrate' in navigator){
    navigator.vibrate([1000,900,500]);
    console.log('oo');
  }else{
    console.log('ll');
  }
}
// Create an AudioContext object
// var context = new (window.AudioContext || window.webkitAudioContext)();

// // Define a function to play a sound
// function playSound() {
//   var osc = context.createOscillator();
//   // Set the oscillator waveform type to square
//   osc.type = 'triangle';
//   // Set the oscillator frequency to the note value
//   osc.frequency.value =440;
//   // Connect the oscillator to the audio destination
//   osc.connect(context.destination);
//   // Start the oscillator
//   osc.start();
//   // Stop the oscillator after 0.5 seconds
//   osc.stop(context.currentTime + 0.5);
// }