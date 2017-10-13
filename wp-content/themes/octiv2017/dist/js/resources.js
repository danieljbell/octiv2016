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
        offset: 0,
        selectedCats: []
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
            if (document.body.classList.contains('page-id-3622')) {
              return post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase());
            } else {
              return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
            }
          });
        }
      }
    });
  }
});




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJyZXNvdXJjZXMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgZGF0YVR5cGU6IFwianNvblwiLFxuICBhc3luYzogZmFsc2UsXG4gIHVybDogXCIvd3AtanNvbi93cC92Mi9cIiArIHBhZ2VQb3N0VHlwZSArIFwiP19lbWJlZCZvcmRlcj1cIiArIHBvc3RPcmRlciArIFwiJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlLFxuICBzdWNjZXNzOiBmdW5jdGlvbihkYXRhKSB7XG4gICAgdmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgICAgZWw6ICcjc2VhcmNoYWJsZS1yZXNvdXJjZXMnLFxuICAgICAgZGF0YToge1xuICAgICAgICBrZXl3b3JkOiAnJyxcbiAgICAgICAgcG9zdExpc3Q6IGRhdGEsXG4gICAgICAgIG9mZnNldDogMCxcbiAgICAgICAgc2VsZWN0ZWRDYXRzOiBbXVxuICAgICAgfSxcbiAgICAgIG1ldGhvZHM6IHtcbiAgICAgICAgZ2V0TW9yZVBvc3RzKHBvc3RMaXN0KSB7XG4gICAgICAgICAgdmFyIG5ld09mZnNldCA9IHRoaXMub2Zmc2V0ICs9IHBvc3RzUGVyUGFnZTtcbiAgICAgICAgICB2YXIgcG9zdExpc3QgPSB0aGlzLnBvc3RMaXN0O1xuICAgICAgICAgIHRoaXMuJGVsLnF1ZXJ5U2VsZWN0b3IoJ2J1dHRvbicpLmlubmVyVGV4dCA9ICdMb2FkaW5nLi4uJztcbiAgICAgICAgICAkLmFqYXgoe1xuICAgICAgICAgICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgICAgICAgICAgYXN5bmM6IGZhbHNlLFxuICAgICAgICAgICAgdXJsOiBcIi93cC1qc29uL3dwL3YyL1wiICsgcGFnZVBvc3RUeXBlICsgXCI/X2VtYmVkJnBlcl9wYWdlPVwiICsgcG9zdHNQZXJQYWdlICsgXCImb2Zmc2V0PVwiICsgbmV3T2Zmc2V0LFxuICAgICAgICAgIH0pLmRvbmUoZnVuY3Rpb24oZGF0YSkge1xuICAgICAgICAgICAgdmFyIHJlc3AgPSBkYXRhO1xuICAgICAgICAgICAgZm9yICh2YXIgaSA9IDA7IGkgPCByZXNwLmxlbmd0aDsgaSsrKSB7XG4gICAgICAgICAgICAgIHBvc3RMaXN0LnB1c2gocmVzcFtpXSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgICAkKCcjbG9hZC1tb3JlLXBvc3RzJykudGV4dCgnTG9hZCBNb3JlIFBvc3RzJyk7XG4gICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgIH0sXG4gICAgICBjb21wdXRlZDoge1xuICAgICAgICBmaWx0ZXJlZExpc3QoKSB7XG4gICAgICAgICAgcmV0dXJuIHRoaXMucG9zdExpc3QuZmlsdGVyKChwb3N0KSA9PiB7XG4gICAgICAgICAgICBpZiAoZG9jdW1lbnQuYm9keS5jbGFzc0xpc3QuY29udGFpbnMoJ3BhZ2UtaWQtMzYyMicpKSB7XG4gICAgICAgICAgICAgIHJldHVybiBwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpO1xuICAgICAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICAgICAgcmV0dXJuIChwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpKSAmJiAocG9zdC5fZW1iZWRkZWRbJ3dwOnRlcm0nXVswXVswXS5zbHVnLmluY2x1ZGVzKHRoaXMuc2VsZWN0ZWRDYXRzKSk7XG4gICAgICAgICAgICB9XG4gICAgICAgICAgfSk7XG4gICAgICAgIH1cbiAgICAgIH1cbiAgICB9KTtcbiAgfVxufSk7XG5cblxuXG4iXSwiZmlsZSI6InJlc291cmNlcy5qcyJ9
