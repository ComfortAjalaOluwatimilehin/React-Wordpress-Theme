var url = "http://localhost/wordpress";
var def = "https://images.unsplash.com/photo-1454991727061-be514eae86f7?ixlib=rb-0.3.5&q=80&fm=jpg&crop=entropy&cs=tinysrgb&s=72e84205ce9da3b4c9e689289faba164";
var React_Theme_Resource = {
    url:url,
    getPost: url + "/wp-json/wp/v2/posts",
    getMedia: url + "/wp-json/wp/v2/media",
    getMenu: url + "/wp-json/wp-api-menus/v2/menus",
    defaultImage:def

}
