<script type="text/javascript">

	$('#overviewToggle').addClass('tabs__toggle_active');
	let divs = document.getElementsByClassName('custom_tab');
	let divsToggle = document.getElementsByClassName('custom_toggle');

	function toggle(id, toggleId) {

		$('#overviewToggle').removeClass('tabs__toggle_active');
	    for (let i = 0; i < divs.length; i++) {
	      let div = divs[i];
	      if (div.id == id) {
	        div.style.display = 'block';
	       }
	      else
	      {
	        div.style.display = 'none';
	    	}
	    }

	    for (let i = 0; i < divsToggle.length; i++) {
	      let div = divsToggle[i];
	     
	      if (div.id == toggleId) {
	      // 	 console.log(toggleId);
	      // console.log(div.id);
	        $(this).addClass('tabs__toggle_active');
	       }
	      else {
	        $(this).removeClass('tabs__toggle_active');
	       }
	    }
	}

	function showBestStreaming() {
		$('div.cta-buttons-static').addClass('cta-buttons-toggle-container-open');
	}
	function hideBestStreaming() {
		$('div.cta-buttons-static').removeClass('cta-buttons-toggle-container-open');
	}

	function redirectAds(keyword, matchtype, creative, gclid)
	{
		return window.location.replace("http://www.myleadtracks.com/click.php?c=108&key=21hi8p27zvpp48v6hah81679&keyword="+keyword+"&matchtype="+matchtype+"&creative="+creative+"&gclid="+gclid);
	}

</script>