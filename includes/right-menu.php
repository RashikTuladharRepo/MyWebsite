<div class="side-menu">
    <div class="popular-post">
        <h2 class="text-center">Popular Posts</h2>
        <ul id="ticker_02" class="ticker">
            <?php foreach($blogsarray as $row) {?>
            <li>
                <p><?php echo $row['title']; ?></p>
                <a href="<?php echo $baseurl; ?>fullblog/<?php echo $row['sn']; ?>/<?php echo
                $row['title']; ?>">
<!--                    <img src="--><?php //echo $baseurl; ?><!--images/banner.jpg"-->
<!--                                 style="margin-right: 10px;"-->
<!--                                 height="80"-->
<!--                                 width="80"-->
<!--                                 class="pull-left img-responsive">-->
                    <img src="<?php echo $row ['coverimageurl'];?>"
                         style="margin-right: 10px;"
                         height="80"
                         width="80"
                         class="pull-left img-responsive">
                    <p class="text-justify">
                        <span class="author">
                            Created By: <?php echo ucfirst($row['createdby']); ?><br>
                            Dated On: <?php echo date('Y/m/d',strtotime($row['createddate'])); ?><br>
                        </span>
                        <?php echo substr($row['description'],0,55)."......"; ?>
                    </p>
                </a>
            </li>
            <?php }?>
        </ul>
    </div>


    <div class="popular-keyword">
        <h2 class="text-center">Popular Keywords</h2>
        <a href="<?php echo $baseurl; ?>blogs/PHP"><i class="icon rashik-prog-phplight"></i> (<?php echo $phpcount; ?>)</a>
        <a href="<?php echo $baseurl; ?>blogs/ASP"><i class="icon rashik-prog-aspnet"></i> (<?php echo $aspcount; ?>)
        </a>
        <a href="<?php echo $baseurl; ?>blogs/MYSQL"><i class="icon rashik-dbs-mysql"></i> (<?php echo $mysqlcount; ?>)
        </a>
        <a href="<?php echo $baseurl; ?>blogs/MSSQL"><i class="icon rashik-dbs-sqlserver"></i> (<?php echo $mssqlcount; ?>)</a>
        <a href="<?php echo $baseurl; ?>blogs/BOOTSTRAP"><i class="icon rashik-bootstrap"></i> (<?php echo $bootstrapcount;
            ?>)</a>
        <a href="<?php echo $baseurl; ?>blogs/NEWS"><i class="fa fa-newspaper-o" style="font-size: 150%;"></i> (<?php
            echo
            $newscount; ?>)
        </a>
    </div>
    <div class="clearfix"></div>

    <div class="facebook-likebox">
        <h2 class="text-center">Follow Me @</h2>
        <div class="page">
            <div class="fb-page" data-href="https://www.facebook.com/rashiktechblogs" data-width="350" data-height="250" data-hide-cover="false" data-show-facepile="true" data-show-posts="false">
                <div class="fb-xfbml-parse-ignore">
                    <blockquote cite="https://www.facebook.com/rashiktechblogs">
                        <a href="https://www.facebook.com/rashiktechblogs">Tech Blogs</a>
                    </blockquote>
                </div>
            </div>
        </div>
        <div class="twitter-feed">
        <a class="twitter-timeline"  href="https://twitter.com/RashikTuladhar" data-widget-id="602419056361144322">Tweets by @RashikTuladhar</a>
        <script>!function(d,s,id){var js,fjs=d.getElementsByTagName(s)[0],p=/^http:/.test(d.location)?'http':'https';if(!d.getElementById(id)){js=d.createElement(s);js.id=id;js.src=p+"://platform.twitter.com/widgets.js";fjs.parentNode.insertBefore(js,fjs);}}(document,"script","twitter-wjs");</script>
        </div>
    </div>
    <div class="clearfix"></div>

</div>