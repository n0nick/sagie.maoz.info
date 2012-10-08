var flickrBackground = new function()
{
  this.flickrApiKey = '35ff6d913485f9f45a4c218683e36bdf';
  this.flickrApiUrl = 'http://api.flickr.com/services/rest/';
  this.flickrTag = 'rocknroll';

  this.ignoredUserids = {
    '56369834@N00' : true
  };

  this.licenses = {
    1 : 'http://creativecommons.org/licenses/by-nc-sa/2.0/',
    2 : 'http://creativecommons.org/licenses/by-nc/2.0/',
    3 : 'http://creativecommons.org/licenses/by-nc-nd/2.0/',
    4 : 'http://creativecommons.org/licenses/by/2.0/',
    5 : 'http://creativecommons.org/licenses/b-sa/2.0/',
    6 : 'http://creativecommons.org/licenses/by-nd/2.0/',
    7 : 'http://flickr.com/commons/usage/'
  };

  this.fetchRandomPicture = function(tag, callback, size, tries)
  {
    size = size || 500;
    tries = tries || 3;
    window.jsonFlickrApi = function(o) { callback.apply(flickrBackground, [o]); };
    $.ajax({
      'url' : this.flickrApiUrl,
      'dataType': 'jsonp',
      'data' : {
        'api_key'   : this.flickrApiKey,
        'method'  : 'flickr.photos.search',
        'tags'      : tag,
        'license'   : '1,2,3,4,5,6,7',
        'sort'      : 'interestingness-desc',
        'safe_search'   : '2',
        'content_type'  : '1',
        'media'     : 'photos',
        'extras'  : 'url_l,owner_name,license',
        'per_page'  : tries,
        'page'      : parseInt(1 + Math.floor(Math.random()*size+1), 10),
        'format'  : 'json'
      }
    });
  };

  this.getPicture = function(callback)
  {
    this.fetchRandomPicture(this.flickrTag, callback);
  };

  this.loadPicture = function()
  {
    this.getPicture(function(o)
    {
      if (o && o.stat == 'ok' && o.photos && o.photos.photo.length)
      {
        var pic;
        var photos = o.photos.photo;
        var i = 0;

        while (i in photos)
        {
          if (photos[i].url_l && !(photos[i].owner in this.ignoredUserids))
          {
            pic = photos[i];
            break;
          }
          i++;
        }

        if (pic)
        {
          $('<img/>').attr('src', pic.url_l)
            .one('load', function()
            {
              var baseURL = 'http://www.flickr.com/photos/' + pic.owner + '/';
              var pictureURL = baseURL + pic.id + '/';
              $('#bg_credit a[rel="about"]')
                .attr('href', pictureURL);
              $('#bg_credit')
                .attr('about', pictureURL);
              $('#bg_credit a[rel="cc:attributionURL"]')
                .attr('href', baseURL)
                .text(pic.ownername);
              $('#bg_credit a[rel="license"]')
                .attr('href', flickrBackground.licenses[pic.license]);
              $.backstretch(pic.url_l, {centeredY: false});
            })
            .each(function() { if (this.complete) $(this).trigger('load'); });
        }
      }
      this.setTimeout();
    });
  };

  this.setTimeout = function()
  {
    window.setTimeout(function() { flickrBackground.loadPicture.apply(flickrBackground); }, 5000);
  };
};

$(document).ready(function()
{
  flickrBackground.setTimeout();
});

$('a:not([href^="http://sagie.maoz.info"]):not([rel=tel])').live('click', function(e)
{
  window.open($(this).attr('href'));
  e.preventDefault();
});
