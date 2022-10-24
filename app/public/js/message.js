// $(function() {
//     get_data();
// });

// 送信ボタンを押した時
$("#click_btn").on("click", function(event){
    event.preventDefault();
    // get_data();
    send_data();
    
});

// suer_chatsのデータ

//　表示
function get_data() {
    $.ajax({
        url: "/result/ajax/",
        dataType: "json",
        success: data => {
        
        },
        error: () => {
            alert("ajax Error");
        }
    });
 setTimeout("get_data()", 5000);
}

// 登録
function send_data() {
    let element = document.getElementById('to_id');   
    let to_id = element.dataset.toid;
    let message = document.chat.message.value;
    $.ajax({
        url: "/userchat",
        method: "POST",
        dataType: "json",
        headers: {
            'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
        },
        data: {
            'message':message,
            'to_id':to_id,
        },
        success: data => {
            $("#comment-data")
            .find(".comment-visible")
            .remove();
            for (var i = 0; i < data.comments.length; i++) {
                var html = `
                            <div class="media comment-visible">
                                <div class="media-body comment-body mb-4">
                                <span class="comment-body-user" id="name style="font-size:2px;">${data.comments[i].name}</span>
                                    <div class="">
                                    <span class="comment-body-content" id="comment" style="background-color:#f5f5f5;">${data.comments[i].message}</span>
                                        </div>
                                        <span class="comment-body-time" style="font-size:2px;" id="created_at">${data.comments[i].created_at}</span>
                                </div>
                            </div>
                        `;
                $("#comment-data").append(html);
            }
        },
        error: (e) => {
            alert("ajax Error");
            console.log(e);
        }
    })
}

