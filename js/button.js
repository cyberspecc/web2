var count = 0;
document.getElementById("myButton").onclick = function (){
    count++;
    if (count % 2 == 0){
        //  close image
        document.getElementById("demo").innerHTML = "";
    } else{
        //open image
        var img = document.createElement("img");
        img.classList = "img1";
        img.src = "https://cs2.livemaster.ru/storage/95/c5/f923ad7f34f80836cda1f0f5cc6d--kartiny-i-panno-kartina-s-kotami-podarok-rebenku-kartina-s-zh.jpg";
        document.getElementById("demo").appendChild(img);
    }
}