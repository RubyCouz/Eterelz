<pre>
<?php

//system("cd ~/test/; /usr/local/php7.3/bin/php ~/test/composer.phar install");
system("cd ~/test/; /usr/local/php7.3/bin/php ~/test/composer.phar self-update > ~/test/out.log 2> ~/test/error.log");
system("cd ~/test/; /usr/local/php7.3/bin/php ~/test/composer.phar install --no-dev >> ~/test/out.log 2>> ~/test/error.log");
sleep(5);
?>
</pre>
<hr>
<pre>
<?php
echo file_get_contents("/home/eterelzfbx/test/out.log");
?>
</pre>
<hr>
<pre>
<?php
echo file_get_contents("/home/eterelzfbx/test/error.log");
?>
</pre>