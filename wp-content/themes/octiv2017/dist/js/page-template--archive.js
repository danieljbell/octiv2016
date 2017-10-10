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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1hcmNoaXZlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIiQuYWpheCh7XG4gICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgIGFzeW5jOiBmYWxzZSxcbiAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvXCIgKyBwYWdlUG9zdFR5cGUgKyBcIj9fZW1iZWQmcGVyX3BhZ2U9XCIgKyBwb3N0c1BlclBhZ2UsXG4gICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgdmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICAgIGRhdGE6IHtcbiAgICAgICAgICBrZXl3b3JkOiAnJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDAsXG4gICAgICAgIH0sXG4gICAgICAgIG1ldGhvZHM6IHtcbiAgICAgICAgICBcbiAgICAgICAgfSxcbiAgICAgICAgY29tcHV0ZWQ6IHtcbiAgICAgICAgICBmaWx0ZXJlZExpc3QoKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5wb3N0TGlzdC5maWx0ZXIoKHBvc3QpID0+IHtcbiAgICAgICAgICAgICAgcmV0dXJuIHBvc3QudGl0bGUucmVuZGVyZWQudG9Mb3dlckNhc2UoKS5pbmNsdWRlcyh0aGlzLmtleXdvcmQudG9Mb3dlckNhc2UoKSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH1cbn0pO1xuXG5cblxuIl0sImZpbGUiOiJwYWdlLXRlbXBsYXRlLS1hcmNoaXZlLmpzIn0=
