$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/posts?_embed",
    success: function(data) {
      var app = new Vue({
        el: '#searchable-resources',
        data: {
          keyword: ' ',
          postList: data,
          offset: 0
        },
        methods: {
          getMorePosts(postList) {
            var newOffset = this.offset += 10;
            var postList = this.postList;
            this.$el.querySelector('button').innerText = 'Loading...';
            $.ajax({
              dataType: "json",
              async: false,
              url: "/wp-json/wp/v2/posts?_embed&offset=" + newOffset,
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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgYXN5bmM6IGZhbHNlLFxuICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9wb3N0cz9fZW1iZWRcIixcbiAgICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKSB7XG4gICAgICB2YXIgYXBwID0gbmV3IFZ1ZSh7XG4gICAgICAgIGVsOiAnI3NlYXJjaGFibGUtcmVzb3VyY2VzJyxcbiAgICAgICAgZGF0YToge1xuICAgICAgICAgIGtleXdvcmQ6ICcgJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDBcbiAgICAgICAgfSxcbiAgICAgICAgbWV0aG9kczoge1xuICAgICAgICAgIGdldE1vcmVQb3N0cyhwb3N0TGlzdCkge1xuICAgICAgICAgICAgdmFyIG5ld09mZnNldCA9IHRoaXMub2Zmc2V0ICs9IDEwO1xuICAgICAgICAgICAgdmFyIHBvc3RMaXN0ID0gdGhpcy5wb3N0TGlzdDtcbiAgICAgICAgICAgIHRoaXMuJGVsLnF1ZXJ5U2VsZWN0b3IoJ2J1dHRvbicpLmlubmVyVGV4dCA9ICdMb2FkaW5nLi4uJztcbiAgICAgICAgICAgICQuYWpheCh7XG4gICAgICAgICAgICAgIGRhdGFUeXBlOiBcImpzb25cIixcbiAgICAgICAgICAgICAgYXN5bmM6IGZhbHNlLFxuICAgICAgICAgICAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvcG9zdHM/X2VtYmVkJm9mZnNldD1cIiArIG5ld09mZnNldCxcbiAgICAgICAgICAgIH0pLmRvbmUoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgICB2YXIgcmVzcCA9IGRhdGE7XG4gICAgICAgICAgICAgIGZvciAodmFyIGkgPSAwOyBpIDwgcmVzcC5sZW5ndGg7IGkrKykge1xuICAgICAgICAgICAgICAgIHBvc3RMaXN0LnB1c2gocmVzcFtpXSk7XG4gICAgICAgICAgICAgIH1cbiAgICAgICAgICAgICAgJCgnI2xvYWQtbW9yZS1wb3N0cycpLnRleHQoJ0xvYWQgTW9yZSBQb3N0cycpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuICAgICAgICB9LFxuICAgICAgICBjb21wdXRlZDoge1xuICAgICAgICAgIGZpbHRlcmVkTGlzdCgpIHtcbiAgICAgICAgICAgIHJldHVybiB0aGlzLnBvc3RMaXN0LmZpbHRlcigocG9zdCkgPT4ge1xuICAgICAgICAgICAgICByZXR1cm4gcG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxufSk7XG5cblxuXG4iXSwiZmlsZSI6InJlc291cmNlcy5qcyJ9
