var offset = 0;

$('#load-more-press').on('click', function() {
  offset += 10;
  $.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/press-releases?per_page=10&offset=" + offset,
    success: function(data) {
      var resp = data;
      for (var i = 0; i < resp.length; i++) {
        var postDate = new Date(resp[i].date);
        var postYear = postDate.getUTCFullYear();
        var postMonth = postDate.toLocaleString("en-us", { month: "long" });
        var postDay = postDate.getUTCDate();
        var finalPostDate = postMonth + ' ' + postDay + ', ' + postYear;
        var postTitle = resp[i].title.rendered;
        var postLink = resp[i].link;
        var postExcerpt = resp[i].excerpt.rendered;
        $('.press-release-listing').append('<li class="press-release-item"><time>' + finalPostDate + '</time><h3><a href="' + postLink + '" title="' + postTitle + '">' + postTitle + '</a></h3>' + postExcerpt + '</li>');
      }

      if (resp.length < 10) {
        // console.log('i am spent');
        $('#load-more-press').parent().html('<h2 class="mar-t-more">All Press Releases loaded</h2>');  
      }
    }
  });
});