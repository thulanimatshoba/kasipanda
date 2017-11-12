<?php

?>


<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" class="uk-icon-button facebook"><i class="fa fa-facebook" aria-hidden="true"></i></a>

<a href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" class="uk-icon-button twitter uk-margin-left"><i class="fa fa-twitter" aria-hidden="true"></i></a>
<!-- <a href="https://instagram.com/share?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'instagram-share', 'width=550,height=235');return false;" class="uk-icon-button twitter uk-margin-left"><i class="fa fa-instagram" aria-hidden="true"></i></a> -->
<a href="#" class="uk-icon-button fa fa-print printer uk-icon uk-icon-print uk-margin-left" onclick='window.print()'></a>
