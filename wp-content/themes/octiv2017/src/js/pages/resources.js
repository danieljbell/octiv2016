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
            if (document.location.pathname.contains('client-stories')) {
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



