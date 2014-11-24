//When you hover on the detail logo, change the period at the end to red (sexy)
$(function () {
    $("a.logo").hover(function () {
        $('.dot').css('color', 'red')
    }, function () {
        $('.dot').css('color', 'black')
    })
});



