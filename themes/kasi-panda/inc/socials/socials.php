<?php

?>


<a href="https://www.facebook.com/sharer/sharer.php?u=<?php the_permalink(); ?>" onclick="window.open(this.href, 'facebook-share','width=580,height=296');return false;" class="uk-icon-button facebook uk-icon uk-icon-facebook"></a>

<a href="https://twitter.com/share?text=<?php echo urlencode(get_the_title()); ?>&amp;url=<?php the_permalink(); ?>" onclick="window.open(this.href, 'twitter-share', 'width=550,height=235');return false;" class="uk-icon-button twitter uk-icon uk-icon-twitter uk-margin-left"></a>
<a href="mailto:?subject=View article on Kasi Panda &body=<?php the_permalink(); ?>." class="uk-icon-button mail uk-icon uk-icon-envelope uk-margin-left"></a>
<a href="#" class="uk-icon-button printer uk-icon uk-icon-print uk-margin-left" onclick='window.print()'></a>
