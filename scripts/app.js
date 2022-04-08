function searchCommentNews(){
    let news_id =  $("#newsId").val();
    $.ajax({
        url : './includes/comments_inc.php',
        type : 'POST',
        data : { 'id': news_id, 'ajax_submit' : 1 },
        success: function (response){
           let data_array = $.parseJSON(response);
           let html = "";
           for(let key of data_array){
              if(key['PARENT'] == null){
                  html = html.concat('<div id="',key['ID'],'" class="comment_row"><h5>',key['TEXT'],'</h5></div>');
              }
           }
           $("#ajaxResponse").html(html);
           for(let key of data_array){
            if(key['PARENT'] != null){
                let innerComment = "";
                innerComment = innerComment.concat('<div id="',key['ID'],'" class="comment_row"><h5>--',key['TEXT'],'</h5></div>');
                $(innerComment).insertAfter('#'+key['PARENT']+' h5:last-child');
            }
         }
        },
        error: function (jqXHR,status,error){
            console.log(status);
            console.log(error);
        },
        complete: function (jqXHR,status){
            console.log("Peticion completa");
        }
    });
}