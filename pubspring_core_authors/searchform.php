<form role="search" method="get" id="searchform" action="<?php echo home_url( '/' ); ?>">
    <div><label class="screen-reader-text hidden" for="s">Search:</label>
        <input class="search-query" type="text" value="Search" onfocus="(value='')" name="s" id="s" placeholder="Enter search term | hit return" /> <input type="hidden" id="searchsubmit" value="Search" class="btn btn-inverse" />
    </div>
</form>