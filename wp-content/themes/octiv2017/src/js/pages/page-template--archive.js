$.ajax({
    dataType: "json",
    async: false,
    url: "/wp-json/wp/v2/" + pagePostType + "?_embed&per_page=" + postsPerPage,
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
          
        },
        mounted: function() {
          if (getParameterByName('cat')) {
            var initialCat = getParameterByName('cat');
            var initialValue = 'option[value="' + initialCat + '"]';
            document.querySelector(initialValue).selected = true;
            console.dir(document.querySelector('#keyword-filter'));
          }
        },
        computed: {
          filteredList() {
            return this.postList.filter((post) => {
              return (post.title.rendered.toLowerCase().includes(this.keyword.toLowerCase())) && (post._embedded['wp:term'][0][0].slug.includes(this.selectedCats));
            });
          }
        }
      });
    }
});



