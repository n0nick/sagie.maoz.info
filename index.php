<?php
require_once ('flickr.inc.php');
$photo = getPhoto();
?>
<!DOCTYPE html>

<html lang="en">

<head>
  <title>Sagie Maoz</title>

  <meta charset="utf-8" />

  <link rel="openid.server" href="http://maoz.info/openid/openid/provider" />
  <link rel="openid.delegate" href="http://maoz.info/openid/identity/sagie" />

  <link rel="profile" href="http://microformats.org/profile/hcard" />
  <link rel="stylesheet" type="text/css" href="styles/reset.css" media="screen" />
  <link rel="stylesheet" type="text/css" href="styles/rockstar.css" media="screen" />

  <script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.6.0/jquery.min.js"></script>
  <script type="text/javascript" src="scripts/rocknroll.js"></script>

  <style type="text/css">
    /*<![CDATA[*/
    body { background-image: url('<?= $photo['url_l'] ?>'); }
    /*]]>*/
  </style>
</head>

<body>

  <section id="card" class="box vcard">

    <article id="me">
      <header id="hello">
        <h1><a class="url fn" href="http://sagie.maoz.info/">Sagie Maoz</a></h1>
        <h2 class="role">Internet Rockstar</h2>
      </header>
      <img src="http://sagie.maoz.info/images/me.png" class="photo" alt="Sagie Maoz" />
    </article>

    <aside>
      <ul id="resume" class="foot">
        <li><a href="http://www.linkedin.com/in/sagiemaoz">My Resume at LinkedIn</a></li>
      </ul>

      <ul id="links" class="foot">
        <li><a href="http://n0nick.net/lessthan3" title="lessthan3 (My personal Hebrew blog)">lessthan3</a></li>
        <li><a href="http://the.n0nick.net/" title="breadcrumbs:// (My crazy tumblelog)">breadcrumbs://</a></li>
        <li><a href="http://twitter.com/n0nick" title="I'm @n0nick on Twitter">twitter</a></li>
        <li><a href="http://facebook.com/sagiem" title="My Facebook profile">facebook</a></li>
      </ul>

      <ul id="contact" class="foot">
        <li><a class="email" href="&#109;&#x61;&#x69;&#x6c;&#x74;&#111;&#58;&#115;&#x61;&#x67;&#105;&#x65;&#x40;&#109;&#97;&#111;&#x7a;&#46;&#105;&#x6e;&#102;&#111;">&#115;&#x61;&#x67;&#105;&#x65;&#x40;&#109;&#97;&#111;&#x7a;&#46;&#105;&#x6e;&#102;&#111;</a></li>
        <li class="tel"><a href="tel:+972-52-834-3339" rel="tel">+972.52.834.3339</a></li>
      </ul>
    </aside>

  </section>

  <footer id="bg_credit" class="box">
    <!-- xmlns:cc="http://creativecommons.org/ns#" about="http://www.flickr.com/photos/<?= $photo['owner'] ?>/<?= $photo['id'] ?>/" -->
      Random <var><?= FLICKR_TAG ?></var>-tagged background pictures
      from <a href="http://flickr.com/">Flickr</a>.<br/>
      <a href="http://www.flickr.com/photos/<?= $photo['owner'] ?>/<?= $photo['id'] ?>/" rel="about">This one</a> is by <a rel="cc:attributionURL" href="http://www.flickr.com/photos/<?= $photo['owner'] ?>/"><?= $photo['ownername'] ?></a>
      with <a rel="license" href="<?= licenseUrl($photo['license']) ?>">license</a>.<br/>
      Feel free to play with the <a href="https://github.com/n0nick/sagie.maoz.info">source code for this site</a>.
  </footer>

  <script type="text/javascript">
    //<![CDATA[
    var gaJsHost = (("https:" == document.location.protocol) ? "https://ssl." : "http://www.");
    document.write(unescape("%3Cscript src='" + gaJsHost + "google-analytics.com/ga.js' type='text/javascript'%3E%3C/script%3E"));
    //]]>
  </script>
  <script type="text/javascript">
    //<![CDATA[
    try {
      var pageTracker = _gat._getTracker("UA-10970756-1");
      pageTracker._trackPageview();
    } catch(err) {}
    //]]>
  </script>

</body>

</html>
