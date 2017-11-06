$.ajax({
  dataType: "json",
  async: false,
  url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&orderby=" + postOrderBy + "&per_page=" + postsPerPage,
  error: function() {
    console.log('oops!');
  },
  success: function(data) {
    var app = new Vue({
      el: '#searchable-resources',
      data: {
        keyword: '',
        postList: data,
        offset: 0,
        selectedCats: []
      },
      methods: {
        getMorePosts(postList) {
          var newOffset = this.offset += postsPerPage;
          var postList = this.postList;
          $.ajax({
            dataType: "json",
            async: false,
            url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&per_page=" + postsPerPage + "&offset=" + newOffset,
          }).done(function(data) {
            var resp = data;
            for (var i = 0; i < resp.length; i++) {
              postList.push(resp[i]);
            }
            if (resp.length < postsPerPage) {
              $('#load-more-posts').hide();
            }
          });
        }
      },
      computed: {
        filteredList() {
          return this.postList.filter((post) => {
            if (window.location.href.indexOf("client-stories") > -1) {
              return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
            } else if (window.location.href.indexOf("library") > -1) {
              if (post.parent <= 0) {
                return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
              }
            } else {
              return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
            }
          });
        }
      }
    });
  }
});




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgZGF0YVR5cGU6IFwianNvblwiLFxuICBhc3luYzogZmFsc2UsXG4gIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZvcmRlcj1cIiArIHBvc3RPcmRlciArIFwiJm9yZGVyYnk9XCIgKyBwb3N0T3JkZXJCeSArIFwiJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlLFxuICBlcnJvcjogZnVuY3Rpb24oKSB7XG4gICAgY29uc29sZS5sb2coJ29vcHMhJyk7XG4gIH0sXG4gIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICB2YXIgYXBwID0gbmV3IFZ1ZSh7XG4gICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICBkYXRhOiB7XG4gICAgICAgIGtleXdvcmQ6ICcnLFxuICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgb2Zmc2V0OiAwLFxuICAgICAgICBzZWxlY3RlZENhdHM6IFtdXG4gICAgICB9LFxuICAgICAgbWV0aG9kczoge1xuICAgICAgICBnZXRNb3JlUG9zdHMocG9zdExpc3QpIHtcbiAgICAgICAgICB2YXIgbmV3T2Zmc2V0ID0gdGhpcy5vZmZzZXQgKz0gcG9zdHNQZXJQYWdlO1xuICAgICAgICAgIHZhciBwb3N0TGlzdCA9IHRoaXMucG9zdExpc3Q7XG4gICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgIGRhdGFUeXBlOiBcImpzb25cIixcbiAgICAgICAgICAgIGFzeW5jOiBmYWxzZSxcbiAgICAgICAgICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZvcmRlcj1cIiArIHBvc3RPcmRlciArIFwiJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlICsgXCImb2Zmc2V0PVwiICsgbmV3T2Zmc2V0LFxuICAgICAgICAgIH0pLmRvbmUoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgdmFyIHJlc3AgPSBkYXRhO1xuICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCByZXNwLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgIHBvc3RMaXN0LnB1c2gocmVzcFtpXSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICBpZiAocmVzcC5sZW5ndGggPCBwb3N0c1BlclBhZ2UpIHtcbiAgICAgICAgICAgICAgJCgnI2xvYWQtbW9yZS1wb3N0cycpLmhpZGUoKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgICAgfSxcbiAgICAgIGNvbXB1dGVkOiB7XG4gICAgICAgIGZpbHRlcmVkTGlzdCgpIHtcbiAgICAgICAgICByZXR1cm4gdGhpcy5wb3N0TGlzdC5maWx0ZXIoKHBvc3QpID0+IHtcbiAgICAgICAgICAgIGlmICh3aW5kb3cubG9jYXRpb24uaHJlZi5pbmRleE9mKFwiY2xpZW50LXN0b3JpZXNcIikgPiAtMSkge1xuICAgICAgICAgICAgICByZXR1cm4gcG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKTtcbiAgICAgICAgICAgIH0gZWxzZSBpZiAod2luZG93LmxvY2F0aW9uLmhyZWYuaW5kZXhPZihcImxpYnJhcnlcIikgPiAtMSkge1xuICAgICAgICAgICAgICBpZiAocG9zdC5wYXJlbnQgPD0gMCkge1xuICAgICAgICAgICAgICAgIHJldHVybiAocG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKSkgJiYgKHBvc3QuX2VtYmVkZGVkWyd3cDp0ZXJtJ11bMF1bMF0uc2x1Zy5pbmNsdWRlcyh0aGlzLnNlbGVjdGVkQ2F0cykpO1xuICAgICAgICAgICAgICB9XG4gICAgICAgICAgICB9IGVsc2Uge1xuICAgICAgICAgICAgICByZXR1cm4gKHBvc3QudGl0bGUucmVuZGVyZWQudG9Mb3dlckNhc2UoKS5pbmNsdWRlcyh0aGlzLmtleXdvcmQudG9Mb3dlckNhc2UoKSkpICYmIChwb3N0Ll9lbWJlZGRlZFsnd3A6dGVybSddWzBdWzBdLnNsdWcuaW5jbHVkZXModGhpcy5zZWxlY3RlZENhdHMpKTtcbiAgICAgICAgICAgIH1cbiAgICAgICAgICB9KTtcbiAgICAgICAgfVxuICAgICAgfVxuICAgIH0pO1xuICB9XG59KTtcblxuXG5cbiJdLCJmaWxlIjoicmVzb3VyY2VzLmpzIn0=
