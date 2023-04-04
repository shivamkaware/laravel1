$(document).ready(function(){
	$('#image').on('change', function(){ //on file input change
		if (window.File && window.FileReader && window.FileList && window.Blob) //check File API supported browser
    	{
			$('#thumb-output').html(''); //clear html of output element
			var data = $(this)[0].files; //this file data

			$.each(data, function(index, file){ //loop though each file
				if(/(\.|\/)(gif|jpe?g|png)$/i.test(file.type)){ //check supported file type
					var fRead = new FileReader(); //new filereader
					fRead.onload = (function(file){ //trigger function on successful read
					return function(e) {
						var img = $('<img/ width="100px" height="100px">').addClass('thumb').attr('src', e.target.result); //create image element
						$('#thumb-output').append(img); //append image to output element
					};
				  	})(file);
					fRead.readAsDataURL(file); //URL representing the file's data.
				}
			});

		}else{
			alert("Your browser doesn't support File API!"); //if File API is absent
		}
	});
});


let a = document.getElementById("error")[0]
 a.click(function() {
    $(document).Toasts('create', {
      class: 'bg-success',
      title: 'Toast Title',
      subtitle: 'Subtitle',
      body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
    })
  });

  $url = '/product/form';
$headers = get_headers($url);

if (strpos($headers[0], '200') !== false) {
    // HTTP status code 200 was returned, so execute your function here
    $(document).Toasts('create', {
        class: 'bg-success',
        title: 'Toast Title',
        subtitle: 'Subtitle',
        body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
      })
}

//   let a = document.getElementById("error")
//  $('.toastsDefaultSuccess').click(function() {
//     $(document).Toasts('create', {
//       class: 'bg-success',
//       title: 'Toast Title',
//       subtitle: 'Subtitle',
//       body: 'Lorem ipsum dolor sit amet, consetetur sadipscing elitr.'
//     })
//   });
