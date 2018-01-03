<div class="navbar navbar-default navbar-fixed-top">
        <div class="container">
          <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
              <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="/index.php">{$_app.title}</a>
          </div>
          <div class="collapse navbar-collapse">
            <ul class="nav navbar-nav">
	    {foreach $_header_nav as $_hn}
	      {if $_hn.active}
		<li class="active"><a href="#">{$_hn.title}</a></li>
	      {else}
		<li><a href="{$_hn.url}">{$_hn.title}</a></li>
	      {/if}
	    {/foreach}
            </ul>
	    {if $user.id neq ''}
	    <ul class="nav navbar-nav navbar-right">
	      <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Track<b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <li><a href="/diet.php">Diet</a></li>
		  <li><a href="/exercise.php">Exercise</a></li>
		  <li><a href="/sleep.php">Sleep</a></li>
		  <li><a href="/weight.php">Weight</a></li>
		</ul>
	      </li>
	      <li class="dropdown">
		<a href="#" class="dropdown-toggle" data-toggle="dropdown">Welcome {$user.name}! <b class="caret"></b></a>
		<ul class="dropdown-menu">
		  <li><a href="account.php">Account</a></li>
		  <li><a href="exercise_types.php">Exercise Types</a></li>
		  <li><a href="signout.php">Sign Out</a></li>
		</ul>
	      </li>
	    </ul>
	    {/if}
          </div><!--/.nav-collapse -->
        </div>
      </div>
