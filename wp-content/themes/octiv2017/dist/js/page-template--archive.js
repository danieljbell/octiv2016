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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJwYWdlLXRlbXBsYXRlLS1hcmNoaXZlLmpzIl0sInNvdXJjZXNDb250ZW50IjpbIiQuYWpheCh7XG4gICAgZGF0YVR5cGU6IFwianNvblwiLFxuICAgIGFzeW5jOiBmYWxzZSxcbiAgICB1cmw6IFwiL3dwLWpzb24vd3AvdjIvXCIgKyBwYWdlUG9zdFR5cGUgKyBcIj9fZW1iZWQmcGVyX3BhZ2U9XCIgKyBwb3N0c1BlclBhZ2UsXG4gICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgdmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICAgIGRhdGE6IHtcbiAgICAgICAgICBrZXl3b3JkOiAnJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDAsXG4gICAgICAgICAgc2VsZWN0ZWRDYXRzOiBbXVxuICAgICAgICB9LFxuICAgICAgICBtZXRob2RzOiB7XG4gICAgICAgICAgXG4gICAgICAgIH0sXG4gICAgICAgIG1vdW50ZWQ6IGZ1bmN0aW9uKCkge1xuICAgICAgICAgIGlmIChnZXRQYXJhbWV0ZXJCeU5hbWUoJ2NhdCcpKSB7XG4gICAgICAgICAgICB2YXIgaW5pdGlhbENhdCA9IGdldFBhcmFtZXRlckJ5TmFtZSgnY2F0Jyk7XG4gICAgICAgICAgICB2YXIgaW5pdGlhbFZhbHVlID0gJ29wdGlvblt2YWx1ZT1cIicgKyBpbml0aWFsQ2F0ICsgJ1wiXSc7XG4gICAgICAgICAgICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKGluaXRpYWxWYWx1ZSkuc2VsZWN0ZWQgPSB0cnVlO1xuICAgICAgICAgICAgY29uc29sZS5kaXIoZG9jdW1lbnQucXVlcnlTZWxlY3RvcignI2tleXdvcmQtZmlsdGVyJykpO1xuICAgICAgICAgIH1cbiAgICAgICAgfSxcbiAgICAgICAgY29tcHV0ZWQ6IHtcbiAgICAgICAgICBmaWx0ZXJlZExpc3QoKSB7XG4gICAgICAgICAgICByZXR1cm4gdGhpcy5wb3N0TGlzdC5maWx0ZXIoKHBvc3QpID0+IHtcbiAgICAgICAgICAgICAgcmV0dXJuIChwb3N0LnRpdGxlLnJlbmRlcmVkLnRvTG93ZXJDYXNlKCkuaW5jbHVkZXModGhpcy5rZXl3b3JkLnRvTG93ZXJDYXNlKCkpKSAmJiAocG9zdC5fZW1iZWRkZWRbJ3dwOnRlcm0nXVswXVswXS5zbHVnLmluY2x1ZGVzKHRoaXMuc2VsZWN0ZWRDYXRzKSk7XG4gICAgICAgICAgICB9KTtcbiAgICAgICAgICB9XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH1cbn0pO1xuXG5cblxuIl0sImZpbGUiOiJwYWdlLXRlbXBsYXRlLS1hcmNoaXZlLmpzIn0=
