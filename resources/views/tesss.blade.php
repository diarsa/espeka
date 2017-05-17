{{-- 
<form method="POST" id="post_up" action="">
    <input type="hidden" name="post"  value="12" />
    <input type="hidden" name="user"  value="{{ Auth::user()->id }}" />
    <button type="submit" class="btn btn-default" aria-label="Left Align">
        <span class="glyphicon glyphicon-menu-up" aria-hidden="true"></span>
    </button>
</form>

<script type="text/javascript" src="https://code.jquery.com/jquery-2.2.1.js"></script>
<script type="text/javascript">
    $(function(){
        $(#errors_).hide();
        $(#post_up).submit(function(e){
                e.preventDefault();
                var post = $('input[name="post"]').val();
                var user = $('input[name="user"]').val();
                var data = new FormData();
                data.append('user',user);
                data.append('post',post);
                $.ajax({
                    url:'tesss/post_vote_up',
                    type:'POST',
                    data:data,
                    contentType:"multipart/form-data",
                    processData:false,
                    success:function(data){alert('Section created :)')},
                    error:function(data){
                        $(#errors_).show();
                        $(#errors_).html('');
                        var errors = data.responseJSON;
                        $.each(errors,function(k,v){
                            $(#errors_).append(v+'<br>');
                        })
                    }
                });
            }
        })
    })
</script> --}}


