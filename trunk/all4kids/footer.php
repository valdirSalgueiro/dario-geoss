			</div>
		</div>
	</div>
	<div class="footer ng-scope">	
		<div class="company-info">
			<div class="content">
				<p class="copyright">© 2014 - Todos direitos reservados.</p>
			</div>
		</div>	
	</div>    
	<script src="croppic.min.js"></script>
	<script>
		var croppicHeaderOptions = {
				uploadUrl:'img_save_to_file.php?id=<?php echo $id?>',
				//cropData:{
				//	"id":<?php echo $id?>
				//},
				cropUrl:'img_crop_to_file.php?id=<?php echo $id?>',
				customUploadButtonId:'cropContainerHeaderButton',
				modal:false,
				loaderHtml:'<div class="loader bubblingG"><span id="bubblingG_1"></span><span id="bubblingG_2"></span><span id="bubblingG_3"></span></div> ',
				onBeforeImgUpload: function(){ $('#croppic').css("background-image", ""); },
				onAfterImgUpload: function(){ console.log('onAfterImgUpload') },
				onImgDrag: function(){ console.log('onImgDrag') },
				onImgZoom: function(){ console.log('onImgZoom') },
				onBeforeImgCrop: function(){ console.log('onBeforeImgCrop') },
				onAfterImgCrop:function(){ console.log('onAfterImgCrop') }
		}	
		var croppic = new Croppic('croppic', croppicHeaderOptions);

		
	</script>
</body>
</html>