<div class="container">
        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="<?php echo $baseurl; ?>index.php"></a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <ul class="nav navbar-nav navbar-right">
                <li><a href="<?php echo $baseurl; ?>index.php" class="active">Home</a></li>
                <li><a href="#">About Me</a></li>
                <li><a href="#">Blogs</a></li>
                <li><a href="#">Contact</a></li>
                <li class="text-center" style="line-height: 80px; color: darkgrey">
                    <i class="fa fa-clock-o"></i>
                    <i id="clock"></i>,
                    <?php echo $browser; ?>
                </li>
            </ul>
        </div><!--/.nav-collapse -->
    </div>

<div class="searchbar">
    <div class="input-group">
        <input type="text" class="form-control" placeholder="Search for...">
            <span class="input-group-btn">
                <input type="submit" class="btn btn-success" value="Search..">
            </span>
    </div>
</div>