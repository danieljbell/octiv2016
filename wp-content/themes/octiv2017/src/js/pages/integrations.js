$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/integrations?_embed&per_page=99",
    success: function(data) {
      var app = new Vue({
        el: '#searchable-resources',
        data: {
          keyword: '',
          postList: data,
          offset: 0
        },
        methods: {
          
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



