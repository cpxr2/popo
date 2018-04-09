var long = $(".navbar").width();
var moins = ((long*7)/100);

$(".alert").width(long - moins);
console.log($(".navbar").width());

$(".alert").slideDown(3000, function(){
    $(".alert").slideUp(3000)
})
