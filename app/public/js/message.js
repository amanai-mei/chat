// $(function() {
//     get_data();
// });

// 送信ボタンを押した時
$("#click_btn").on("click", function(event){
    event.preventDefault();
    send_data();
    var textForm = document.getElementById("message");
    textForm.value = '';      
});

// user_chatsのデータ

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
                if(data.comments[i].user_id == 25){
                var html = `
                            <div class="media comment-visible">
                                <div class="media-body comment-body">
                                <span class="user1" id="name">${data.comments[i].name}</span>
                                    <div class="">
                                    <span class="comment1" id="comment">${data.comments[i].message}</span>
                                        </div>
                                        <span class="time" id="created_at">${data.comments[i].created_at}</span>
                                </div>
                            </div>
                            `;
                }else{
                    var html = `
                            <div class="media1 comment-visible">
                                <div class="media-body comment-body">
                                <span class="user" id="name1">${data.comments[i].name}</span>
                                    <div class="">
                                    <span class="comment" id="comment1">${data.comments[i].message}</span>
                                        </div>
                                        <span class="time" id="created_at1">${data.comments[i].created_at}</span>
                                </div>
                            </div>
                        `;
                }
                $("#comment-data").append(html);
            }

        },
        error: (e) => {
            alert("ajax Error");
            console.log(e);
        }
    })
}

