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
    }
  });
});
//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwcmVzcy1yZWxlYXNlcy5qcyJdLCJzb3VyY2VzQ29udGVudCI6WyJ2YXIgb2Zmc2V0ID0gMDtcblxuJCgnI2xvYWQtbW9yZS1wcmVzcycpLm9uKCdjbGljaycsIGZ1bmN0aW9uKCkge1xuICBvZmZzZXQgKz0gMTA7XG4gICQuYWpheCh7XG4gICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgIGFzeW5jOiBmYWxzZSxcbiAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvcHJlc3MtcmVsZWFzZXM/cGVyX3BhZ2U9MTAmb2Zmc2V0PVwiICsgb2Zmc2V0LFxuICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgIHZhciByZXNwID0gZGF0YTtcbiAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgcmVzcC5sZW5ndGg7IGkrKykge1xuICAgICAgICB2YXIgcG9zdERhdGUgPSBuZXcgRGF0ZShyZXNwW2ldLmRhdGUpO1xuICAgICAgICB2YXIgcG9zdFllYXIgPSBwb3N0RGF0ZS5nZXRVVENGdWxsWWVhcigpO1xuICAgICAgICB2YXIgcG9zdE1vbnRoID0gcG9zdERhdGUudG9Mb2NhbGVTdHJpbmcoXCJlbi11c1wiLCB7IG1vbnRoOiBcImxvbmdcIiB9KTtcbiAgICAgICAgdmFyIHBvc3REYXkgPSBwb3N0RGF0ZS5nZXRVVENEYXRlKCk7XG4gICAgICAgIHZhciBmaW5hbFBvc3REYXRlID0gcG9zdE1vbnRoICsgJyAnICsgcG9zdERheSArICcsICcgKyBwb3N0WWVhcjtcbiAgICAgICAgdmFyIHBvc3RUaXRsZSA9IHJlc3BbaV0udGl0bGUucmVuZGVyZWQ7XG4gICAgICAgIHZhciBwb3N0TGluayA9IHJlc3BbaV0ubGluaztcbiAgICAgICAgdmFyIHBvc3RFeGNlcnB0ID0gcmVzcFtpXS5leGNlcnB0LnJlbmRlcmVkO1xuICAgICAgICAkKCcucHJlc3MtcmVsZWFzZS1saXN0aW5nJykuYXBwZW5kKCc8bGkgY2xhc3M9XCJwcmVzcy1yZWxlYXNlLWl0ZW1cIj48dGltZT4nICsgZmluYWxQb3N0RGF0ZSArICc8L3RpbWU+PGgzPjxhIGhyZWY9XCInICsgcG9zdExpbmsgKyAnXCIgdGl0bGU9XCInICsgcG9zdFRpdGxlICsgJ1wiPicgKyBwb3N0VGl0bGUgKyAnPC9hPjwvaDM+JyArIHBvc3RFeGNlcnB0ICsgJzwvbGk+Jyk7XG4gICAgICB9XG4gICAgfVxuICB9KTtcbn0pOyJdLCJmaWxlIjoicHJlc3MtcmVsZWFzZXMuanMifQ==
