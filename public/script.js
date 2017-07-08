$(document).ready(function(){
	$('.signupform').hide();
	$('.log-out').hide();
	$('.new-description').hide();
	$('.new-bg').hide();
	$('.edit-image-search').hide();
	$('.edit-image-url').hide();


	$('.mysignup').click(function(){
		$('.loginform').hide();
		$('.signupform').show();
	})

	$('.mylogin').click(function(){
		$('.signupform').hide();
		$('.loginform').show();
	})	
	$('.log-out').click(function(){
		window.location = '../users/session-destroy.php';
	})
	$('.user-session-logout').hover(function(){
		$('.log-out').show();
	},
	function(){
		$('.log-out').hide();
	})
	$('.edit-user-description').click(function(){
		$('.new-description').show();
	})

	$('.new-desc').submit(function(e){
		e.preventDefault();
		$.post(`../users/new-description.php/?description=${e.target.description.value}`);
		$('.new-description').hide();
		$('.current-users-descr').text(e.target.description.value);
	})

	$('.user-bgImage').hover(function(){
		$('.new-bg').show();
	})
	$('.intro-header').hover(function(){
		$('.new-bg').hide();
	});
	$('.new-backg').submit(function(e){
		e.preventDefault();
		console.log(e.target.bg.value);
		$.post(`../users/background.php/?bg=${e.target.bg.value}`);
	})

	$('.search-for-img').click(function(){
		$('.edit-image-search').show();
		$('.edit-image-url').hide();
	})
	$('.edit-yourown-image').click(function(){
		$('.edit-image-url').show();
		$('.edit-image-search').hide();
	})
})

let editImgs;
let editData = {
		title: '',
		content: '',
		image: ''
	}

function editTitle(tag){
	editData['title'] = tag.value;
	console.log(editData);
}	
function editContent(tag){
	editData['content'] = tag.value;
	console.log(editData);
}
function editImageInput(tag){
	editData['image'] = tag.value;
	console.log(editData);
}
function pickImage(tagid,url){
	$('.edit-api-img').css('border','none');
	$('#'+tagid).css('border','#f1c40f 2px solid');
	editData['image'] = url;
	console.log(editData);
}
function getEditData(id){
	$.get('../posts/show.php?id='+id,function(post){
		let data = JSON.parse(post);
		console.log(data);
		console.log(data['content']);
		$('.edit-title-write').val(data['title']);
		$('.edit-content').val(data['content']);
		$('.edit-image-url').val(data['image']);

		editData['title'] = data['title'];
		editData['content'] = data['content'];
		editData['image'] = data['image'];
	})
}
function editGifCall(search){
			editImgs = '';
			$.get(`http://api.giphy.com/v1/gifs/search?q=${search.value}&api_key=dc6zaTOxFJmzC&limit=6`,function(data){
				console.log(data['data'].length);
				if(data['data'].length === 0){
					console.log('noooo')
					document.getElementsByClassName('edit-img-holder')[0].innerHTML = '<p>No images found</p>'
				}else{ 
					data['data'].forEach(function(img,i){
						if(img["rating"] === 'pg' || img["rating"] === 'g' || img["rating"] === 'y' || img["rating"] === 'pg-13'){

							editImgs += "<img onclick='pickImage(this.id,this.src)' class='edit-api-img' id='"+i+"' src='" + img["images"]["original"]["url"] + "' alt='this image is not available'/>";	
						}
					})
				document.getElementsByClassName('edit-img-holder')[0].innerHTML = editImgs;
				}
			}) //end of get ajax call
}

function editImgSubmit(id){
	console.log('editData',editData);
	console.log('submitting editData to post ' + id );
	$.ajax({
		url: '../posts/update.php?id='+id,
		type: "POST",
		data: editData
	});
}







