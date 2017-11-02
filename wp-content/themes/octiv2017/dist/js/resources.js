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
        function getMorePosts(postList) {
          var newOffset = this.offset += postsPerPage;
          var postList = this.postList;
          this.$el.querySelector('button').innerText = 'Loading...';
          $.ajax({
            dataType: "json",
            async: false,
            url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&per_page=" + postsPerPage + "&offset=" + newOffset,
          }).done(function(data) {
            var resp = data;
            for (var i = 0; i < resp.length; i++) {
              postList.push(resp[i]);
            }
            $('#load-more-posts').text('Load More Posts');
          });
        }
      },
      computed: {
        function filteredList() {
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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgZGF0YVR5cGU6IFwianNvblwiLFxuICBhc3luYzogZmFsc2UsXG4gIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZvcmRlcj1cIiArIHBvc3RPcmRlciArIFwiJm9yZGVyYnk9XCIgKyBwb3N0T3JkZXJCeSArIFwiJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlLFxuICBlcnJvcjogZnVuY3Rpb24oKSB7XG4gICAgY29uc29sZS5sb2coJ29vcHMhJyk7XG4gIH0sXG4gIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICB2YXIgYXBwID0gbmV3IFZ1ZSh7XG4gICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICBkYXRhOiB7XG4gICAgICAgIGtleXdvcmQ6ICcnLFxuICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgb2Zmc2V0OiAwLFxuICAgICAgICBzZWxlY3RlZENhdHM6IFtdXG4gICAgICB9LFxuICAgICAgbWV0aG9kczoge1xuICAgICAgICBmdW5jdGlvbiBnZXRNb3JlUG9zdHMocG9zdExpc3QpIHtcbiAgICAgICAgICB2YXIgbmV3T2Zmc2V0ID0gdGhpcy5vZmZzZXQgKz0gcG9zdHNQZXJQYWdlO1xuICAgICAgICAgIHZhciBwb3N0TGlzdCA9IHRoaXMucG9zdExpc3Q7XG4gICAgICAgICAgdGhpcy4kZWwucXVlcnlTZWxlY3RvcignYnV0dG9uJykuaW5uZXJUZXh0ID0gJ0xvYWRpbmcuLi4nO1xuICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgICAgICAgICBhc3luYzogZmFsc2UsXG4gICAgICAgICAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvXCIgKyBwYWdlUG9zdFR5cGUgKyBcIj9fZW1iZWQmb3JkZXI9XCIgKyBwb3N0T3JkZXIgKyBcIiZwZXJfcGFnZT1cIiArIHBvc3RzUGVyUGFnZSArIFwiJm9mZnNldD1cIiArIG5ld09mZnNldCxcbiAgICAgICAgICB9KS5kb25lKGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgICAgICAgIHZhciByZXNwID0gZGF0YTtcbiAgICAgICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgcmVzcC5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgICBwb3N0TGlzdC5wdXNoKHJlc3BbaV0pO1xuICAgICAgICAgICAgfVxuICAgICAgICAgICAgJCgnI2xvYWQtbW9yZS1wb3N0cycpLnRleHQoJ0xvYWQgTW9yZSBQb3N0cycpO1xuICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICB9LFxuICAgICAgY29tcHV0ZWQ6IHtcbiAgICAgICAgZnVuY3Rpb24gZmlsdGVyZWRMaXN0KCkge1xuICAgICAgICAgIHJldHVybiB0aGlzLnBvc3RMaXN0LmZpbHRlcigocG9zdCkgPT4ge1xuICAgICAgICAgICAgaWYgKHdpbmRvdy5sb2NhdGlvbi5ocmVmLmluZGV4T2YoXCJjbGllbnQtc3Rvcmllc1wiKSA+IC0xKSB7XG4gICAgICAgICAgICAgIHJldHVybiBwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpO1xuICAgICAgICAgICAgfSBlbHNlIGlmICh3aW5kb3cubG9jYXRpb24uaHJlZi5pbmRleE9mKFwibGlicmFyeVwiKSA+IC0xKSB7XG4gICAgICAgICAgICAgIGlmIChwb3N0LnBhcmVudCA8PSAwKSB7XG4gICAgICAgICAgICAgICAgcmV0dXJuIChwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpKSAmJiAocG9zdC5fZW1iZWRkZWRbJ3dwOnRlcm0nXVswXVswXS5zbHVnLmluY2x1ZGVzKHRoaXMuc2VsZWN0ZWRDYXRzKSk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgIH0gZWxzZSB7XG4gICAgICAgICAgICAgIHJldHVybiAocG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKSkgJiYgKHBvc3QuX2VtYmVkZGVkWyd3cDp0ZXJtJ11bMF1bMF0uc2x1Zy5pbmNsdWRlcyh0aGlzLnNlbGVjdGVkQ2F0cykpO1xuICAgICAgICAgICAgfVxuICAgICAgICAgIH0pO1xuICAgICAgICB9XG4gICAgICB9XG4gICAgfSk7XG4gIH1cbn0pO1xuXG5cblxuIl0sImZpbGUiOiJyZXNvdXJjZXMuanMifQ==
