function BrowseServer( startupPath, elementId ){
	
		    CKFinder.basePath = 'ckfinder/'; //Đường path nơi đặt ckfinder
		    // CKFinder.startupPath = startupPath; //Đường path hiện sẵn cho user chọn file
		    CKFinder.popup({
		    	chooseFiles: true,
		    	// width: 800,
		    	// height: 600,
		    	onInit: function( finder ) {
		    		finder.on( 'files:choose', function( evt ) {
		    			var file = evt.data.files.first();
		    			var output = document.getElementById( elementId );
		    			var pathFile = file.getUrl();
		    			output.value = pathFile;
		    			if(elementId == 'urlImage')
		    				displayThumb(pathFile);
		    			
		    		} );

		    		finder.on( 'file:choose:resizedImage', function( evt ) {
		    			var output = document.getElementById( elementId );
		    			output.value = evt.data.resizedUrl;
		    			
		    		} );
		    	}
		    }); // Bật cửa sổ CKFinder
		}
		function displayThumb(value){
			
			var img = "<img src='"+value+"' width='150' height='150'>";
			$('#thumbnail').html(img);
			
		}