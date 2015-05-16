<div class="container-fluid">
    <div class="navbar-header">
        <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
        </button>
        <a class="navbar-brand" href="<?php echo $baseurl; ?>adminpanel/dashboard.php"></a>
    </div>


    <div id="navbar" class="navbar-collapse collapse">
        <ul class="nav navbar-nav navbar-right">
            <li style="text-align: center; color:#FFF;padding: 10px;">
                <?php
                echo "Welcome:"."<i class='fa fa-user'>&nbsp;</i>".ucfirst($_SESSION['username'])
                    ."<br>";
                echo "Last Logged In at<br>". $_SESSION['logindate'];
                ?>
            </li>
            <li>
                <a href="<?php echo $baseurl; ?>adminpanel/library/controller.php?method='logout'" style="font-size:
                18px;">
                    <i class="fa fa-plane text-danger"><br>Bye</i>
                </a>
            </li>
        </ul>
    </div>
</div>