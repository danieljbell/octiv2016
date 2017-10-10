$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/" + pagePostType + "?_embed&order=" + postOrder + "&per_page=" + postsPerPage,
    success: function(data) {
      var app = new Vue({
        el: '#searchable-resources',
        data: {
          keyword: '',
          postList: data,
          offset: 0
        },
        methods: {
          getMorePosts(postList) {
            var newOffset = this.offset += postsPerPage;
            var postList = this.postList;
            this.$el.querySelector('button').innerText = 'Loading...';
            $.ajax({
              dataType: "json",
              async: false,
              url: "/wp-json/wp/v2/" + pagePostType + "?_embed&per_page=" + postsPerPage + "&offset=" + newOffset,
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
          filteredList() {
            return this.postList.filter((post) => {
              return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
            });
          }
        }
      });
    }
});




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgYXN5bmM6IGZhbHNlLFxuICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZvcmRlcj1cIiArIHBvc3RPcmRlciArIFwiJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlLFxuICAgIHN1Y2Nlc3M6IGZ1bmN0aW9uKGRhdGEpIHtcbiAgICAgIHZhciBhcHAgPSBuZXcgVnVlKHtcbiAgICAgICAgZWw6ICcjc2VhcmNoYWJsZS1yZXNvdXJjZXMnLFxuICAgICAgICBkYXRhOiB7XG4gICAgICAgICAga2V5d29yZDogJycsXG4gICAgICAgICAgcG9zdExpc3Q6IGRhdGEsXG4gICAgICAgICAgb2Zmc2V0OiAwXG4gICAgICAgIH0sXG4gICAgICAgIG1ldGhvZHM6IHtcbiAgICAgICAgICBnZXRNb3JlUG9zdHMocG9zdExpc3QpIHtcbiAgICAgICAgICAgIHZhciBuZXdPZmZzZXQgPSB0aGlzLm9mZnNldCArPSBwb3N0c1BlclBhZ2U7XG4gICAgICAgICAgICB2YXIgcG9zdExpc3QgPSB0aGlzLnBvc3RMaXN0O1xuICAgICAgICAgICAgdGhpcy4kZWwucXVlcnlTZWxlY3RvcignYnV0dG9uJykuaW5uZXJUZXh0ID0gJ0xvYWRpbmcuLi4nO1xuICAgICAgICAgICAgJC5hamF4KHtcbiAgICAgICAgICAgICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgICAgICAgICAgICBhc3luYzogZmFsc2UsXG4gICAgICAgICAgICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZwZXJfcGFnZT1cIiArIHBvc3RzUGVyUGFnZSArIFwiJm9mZnNldD1cIiArIG5ld09mZnNldCxcbiAgICAgICAgICAgIH0pLmRvbmUoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgICB2YXIgcmVzcCA9IGRhdGE7XG4gICAgICAgICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgcmVzcC5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgICAgIHBvc3RMaXN0LnB1c2gocmVzcFtpXSk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgJCgnI2xvYWQtbW9yZS1wb3N0cycpLnRleHQoJ0xvYWQgTW9yZSBQb3N0cycpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBjb21wdXRlZDoge1xuICAgICAgICAgIGZpbHRlcmVkTGlzdCgpIHtcbiAgICAgICAgICAgIHJldHVybiB0aGlzLnBvc3RMaXN0LmZpbHRlcigocG9zdCkgPT4ge1xuICAgICAgICAgICAgICByZXR1cm4gcG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxufSk7XG5cblxuXG4iXSwiZmlsZSI6InJlc291cmNlcy5qcyJ9
