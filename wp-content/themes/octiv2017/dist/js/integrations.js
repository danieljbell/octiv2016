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




//# sourceMappingURL=data:application/json;charset=utf8;base64,eyJ2ZXJzaW9uIjozLCJuYW1lcyI6W10sIm1hcHBpbmdzIjoiIiwic291cmNlcyI6WyJpbnRlZ3JhdGlvbnMuanMiXSwic291cmNlc0NvbnRlbnQiOlsiJC5hamF4KHtcbiAgICBkYXRhVHlwZTogXCJqc29uXCIsXG4gICAgYXN5bmM6IGZhbHNlLFxuICAgIHVybDogXCIvd3AtanNvbi93cC92Mi9pbnRlZ3JhdGlvbnM/X2VtYmVkJnBlcl9wYWdlPTk5XCIsXG4gICAgc3VjY2VzczogZnVuY3Rpb24oZGF0YSkge1xuICAgICAgdmFyIGFwcCA9IG5ldyBWdWUoe1xuICAgICAgICBlbDogJyNzZWFyY2hhYmxlLXJlc291cmNlcycsXG4gICAgICAgIGRhdGE6IHtcbiAgICAgICAgICBrZXl3b3JkOiAnJyxcbiAgICAgICAgICBwb3N0TGlzdDogZGF0YSxcbiAgICAgICAgICBvZmZzZXQ6IDBcbiAgICAgICAgfSxcbiAgICAgICAgbWV0aG9kczoge1xuICAgICAgICAgIFxuICAgICAgICB9LFxuICAgICAgICBjb21wdXRlZDoge1xuICAgICAgICAgIGZpbHRlcmVkTGlzdCgpIHtcbiAgICAgICAgICAgIHJldHVybiB0aGlzLnBvc3RMaXN0LmZpbHRlcigocG9zdCkgPT4ge1xuICAgICAgICAgICAgICByZXR1cm4gcG9zdC50aXRsZS5yZW5kZXJlZC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHRoaXMua2V5d29yZC50b0xvd2VyQ2FzZSgpKTtcbiAgICAgICAgICAgIH0pO1xuICAgICAgICAgIH1cbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgfVxufSk7XG5cblxuXG4iXSwiZmlsZSI6ImludGVncmF0aW9ucy5qcyJ9
