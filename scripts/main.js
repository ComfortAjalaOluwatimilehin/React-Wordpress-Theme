
var j =jQuery;

var  Posts = React.createClass({
  getInitialState(){return {posts:[],selected_post_id:""}},
  getRawMarkup(target) {
  var rawMarked = marked(target, {sanitize:false})
  return { __html:rawMarked};
  },
  componentWillMount(){
        var s = this;
      j.ajax(React_Theme_Resource.getPost)
      .done(function(data){
            s.setState({posts:data,selected_post_id:data[0]["id"]}); //set posts
            var promises = [];
          console.log(data)
        data.forEach(function(post){
              var promise = j.ajax(React_Theme_Resource.getMedia + "/" + post["featured_media"]);
              promises.push(promise);
        })
         promises.forEach(function(promise,i){
              promise.then(function(values){
                s.state.posts[i]["featured_media"] = values; s.setState({posts:s.state.posts});
              })
        })

      })
      .fail(function(){ console.log("FAIL")})
  },
  componentDidMount(){},
  selected_post_content(){
    var selection = this.state.posts.filter(function(post){return post["id"] == this.state.selected_post_id}.bind(this))
    return selection[0];
  },
  contentSlider(obj){
  //  console.log(obj)
        if(obj.status == false){return j("#displayapost").fadeOut("slow")}
        j("#displayapost").fadeIn("slow")
        return this.setState({selected_post_id:obj.id});

},
      render(){

            var posts = (this.state.posts);
            var display_props = {slide:this.contentSlider,selection:this.selected_post_content(),getRawMarkup:this.getRawMarkup}
            var post_props = {slide:this.contentSlider,getRawMarkup:this.getRawMarkup}
            return (

                <div>

                    {posts.map(function(post){return <Post post={post} key={post.id} {...post_props} />}.bind(this))}
                    {display_props.selection ? <DisplayAPost {...display_props}/>:null}
                </div>

            )
      }
})

//dangerouslySetInnerHTML={this.getRawMarkup()}
var Post = React.createClass({
      render(){
          var post = this.props.post;
          var style = {backgroundImage: 'url(' + post["featured_media"]["source_url"]+')'}
          return (
            <div className="post card" onClick={this.props.slide.bind(null,{status:true,id:post.id})}>
                <div style={style}></div>
                <h4>{post.title.rendered}</h4>
                <div dangerouslySetInnerHTML={this.props.getRawMarkup((this.props.post["excerpt"]["rendered"]))}/>
            </div>
          )
      }
})
//DISPLAY POST
var DisplayAPost = React.createClass({
    componentDidMount(){
          j("#displayapost").hide()
    },
    render(){
          var post = this.props.selection;
          var style = {backgroundImage: 'url(' + post["featured_media"]["source_url"]+')'}
        return (

           <div id="displayapost" class="card">
              <button onClick={this.props.slide.bind(null,{status:false})} className="btn-floating btn-large waves-effect waves-light gold">Close</button>
                <div style={style}/>
                <div><div dangerouslySetInnerHTML={this.props.getRawMarkup(post["content"]["rendered"])} /></div>

            </div>

        )
    }
})

ReactDOM.render(<Posts />,document.getElementById("content_space"));
