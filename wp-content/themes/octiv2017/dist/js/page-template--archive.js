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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1hcmNoaXZlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIiQuYWpheCh7XG4gICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgIGFzeW5jOiBmYWxzZSxcbiAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvXCIgKyBwYWdlUG9zdFR5cGUgKyBcIj9fZW1iZWQmcGVyX3BhZ2U9XCIgKyBwb3N0c1BlclBhZ2UsXG4gICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgdmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICAgIGRhdGE6IHtcbiAgICAgICAgICBrZXl3b3JkOiAnJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDAsXG4gICAgICAgICAgc2VsZWN0ZWRDYXRzOiBbXVxuICAgICAgICB9LFxuICAgICAgICBtZXRob2RzOiB7XG4gICAgICAgICAgXG4gICAgICAgIH0sXG4gICAgICAgIGNvbXB1dGVkOiB7XG4gICAgICAgICAgZmlsdGVyZWRMaXN0KCkge1xuICAgICAgICAgICAgcmV0dXJuIHRoaXMucG9zdExpc3QuZmlsdGVyKChwb3N0KSA9PiB7XG4gICAgICAgICAgICAgIHJldHVybiAocG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKSkgJiYgKHBvc3QuX2VtYmVkZGVkWyd3cDp0ZXJtJ11bMF1bMF0uc2x1Zy5pbmNsdWRlcyh0aGlzLnNlbGVjdGVkQ2F0cykpO1xuICAgICAgICAgICAgfSk7XG4gICAgICAgICAgfVxuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9XG59KTtcblxuXG5cbiJdLCJmaWxlIjoicGFnZS10ZW1wbGF0ZS0tYXJjaGl2ZS5qcyJ9
