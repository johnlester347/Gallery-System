$(document).ready(function(){

        var user_href;
        var user_href_splitted;
        var user_id;
        var image_src;
        var image_href_splitted;
        var image_name;
        var photo_id;


	//Enables the button when click an image in modal and getting data with ajax
	$(".modal_thumbnails").click(function(){
		
		$("#set_user_image").prop('disabled',false);
		
		
		$(this).addClass('selected');
		
		//Getting the the href from the delete anchor tag
		user_href = $("#user-id").prop('href');
		
		//Splitting the value into array and getting only the id
		user_href_splitted = user_href.split("=");
		user_id = user_href_splitted[user_href_splitted.length - 1];
		
		//Src of clicked image
		image_src = $(this).prop("src");
		image_src_splitted = image_src.split("/");
		image_name = image_src_splitted[image_src_splitted.length - 1];
		
		//Geting photo_id from data property
		photo_id = $(this).attr("data");
		
		$.ajax({
			
			url:"includes/ajax_code.php",
			data:{photo_id:photo_id},
			type: "POST", 
			success : function(data){
				
				
				//Test if we Get data from the server
				if(!data.error){
					
					//Pass the data to sidebar from ajax_code.php
					$("#modal_sidebar").html(data);
					
				}
				
			}
			
			
		})
		
		
		
	
	});
        
        //Getting image name when clicking apply in our modal
        $("#set_user_image").click(function(){

                $.ajax({

                url: "includes/ajax_code.php",
                data: {image_name: image_name, user_id:user_id},
                type: "POST",
                success:function(data){

                        if(!data.error){

                                $(".user_image_box a img").prop('src', data);
                                // location.reload();
                        }

                }


                });

        });        
                
                
                
                        
        });
                

// ClassicEditor
// .create( document.querySelector( '#editor' ) )
// .then( editor => {
//         console.log( editor );
// } )
// .catch( error => {
//         console.error( error );
// } );
