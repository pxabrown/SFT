<form method="get" id="searchform" action="<?php bloginfo('home'); ?>/">
<div><input type="text" size="put_a_size_here" name="s" id="s" value="Write your search and hit Enter" onfocus="if(this.value==this.defaultValue)this.value='';" onblur="if(this.value=='')this.value=this.defaultValue;"/>
<input type="submit" id="searchsubmit" value="Search" class="btn" />
</div>
</form>
<!--
<form action="http://alessandro.host/" id="searchform" method="get" role="search">
    <label for="s" class="screen-reader-text">Search for:</label>
    <div class="input-group">
      <span class="input-group-addon"><span class="glyphicon glyphicon-search"></span></span>
      <input type="text" class="form-control" id="s" name="s" value="">
      <span class="input-group-btn">
        <input class="btn btn-primary" type="submit" value="Search" id="searchsubmit">
      </span>
    </div>
</form>
-->
