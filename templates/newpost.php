<html>
<head>
  <title>Bootstrap Example</title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
  <link rel='stylesheet' href='public/style.css'/>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
</head>
<body>
	<div class="container">
	  <!-- Trigger the modal with a button -->
	  <button type="button" class="btn btn-info btn-lg" data-toggle="modal" data-target="#myModal">Create a new blog post</button>

	  <div class="modal fade" id="myModal" role="dialog">
	    <div class="modal-dialog modal-lg">
	      <div class="modal-content">
	        <div class="modal-header">
	          <button type="button" class="close" data-dismiss="modal">&times;</button>

	          
			          <h4 class="modal-title"> Title: <input onchange="titleChange(this)" class="form-control title-write" placeholder='Write a post title' /></h4>
			        </div>
			        <div class="modal-body">
			          <p><textarea onchange="desciptionChange(this)" class="form-control" rows="5" id="comment" placeholder='spice up your post with some content'></textarea>
			          <br/>
			           <strong>Image:</strong>
			          <button type='button' class='myimg use-yourown-image'>Use your own image</button> <button type='button' class='myimg search-for-img'>Search for gifs</button>
			           <br/><br/>
			          <input onchange="imageChange(this)" class="form-control your-image-url" placeholder='insert your image url here' />

			          <input type='text' onchange="gifCall(this)" class="form-control image-search" placeholder='search for a gif' />
			          <div class='img-holder'>
			          </div>
			          </p>
			        </div>
			        <br/>
			        <div class="modal-footer">

			        <button class="btn my-img-submit">Submit</button>
	      
	          <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
	        </div>
	      </div>
	    </div>
	  </div>
	</div>
	<script>
	let imgs = '';
	let imageData = {
		title: '',
		content: '',
		image: ''
	}


	$('.your-image-url').hide();
	$('.image-search').hide();

		$('.use-yourown-image').click(function(){
			$('.your-image-url').show();
			$('.image-search').hide();
			$('.img-holder').hide();
		})
		$('.search-for-img').click(function(){
			$('.your-image-url').hide();
			$('.image-search').show();
			$('.img-holder').show();
		})
		$('.title-write').on('keypress', function(e) {
		    return e.which !== 13;
		});
		$('.image-search').on('keypress', function(e) {
			if(e.which == 13){
				gifCall(e.target)
			}
			return e.which !== 13;
		});

		$('.my-img-submit').click(function(){
			    request = $.ajax({
			        url: '../posts/create.php',
			        type: "post",
			        data: imageData
			    });
		})




		function selectImg(id,src){
			$('.api-img').css('border','none');
			$('#'+id).css('border','#f1c40f 2px solid');
			imageData["image"] = src;
		}
		function gifCall(a){
			imgs = '';
			$.get(`http://api.giphy.com/v1/gifs/search?q=${a.value}&api_key=dc6zaTOxFJmzC&limit=6`,function(data){
				data['data'].forEach(function(img,i){
					if(img["rating"] === 'pg' || img["rating"] === 'g' || img["rating"] === 'y' || img["rating"] === 'pg-13'){

						imgs += "<img onclick='selectImg(this.id,this.src)' class='api-img' id='"+i+"' src='" + img["images"]["original"]["url"] + "' alt='this image is not available'/>";	
					}
				})
				document.getElementsByClassName('img-holder')[0].innerHTML = imgs;
			})
		}
		function titleChange(tag){
			imageData["title"] = tag.value;
		}
		function desciptionChange(tag){
			imageData["content"] = tag.value;
		}
		function imageChange(tag){
			imageData["image"] = tag.value;
		}
	</script>
</body>
</html>