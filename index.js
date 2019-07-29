/* eslint-disable no-undef */
$(document).ready(function(){
    $('.comment').on('click', '#delete-comment', function(e){
        const id = $(e.target).attr('data-id')
        const username = $(e.target).attr('data-name')
        if(confirm('Are you sure?')===true){
            $(e.target).parent('.comment').hide(200);
            $(e.target).parent('.sub_comment').hide(200);
            
        $.ajax({
        type: 'POST',
        url: './delete.php',
        data: {
            id,
            username
        }
        });
        }
    })
    $('.container').on('click', '#update-comment', function(e){
        const id = $(e.target).attr('data-id')
        const content = $.trim($(e.target).prev().text());
        let newTextarea = `
        <textarea name="updateContent" id="updateContent" cols="30" rows="10" placeholder="">${content}</textarea>
        <input type="button" name="save" id="update-btn" value="完成" data-id="${id}">
        `;
        $(e.target).prev().empty()
        $('input').hide()
        $('.add_sub_commemt').hide()
        $(e.target).prev().append(newTextarea)
    })
    $('.container').on('click', '#update-btn', function(e){
        const id = $(e.target).attr('data-id')            
        const updateContent = $.trim($(e.target).parent().find('textarea[name="updateContent"]').val());
        const newContent =
        `<div class="addcontent">${updateContent}</div>`;
        $(e.target).parent().find('textarea[name="updateContent"]').hide().empty();
        $(e.target).before(newContent)
        $('input').show()
        $('.add_sub_commemt').show()
        $('input[id="update-btn"]').hide();
        $.ajax({
        type: 'POST',
        url: './update.php',
        data: {
            id,
            updateContent
        }
        });
    })
    
    $('.container').on('submit', '#postComment',function( event ) {
    event.preventDefault();
    var response = '';
     $.ajax({
        type: 'POST',
        url: './process.php',
        data: $(this).serialize(),
        async: false,
        success : function(text)
        {
            response = text;
        }
        });
        let commentInfo = jQuery.parseJSON( response );
        let newContent =`
        <div class="comment">
        <div class="div"><h1>${commentInfo.nickname}</h1></div>
        <div class="div"><span>${commentInfo.created_at}</span></div>
        <div class="addcontent">${commentInfo.content}</div>
        <input type="button" value="update" id="update-comment" data-id="${commentInfo.id}" data-name="${commentInfo.username}">
        <input type="button" value="delete" id="delete-comment" data-id="${commentInfo.id}" data-name="${commentInfo.username}">
        <div class="add_sub_commemt">
        <form action="./process.php" method="POST" id="postComment">
        <input type="hidden" name="nickname" value="${commentInfo.nickname}">
        <input type="hidden" name="parent_id" value="${commentInfo.id}">
        <p>新增留言</p><textarea name="content" id="content" cols="30" rows="10" placeholder=""></textarea>
        <input type="submit" name="save" id="save-btn"value="發佈">
        </form>
        </div>
        </div>
        `
        let ownComment = `<div class="own_comment">
        <div class="div"><h1>${commentInfo.nickname}</h1></div>
        <div class="div"><span>${commentInfo.created_at}</span></div>
        <div class="div"><p>${commentInfo.content}</p></div>
        <input type="button" value="update" id="update-comment" data-id="${commentInfo.id}" data-name="${commentInfo.username}" >
        <input type="button" value="delete" id="delete-comment" data-id="${commentInfo.id}" data-name="${commentInfo.username}">
        </div>`;
        let parent_id = commentInfo.parent_id;
        
        if (parent_id === 0){
            $('.reply').after(newContent)
        }else{
            $('.add_sub_commemt').before(ownComment)
        }

    });
})
