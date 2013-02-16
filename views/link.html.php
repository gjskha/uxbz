<?php if ($this->get('error')) { 
    echo '<h2>Error</h2>';
    echo '<div class="error">';
    echo $this->get('error');
    echo '</div>';
} else {
    echo '<h2>';
    echo  $this->get('pageTitle');
    echo '</h2>';
    echo '<p>Your long URL <a href="'; 
    echo $this->get('longUrl');
    echo '">';
    echo $this->get('longUrl'); 
    echo '</a> is now reachable via <a href="http://'; 
    echo $this->get('shortUrl') . '">http://' . $this->app->getRootPath() . $this->get('shortUrl') . '</a>';
} ?>
</p>
<!-- AddThis Button BEGIN -->
<div class="addthis_toolbox addthis_default_style addthis_32x32_style">
<a class="addthis_button_preferred_1"></a>
<a class="addthis_button_preferred_2"></a>
<a class="addthis_button_preferred_3"></a>
<a class="addthis_button_preferred_4"></a>
<a class="addthis_button_digg"></a>
<a class="addthis_button_reddit"></a>
<a class="addthis_button_compact"></a>
<a class="addthis_counter addthis_bubble_style"></a>
</div>
<script type="text/javascript" src="//s7.addthis.com/js/300/addthis_widget.js#pubid=ra-511c3c443d0d7fdd"></script>
<!-- AddThis Button END -->
