var swiper = new Swiper('.swiper-container', {
    navigation: {
      nextEl: '.swiper-button-next',
      prevEl: '.swiper-button-prev',
    },effect: "cube",
});

$(function() {

    // 海賊団設定にチェックされたらボタン表示
   $('#button').prop('disabled', true);

   $('.selectBtn').on('click', function() {
       if ($(this).prop('checked') == false ) {
        $('#button').prop('disabled', true);
       } else {
           $('#button').prop('disabled', false);
       }
   })
});

$(function () {
    
    $("#btn").on("click", function() {
        let name = $(".name").val;
        let reward = $(".reward").val;
        let file = $(".file");

        if (name == "") {
            alert();
        }
    })
})

