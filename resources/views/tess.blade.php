<head>
{{-- <link rel="stylesheet" href="{{ asset ("assets/admin/css/bootstrap-switch.css") }}" />
<link href="{{ asset ("assets/admin/css/style.css") }}" rel="stylesheet">
<link href="{{ asset ("assets/admin/css/style-responsive.css") }}" rel="stylesheet" />
 --}}

{{-- RISUL LARAVEL LIKE COMMENT --}}
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/icon.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/comment.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/form.min.css" rel="stylesheet">
    <link href="//cdnjs.cloudflare.com/ajax/libs/semantic-ui/2.2.2/components/button.min.css" rel="stylesheet">
    <link href="{{ asset('/vendor/laravelLikeComment/css/style.css') }}" rel="stylesheet">
{{-- RISUL LARAVEL LIKE COMMENT --}}



<script src="http://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js">
</script>
<script>
$(document).ready(function(){
    $('#purpose').on('change', function() {
      if ( this.value == '1')
      //.....................^.......
      {
        $("#business").show();
        $("#personal").hide();
      }
      else
      {
        $("#business").hide();
        $("#personal").show();
      }
    });
});
</script>

</head>



<body>

Check

@include('laravelLikeComment::like', ['like_item_id' => '21'])

@include('laravelLikeComment::comment', ['comment_item_id' => '21'])




<select id='purpose'>
<option value="0">Personal use</option>
<option value="1">Business use</option>
<option value="2">Passing on to a client</option>
</select>

<div id='personal'>Personal Name<br/>&nbsp;
<br/>&nbsp;
    <input type='text' class='text' name='business' value size='20' />
    <br/>
</div>

<div style='display:none;' id='business'>Business Name<br/>&nbsp;
<br/>&nbsp;
    <input type='text' class='text' name='business' value size='20' />
    <br/>
</div>











{{-- RISUL LARAVEL LIKE COMMENT --}}
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.0/jquery.min.js"></script>
  <script src="{{ asset('/vendor/laravelLikeComment/js/script.js') }}" type="text/javascript"></script>
{{-- RISUL LARAVEL LIKE COMMENT --}}

{{-- 
<script src="{{ asset ("assets/admin/js/jquery-1.8.3.min.js") }}"></script>
<script src="{{ asset ("assets/admin/bs3/js/bootstrap.min.js") }}"></script>
<script src="{{ asset ("assets/admin/js/bootstrap-switch.js") }}"></script>
<script src="{{ asset ("assets/admin/js/select2/select2.js") }}"></script>
<script src="{{ asset ("assets/admin/js/toggle-init.js") }}"></script>
 --}}
</body>